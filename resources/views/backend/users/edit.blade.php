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
                    <form action="{{ route('users.update',$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card ">
                            <div class="card-body">
                                @foreach ($errors->all() as $message)
                                    <p style="color:red;">{{ $message }}</p>
                                @endforeach
                                <div class="form-group">
                                    <label class="form-label text-dark">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter user name" value="{{ old('name') == null ? $user->name : old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter user email"
                                        email="true" value="{{ old('email') == null ? $user->email : old('email') }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">New password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Enter new user password">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">User information</label>
                                    <textarea class="form-control" name="info" placeholder="Fb account link or ph number or telegram"
                                        rows="3">{{ old('info') == null ? $user->info : old('info')  }}</textarea>
                                </div>
                                <label class="form-label text-dark">Expiry Date</label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                    </div>
                                    <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="date" name="expiry_date" value="{{ old('expiry_date') == null ? $user->expiry_date : old('expiry_date') }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">Type of user</label>
                                    <div class="d-md-flex ad-post-details">
                                        <label class="custom-control custom-radio mb-2 me-4">
                                            <input type="radio" class="custom-control-input" name="isAdmin" value="0"
                                                {{ $user->isAdmin === 0 ? 'checked' : '' }}>
                                            <span class="custom-control-label"><a href="javascript:void(0)"
                                                    class="">No </a></span>
                                        </label>
                                        <label class="custom-control custom-radio  mb-2">
                                            <input type="radio" class="custom-control-input" name="isAdmin" value="1"  {{ $user->isAdmin === 1 ? 'checked' : '' }}>
                                            <span class="custom-control-label"><a href="javascript:void(0)"
                                                    class="">Yes</a></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-primary float-end">Update!!!</button>
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
