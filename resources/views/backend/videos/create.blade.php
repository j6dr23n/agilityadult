@extends('backend.layouts.app')

@section('extra-css')
    <!--Internal  Quill css -->
    <link href="{{ asset('backend/assets/plugins/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/quill/quill.bubble.css') }}" rel="stylesheet">

    <!-- Internal Summernote css-->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/summernote/summernote-bs4.css') }}">

    <!-- Internal Select2 css -->
    <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!-- Internal input tags -->
    <link href="{{ asset('backend/assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <!-- main contnet -->
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">


            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">Create Video</span>
                </div>
                <div class="justify-content-center mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Videos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Video</li>
                    </ol>
                </div>
            </div>
            <!-- /breadcrumb -->

            <!-- row -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-md-12">
                    <div class="card" id="basic-alert">
                        <div class="card-body">
                            <div>
                                <h6 class="card-title mb-1">Create Post</h6>
                            </div>
                            <div class="text-wrap">
                                <div class="panel panel-primary tabs-style-1">
                                    <div class=" tab-menu-heading">
                                        <div class="tabs-menu1">
                                            <p class="text-muted card-sub-title">Select yout post type...</p>
                                            <!-- Tabs -->
                                            <ul class="nav panel-tabs main-nav-line">
                                                <li class="nav-item"><a href="#tab1" class="nav-link active"
                                                        data-bs-toggle="tab"><i class="fas fa-arrow-right"></i> Video</a>
                                                </li>
                                                <li class="nav-item"><a href="#tab2" class="nav-link"
                                                        data-bs-toggle="tab"><i class="fas fa-arrow-right"></i> Photo</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab1">
                                                <div class="card m-0">
                                                    <div class="card-body mx-auto p-0">
                                                        <a class="btn ripple btn-secondary" data-bs-target="#scrollmodal"
                                                            data-bs-toggle="modal" href="#">View Tutorials</a>
                                                    </div>
                                                </div>
                                                <form action="{{ route('videos.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="card">
                                                        <div class="card-body p-0 m-0">
                                                            @foreach ($errors->all() as $message)
                                                                <p style="color:red;">{{ $message }}</p>
                                                            @endforeach
                                                            <div class="form-group">
                                                                <label class="form-label text-dark">Video Title</label>
                                                                <input type="text" name="title" class="form-control"
                                                                    placeholder="Video Title" value="{{ old('title') }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label text-dark">Video Tags</label>
                                                                <textarea class="form-control" name="tags" placeholder="Myanmar,Onlyfan,Exantria,Chaung Yite,Thai" rows="3">{{ old('tags') }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label text-dark">Video</label>
                                                                <input type="file" class="form-control" id="browseFile"
                                                                    accept="video/*">
                                                            </div>
                                                            <div style="display: none" class="progress mt-3"
                                                                style="height: 25px">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                    role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                                                    aria-valuemax="100" style="width: 75%; height: 100%">75%
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label text-dark">Poster</label>
                                                                <small class="text-warning font-bold">If u leave
                                                                    this,system will auto generate thumbnail for
                                                                    video.</small>
                                                                <input type="file" name="poster[]" class="form-control"
                                                                    id="formFile" multiple accept="image/*" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Type</label>
                                                                <select name="type"
                                                                    class="form-control form-select select2"
                                                                    data-bs-placeholder="Select Country">
                                                                    <option value="" selected>-Select Type--
                                                                    </option>
                                                                    <option value="premium"
                                                                        {{ old('type') === 'premium' ? 'selected' : '' }}>
                                                                        Premium</option>
                                                                    <option value="free"
                                                                        {{ old('type') === 'free' ? 'selected' : '' }}>
                                                                        Free</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Status</label>
                                                                <select name="status"
                                                                    class="form-control form-select select2"
                                                                    data-bs-placeholder="Select Country">
                                                                    <option value="">--Select Status--</option>
                                                                    <option value="draft"
                                                                        {{ old('status') === 'draft' ? 'selected' : '' }}>
                                                                        Draft</option>
                                                                    <option value="published"
                                                                        {{ old('status') === 'published' ? 'selected' : '' }}>
                                                                        Published</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer ">
                                                            <button type="submit"
                                                                class="btn btn-primary float-end">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane" id="tab2">
                                                <form action="{{ route('videos.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="card ">
                                                        <div class="card-body">
                                                            @foreach ($errors->all() as $message)
                                                                <p style="color:red;">{{ $message }}</p>
                                                            @endforeach
                                                            <div class="form-group">
                                                                <label class="form-label text-dark">Title</label>
                                                                <input type="text" name="title" class="form-control"
                                                                    placeholder="Video Title"
                                                                    value="{{ old('title') }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label text-dark">Tags</label>
                                                                <textarea class="form-control" name="tags" placeholder="Myanmar,Onlyfan,Exantria,Chaung Yite,Thai"
                                                                    rows="3">{{ old('tags') }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label text-dark">Link</label>
                                                                <input type="url" name="link" class="form-control"
                                                                    placeholder="Leak folder link"
                                                                    value="{{ old('link') }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label text-dark">Poster</label>
                                                                <input type="file" name="poster[]"
                                                                    class="form-control" id="formFile" multiple
                                                                    accept="image/*" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Type</label>
                                                                <select name="type"
                                                                    class="form-control form-select select2"
                                                                    data-bs-placeholder="Select Country">
                                                                    <option value="" selected>-Select Type--</option>
                                                                    <option value="premium"
                                                                        {{ old('type') === 'premium' ? 'selected' : '' }}>
                                                                        Premium</option>
                                                                    <option value="free"
                                                                        {{ old('type') === 'free' ? 'selected' : '' }}>
                                                                        Free</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Status</label>
                                                                <select name="status"
                                                                    class="form-control form-select select2"
                                                                    data-bs-placeholder="Select Country">
                                                                    <option value="draft"
                                                                        {{ old('status') === 'draft' ? 'selected' : '' }}>
                                                                        Draft</option>
                                                                    <option value="published"
                                                                        {{ old('status') === 'published' ? 'selected' : '' }}>
                                                                        Published</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer ">
                                                            <button type="submit"
                                                                class="btn btn-primary float-end">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->

            {{-- <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-body">
                        @foreach ($errors->all() as $message)
                            <p style="color:red;">{{ $message }}</p>
                        @endforeach
                        <div class="form-group">
                            <label class="form-label text-dark">Video Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Video Title">
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">Video Tags</label>
                            <textarea class="form-control" name="tags" placeholder="Myanmar,Onlyfan,Exantria,Chaung Yite,Thai" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">Embed Url</label>
                            <input type="text" name="embed_link" class="form-control"
                                placeholder="Embed url from google drive">
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">Drive ID</label>
                            <input type="text" name="drive_id" class="form-control" placeholder="google drive file id">
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">Link</label>
                            <input type="url" name="link" class="form-control" placeholder="Leak folder link">
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">Poster</label>
                            <input type="file" name="poster[]" class="form-control" id="formFile" multiple />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control form-select select2"
                                data-bs-placeholder="Select Country">
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-primary float-end">Publish Now</button>
                    </div>
                </div>
            </form> --}}

        </div>
        <!-- Container closed -->
    </div>
    <!-- main content end-->

    <!-- Scroll with content modal -->
    <div class="modal fade" id="scrollmodal">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">How to upload Video.</h6><button aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <ol>
                        <li>အရင်ဆုံး video အရင်တင်ပါ</li>
                        <li>video တင်ပြီးပါက alert box လေးပေါ်လာပါလိမ့်မည်</li>
                        <li>ထိုအချိန်မှသာ title,tags,status & published ကိုရွေးပြီး submit နှိပ်ပါ</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--End Scroll with content modal -->
@endsection

@section('extra-js')
    <!--Internal quill js -->
    <script src="{{ asset('backend/assets/plugins/quill/quill.min.js') }}"></script>

    <!-- Internal Summernote js-->
    <script src="{{ asset('backend/assets/plugins/summernote/summernote-bs4.js') }}"></script>

    <!-- Internal Form-editor js -->
    <script src="{{ asset('backend/assets/js/form-editor-2.js') }}"></script>
    <!-- Internal input tags -->
    <script src="{{ asset('backend/assets/plugins/inputtags/inputtags.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}""></script>

    <!-- Resumable js -->
    <script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>

    <script type="text/javascript">
        let browseFile = $('#browseFile');
        let resumable = new Resumable({
            target: '{{ route('files.upload.large') }}',
            query: {
                _token: '{{ csrf_token() }}'
            }, // CSRF token
            fileType: ['mp4'],
            chunkSize: 10 * 1024 *
                1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
            headers: {
                'Accept': 'application/json'
            },
            testChunks: false,
            throttleProgressCallbacks: 1,
        });

        resumable.assignBrowse(browseFile[0]);

        resumable.on('fileAdded', function(file) { // trigger when file picked
            showProgress();
            resumable.upload() // to actually start uploading.
        });

        resumable.on('fileProgress', function(file) { // trigger when file progress update
            updateProgress(Math.floor(file.progress() * 100));
        });

        resumable.on('fileSuccess', function(file, response) { // trigger when file upload complete
            alert('video upload successed');
        });

        resumable.on('fileError', function(file, response) { // trigger when there is any error
            console.log(response);
        });


        let progress = $('.progress');

        function showProgress() {
            progress.find('.progress-bar').css('width', '0%');
            progress.find('.progress-bar').html('0%');
            progress.find('.progress-bar').removeClass('bg-success');
            progress.show();
        }

        function updateProgress(value) {
            progress.find('.progress-bar').css('width', `${value}%`)
            progress.find('.progress-bar').html(`${value}%`)
        }

        function hideProgress() {
            progress.hide();
        }
    </script>
@endsection
