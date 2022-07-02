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
                    <span class="main-content-title mg-b-0 mg-b-lg-1">Create User</span>
                </div>
                <div class="justify-content-center mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create User</li>
                    </ol>
                </div>
            </div>
            <!-- /breadcrumb -->

            <!-- row -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-md-12">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="card ">
                            <div class="card-body">
                                @foreach ($errors->all() as $message)
                                    <p style="color:red;">{{ $message }}</p>
                                @endforeach
                                <div class="form-group">
                                    <label class="form-label text-dark">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter user name" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter user email"
                                        email="true" value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Enter user password">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">User information</label>
                                    <textarea class="form-control" name="info" placeholder="Fb account link or ph number or telegram"
                                        rows="3">{{ old('info') }}</textarea>
                                </div>
                                <label class="form-label text-dark">Expiry Date</label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                    </div>
                                    <input class="form-control" placeholder="MM/DD/YYYY" type="date" name="expiry_date" value="{{ old('expiry_date') }}">
                                </div><!-- input-group -->
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
@endsection
