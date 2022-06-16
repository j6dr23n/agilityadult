@extends('backend.layouts.app')

@section('content')
    <!-- main contnet -->
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">


            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">Edit Chapter</span>
                </div>
                <div class="justify-content-center mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Chapter</a></li>
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
                                <h6 class="card-title mb-1">Edit Chapter</h6>
                            </div>
                            <div class="text-wrap">
                                <form action="{{ route('chapter.update',$chapter->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card ">
                                        <div class="card-body">
                                            @foreach ($errors->all() as $message)
                                                <p style="color:red;">{{ $message }}</p>
                                            @endforeach
                                            <input type="hidden" name="manga_id" value="{{ $chapter->manga_id }}">
                                            <div class="form-group">
                                                <label class="form-label text-dark">Chapter Number</label>
                                                <input type="number" name="chapter_no" class="form-control"
                                                    placeholder="Chapter Number" value="{{ $chapter->chapter_no }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">PDF File</label>
                                                <input type="file" name="path" class="form-control" id="formFile" accept="application/pdf"/>
                                                <br>
                                                <label for="form-label text-dark">Old PDF File</label>
                                                <a class="btn btn-md btn-dark btn-rounded btn-block" href="{{ $chapter->pdfPath }}">PDF File</a>
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
