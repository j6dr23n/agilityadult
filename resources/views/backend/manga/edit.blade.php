@extends('backend.layouts.app')

@section('content')
    <!-- main contnet -->
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">


            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">Edit Manga</span>
                </div>
                <div class="justify-content-center mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Manga</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                                <h6 class="card-title mb-1">Edit Manga</h6>
                            </div>
                            <div class="text-wrap">
                                <form action="{{ route('manga.update',$manga->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card ">
                                        <div class="card-body">
                                            @foreach ($errors->all() as $message)
                                                <p style="color:red;">{{ $message }}</p>
                                            @endforeach
                                            <div class="form-group">
                                                <label class="form-label text-dark">Title</label>
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="Manga Title" value="{{ old('title') !== null ? old('title') : $manga->title }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Poster</label>
                                                <input type="file" name="poster" class="form-control" id="formFile" />
                                                <br>
                                                <img src="{{ asset('storage/manga/'.$manga->poster) }}" alt="{{ $manga->title }}" width="100px" height="60px">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Descriptions</label>
                                                <textarea class="form-control" name="info" placeholder="Descriptions..." rows="3" required>{{ old('info') !== null ? old('info') : $manga->info }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Genres</label>
                                                <textarea class="form-control" name="genres" placeholder="Dark,Fanatsy,Action,Adventure" rows="3" required>{{ old('genres') !== null ? old('genres') : $manga->genres }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Tags</label>
                                                <textarea class="form-control" name="tags" placeholder="Manga,Name,...,...,...," rows="3" required>{{ old('tags') !== null ? old('tags') : $manga->tags }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Type</label>
                                                <select name="type"
                                                    class="form-control form-select select2"
                                                    data-bs-placeholder="Select Country">
                                                    <option value="" selected>-Select Type--</option>
                                                    <option value="premium" {{ $manga->type === 'premium' ? 'selected' : '' }}>Premium</option>
                                                    <option value="free" {{ $manga->type === 'free' ? 'selected' : '' }}>Free</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Status</label>
                                                <select name="status"
                                                    class="form-control form-select select2"
                                                    data-bs-placeholder="Select Country">
                                                    <option value="draft" {{ $manga->status === 'draft' ? 'selected' : '' }}>Draft</option>
                                                    <option value="published" {{ $manga->status === 'published' ? 'selected' : '' }}>Published</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer ">
                                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->

        </div>
        <!-- Container closed -->
    </div>
    <!-- main content end-->
@endsection

@section('extra-js')

    <!-- Internal Form-editor js -->
    <script src="{{ asset('backend/assets/js/form-editor-2.js') }}"></script>
    <!-- Internal input tags -->
    <script src="{{ asset('backend/assets/plugins/inputtags/inputtags.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}""></script>
@endsection
