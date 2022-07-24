@extends('backend.layouts.app')

@section('extra-css')
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ asset('backend/assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}"
        rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
@endsection
@section('content')
    <!-- main contnet -->
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">


            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">Create Category</span>
                </div>
                <div class="justify-content-center mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Category</li>
                    </ol>
                </div>
            </div>
            <!-- /breadcrumb -->

            <!-- row -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-md-12">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="card ">
                            <div class="card-body">
                                @foreach ($errors->all() as $message)
                                    <p style="color:red;">{{ $message }}</p>
                                @endforeach
                                <div class="form-group">
                                    <label class="form-label text-dark">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter category title..." value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-primary float-end">Submit</button>
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
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ asset('backend/assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script> 

    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ asset('backend/assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
@endsection
