@extends('backend.layouts.app')

@section('content')
    <!-- main contnet -->
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">


            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">Create Chapter of ({{ $manga->title }})</span>
                </div>
                <div class="justify-content-center mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Chapter</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                                <h6 class="card-title mb-1">Create Chapter</h6>
                            </div>
                            <div class="text-wrap">
                                <form action="{{ route('chapter.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card ">
                                        <div class="card-body">
                                            @foreach ($errors->all() as $message)
                                                <p style="color:red;">{{ $message }}</p>
                                            @endforeach
                                            <input type="hidden" name="manga_id" value="{{ $manga->id }}">
                                            <div class="form-group">
                                                <label class="form-label text-dark">Chapter Number</label>
                                                <input type="number" name="chapter_no" class="form-control"
                                                    placeholder="Chapter Number" value="{{ $latestChapterNo+1 }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">PDF File</label>
                                                <input type="file" name="path" class="form-control" id="formFile" accept="application/pdf"/>
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
