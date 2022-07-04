@extends('backend.layouts.app')

@section('extra-css')
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ asset('backend/assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}"
        rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <!-- Summernote editor css -->
    <link href="{{ asset('backend/assets/plugins/summernote-editor/summernote1.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- main contnet -->
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">


            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">Edit Girl</span>
                </div>
                <div class="justify-content-center mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Girls</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Girl</li>
                    </ol>
                </div>
            </div>
            <!-- /breadcrumb -->

            <!-- row -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-md-12">
                    <form action="{{ route('girls.update', $girl->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card ">
                            <div class="card-body">
                                @foreach ($errors->all() as $message)
                                    <p style="color:red;">{{ $message }}</p>
                                @endforeach
                                <div class="form-group">
                                    <label class="form-label text-dark">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter girl name"
                                        value="{{ old('name') !== null ? old('name') : $girl->name }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">Acc Link</label>
                                    <input type="text" name="link" class="form-control"
                                        placeholder="Enter contact link" value="{{ old('link') !== null ? old('link') : $girl->link }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">Images</label>
                                    <input type="file" name="images[]" class="form-control" id="formFile" multiple
                                        accept="image/*" />
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- Swiper -->
                                            <h5 class="text-center">Images</h5>
                                            <div class="swiper mySwiper">
                                                <div class="swiper-wrapper">
                                                    @if (is_array($girl->images))
                                                        @foreach ($girl->images as $image)
                                                            <div class="swiper-slide">
                                                                <img src="{{ '/storage/girls/images/' . $image }}" />
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <img src="{{ '/storage/girls/images/' . $video->poster }}" />
                                                    @endif
                                                </div>
                                                <div class="swiper-button-next"></div>
                                                <div class="swiper-button-prev"></div>
                                                <div class="swiper-pagination"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <textarea name="info" id="summernote">
                                    {!! $girl->info !!}
                                </textarea>
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control form-select select2"
                                        data-bs-placeholder="Select Status">
                                        <option value="">--Select Status--</option>
                                        <option value="draft" {{ $girl->status === 'draft' ? 'selected' : '' }}>Draft
                                        </option>
                                        <option value="published" {{ $girl->status === 'published' ? 'selected' : '' }}>
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
    <!--Internal  Datepicker js -->
    <script src="{{ asset('backend/assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>

    <!--Internal  jquery.maskedinput js -->
    <script src="{{ asset('backend/assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>

    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ asset('backend/assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>

    <!-- Internal form-elements js -->
    <script src="{{ asset('backend/assets/js/form-elements.js') }}"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <!-- INTERNAL Summernote Editor js -->
    <script src="{{ asset('backend/assets/plugins/summernote-editor/summernote1.js') }}"></script>
    <script src="{{ asset('backend/assets/js/summernote.js') }}"></script>

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
