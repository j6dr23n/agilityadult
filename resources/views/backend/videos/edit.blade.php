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
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
@endsection
@section('content')
    <!-- main contnet -->
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">


            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">Edit Video</span>
                </div>
                <div class="justify-content-center mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Videos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Video</li>
                    </ol>
                </div>
            </div>
            <!-- /breadcrumb -->

            <!-- row -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-md-12">
                    <form action="{{ route('videos.update', $video->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card ">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label text-dark">Video Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $video->title }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">Video Tags</label>
                                    <textarea class="form-control" name="tags" placeholder="Myanmar,Onlyfan,Exantria,Chaung Yite,Thai"
                                        rows="3">{{ $video->tags }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">Embed Url</label>
                                    <input type="url" name="embed_link" class="form-control"
                                        placeholder="Embed url from google drive" value="{{ $video->embed_link }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">Link</label>
                                    <input type="url" name="link" class="form-control" placeholder="Leak folder link"
                                        value="{{ $video->link }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">Poster</label>
                                    <input class="form-control" type="file" id="formFile" name="poster[]" multiple>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- Swiper -->
                                            <h5 class="text-center">Poster</h5>
                                            <div class="swiper mySwiper">
                                                <div class="swiper-wrapper">
                                                    @if (is_array($video->poster))
                                                        @foreach ($video->poster as $image)
                                                            <div class="swiper-slide">
                                                                <img src="{{ '/storage/videos/images/' . $image }}" />
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <img src="{{ '/storage/videos/images/' . $video->poster }}" />
                                                    @endif
                                                </div>
                                                <div class="swiper-button-next"></div>
                                                <div class="swiper-button-prev"></div>
                                                <div class="swiper-pagination"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control form-select select2"
                                        data-bs-placeholder="Select Country">
                                        <option value="draft" {{ $video->status == 'draft' ? 'selected' : '' }}>Draft
                                        </option>
                                        <option value="published" {{ $video->status == 'published' ? 'selected' : '' }}>
                                            Published</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-primary float-end">Publish Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /row -->


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
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            autoHeight: true,
            pagination: {
                el: ".swiper-pagination",
                type: "progressbar",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endsection
