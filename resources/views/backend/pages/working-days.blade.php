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
            <br>

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
                                            <th>Month</th>
                                            <th>Total</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                            <tr>
                                                <td>
                                                    <p class="text-muted tx-13">{{ $item->name }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-muted tx-13">{{ $item->month }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-muted tx-13">{{ $item->total }}</p>
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
                    text: 'Are you sure you want to delete this Video" ?',
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
                        url: 'users/' + id,
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
                            setInterval('location.reload()', 3000);  
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
