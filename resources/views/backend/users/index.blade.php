@extends('backend.layouts.app')

@section('extra-css')
    <!-- Internal Data table css -->
    <link href="{{ asset('backend/assets/plugins/datatable/css/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/datatable/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/responsive.bootstrap5.css') }}" rel="stylesheet" />

    <!-- INTERNAL Select2 css -->
    <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- main-content -->
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">


            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-end">
                <div class="left-content mt-2">
                    <a class="btn ripple btn-primary" href="{{ route('users.create') }}"><i
                            class="fe fe-plus me-2"></i>Add New User</a>
                </div>
            </div>
            <!-- /breadcrumb -->

            <!--Row-->
            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="table-responsive  deleted-table">
                                <table id="user-datatable" class="table table-bordered text-nowrap border-bottom Userlist">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Info</th>
                                            <th>Joined Date</th>
                                            <th>Expiry Date</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                            <tr>
                                                <td>
                                                    <p class="text-muted tx-13">{{ $item->name }}</p>
                                                </td>
                                                <td>
                                                    <span class="tx-13 text-muted mb-0"">{{ $item->email }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-muted tx-13"">{{ Str::limit($item->info,60) }}</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-light text-muted tx-13">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-light text-muted tx-13">{{ \Carbon\Carbon::parse($item->expiry_date)->diffForHumans() }}</span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-{{ $item->isAdmin === 0 ? 'info' : 'danger' }}-transparent">{{ $item->isAdmin === 0 ? 'member' : 'Admin' }}</span>
                                                </td>
                                                <td><a href="{{ route('users.edit',$item->id) }}"
                                                        class="btn btn-icon btn-primary-light me-2" data-bs-toggle="tooltip"
                                                        title="" data-bs-original-title="Edit">
                                                        <i class="las la-pen"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->


        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection

@section('extra-js')

    @include('backend.partials._toastr-script')
    <!-- Internal Select2 js-->
    <script src="{{ asset('backend/assets/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Internal Data tables -->
    <script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>

    <!-- INTERNAL Select2 js -->
    <script src="{{ asset('backend/assets/plugins/select2/js/select2.full.min.js') }}"></script>

    <!--Internal  Userlist js -->
    <script src="{{ asset('backend/assets/js/user-list.js') }}""></script>
@endsection
