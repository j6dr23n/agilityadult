@extends('backend.layouts.app')

@section('extra-css')
    <!-- Internal Data table css -->
    <link href="{{ asset('backend/assets/plugins/datatable/css/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/datatable/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/responsive.bootstrap5.css') }}" rel="stylesheet" />

    <!-- INTERNAL Select2 css -->
    <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <!--- Internal Sweet-Alert css-->
    <link href="{{ asset('backend/assets/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- main-content -->
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">


            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-end">
                <div class="left-content mt-2">
                    <a class="btn ripple btn-primary" href="{{ route('girls.create') }}"><i
                            class="fe fe-plus me-2"></i>Add New Girl</a>
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
                                            <th>Images</th>
                                            <th>Info</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($girls as $item)
                                            <tr>
                                                <td>
                                                    <p class="text-muted tx-13">{{ $item->name }}</p>
                                                </td>
                                                <td><img src="{{ asset('storage/girls/images/'.$item->images[0]) }}" alt="" class="poster-image"></td>
                                                <td>
                                                    <span
                                                        class="text-muted tx-13"">{{ Str::limit($item->info, 60) }}</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">{{ $item->status }}</span>
                                                </td>
                                                <td class="actions">
                                                    <a class="btn btn-success btn-sm br-5 me-2"
                                                        href="{{ route('girls.edit', $item->id) }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm br-5 me-2 delete-btn" data-id="{{ $item->id }}">
                                                        <i class="fas fa-trash"></i>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <!--Internal  Userlist js -->
    <script src="{{ asset('backend/assets/js/user-list.js') }}""></script>

    <script>
        $(document).on('click', '.delete-btn', function(event) {
            const id = $(event.currentTarget).data('id');
            swal({
                    title: 'Delete !',
                    text: 'Are you sure you want to delete this girl" ?',
                    type: 'warning',
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    confirmButtonColor: '#5cb85c',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'No',
                    confirmButtonText: 'Yes',
                },
                function() {
                    $.ajax({
                        url: 'girls/' + id,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id" : id
                        },
                        success: function(response) {
                            swal({
                                title: 'Deleted!',
                                text: 'Video has been deleted.',
                                type: 'success',
                                timer: 2000,
                            });
                            setInterval('location.reload()', 2000);  
                        },
                        error: function(error) {
                            swal({
                                title: 'Error!',
                                text: error.responseJSON.message,
                                type: 'error',
                                timer: 5000,
                            });
                            $('#videos-datatable').DataTable().ajax.reload(null, false);
                        }
                    });
                });
        });
    </script>
@endsection
