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
                                                        data-bs-toggle="tab"><i class="fas fa-arrow-right"></i> Videos</a></li>
                                                <li class="nav-item"><a href="#tab2" class="nav-link"
                                                        data-bs-toggle="tab"><i class="fas fa-arrow-right"></i> Photos</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab1">
                                                <form action="{{ route('videos.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="card ">
                                                        <div class="card-body">
                                                            @foreach ($errors->all() as $message)
                                                                <p style="color:red;">{{ $message }}</p>
                                                            @endforeach
                                                            <div class="form-group">
                                                                <label class="form-label text-dark">Video Title</label>
                                                                <input type="text" name="title" class="form-control"
                                                                    placeholder="Video Title">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label text-dark">Video Tags</label>
                                                                <textarea class="form-control" name="tags" placeholder="Myanmar,Onlyfan,Exantria,Chaung Yite,Thai" rows="3"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label text-dark">Video URL</label>
                                                                <input type="url" name="embed_link" class="form-control"
                                                                    placeholder="Link From Backblaze-(Friendly URL)">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label text-dark">Link</label>
                                                                <input type="url" name="link" class="form-control"
                                                                    placeholder="Download link">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label text-dark">Poster</label>
                                                                <small class="text-warning font-bold">If u leave this,system will auto generate thumbnail for video.</small>
                                                                <input type="file" name="poster[]"
                                                                    class="form-control" id="formFile" multiple accept="image/*"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Status</label>
                                                                <select name="status"
                                                                    class="form-control form-select select2"
                                                                    data-bs-placeholder="Select Country">
                                                                    <option value="draft">Draft</option>
                                                                    <option value="published">Published</option>
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
                                                                    placeholder="Video Title">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label text-dark">Tags</label>
                                                                <textarea class="form-control" name="tags" placeholder="Myanmar,Onlyfan,Exantria,Chaung Yite,Thai" rows="3"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label text-dark">Link</label>
                                                                <input type="url" name="link" class="form-control"
                                                                    placeholder="Leak folder link">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label text-dark">Poster</label>
                                                                <input type="file" name="poster[]"
                                                                    class="form-control" id="formFile" multiple accept="image/*"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Status</label>
                                                                <select name="status"
                                                                    class="form-control form-select select2"
                                                                    data-bs-placeholder="Select Country">
                                                                    <option value="draft">Draft</option>
                                                                    <option value="published">Published</option>
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
@endsection
