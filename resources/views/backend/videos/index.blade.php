@extends('backend.layouts.app')

@section('extra-css')
    <link href="https://vjs.zencdn.net/7.19.2/video-js.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

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
                    <a class="btn ripple btn-primary" href="{{ route('videos.create') }}"><i
                            class="fe fe-plus me-2"></i>Add New Post</a>
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
                                            <th>Poster</th>
                                            <th>Title</th>
                                            <th>Tags</th>
                                            <th>Views</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($videos as $item)
                                            @php
                                                $item->views_count = views($item)->count();
                                            @endphp
                                            <tr>
                                                <td>
                                                    @if (is_array($item->poster))
                                                        <img src="{{ asset('storage/videos/images/' . $item->poster[0]) }}"
                                                            alt="" width="100px" height="60px">
                                                    @else
                                                        <img src="{{ $item->poster }}" alt="" width="100px"
                                                            height="60px">
                                                    @endif
                                                </td>
                                                
                                                <td>{{ Str::limit($item->title, 100) }}</td>
                                                <td>{{ Str::limit($item->tags, 50) }}</td>
                                                <td>{{ $item->views_count }} views</td>
                                                <td><span
                                                        class="badge badge-{{ $item->status == 'draft' ? 'danger' : 'success' }}-transparent">{{ $item->status }}</span>
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                </td>
                                                <td class="actions">
                                                    <a class="btn btn-warning btn-sm br-5 me-2" href="{{ config('APP_URL').'/view/'.$item->slug }}">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-success btn-sm br-5 me-2"
                                                        href="{{ route('videos.edit', $item->id) }}">
                                                        <i>
                                                            <svg class="table-edit" xmlns="http://www.w3.org/2000/svg"
                                                                height="20" viewBox="0 0 24 24" width="16">
                                                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                                <path
                                                                    d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM5.92 19H5v-.92l9.06-9.06.92.92L5.92 19zM20.71 5.63l-2.34-2.34c-.2-.2-.45-.29-.71-.29s-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41z">
                                                                </path>
                                                            </svg>
                                                        </i>
                                                    </a>
                                                    <form action="{{ route('videos.destroy', $item->id) }}"
                                                        method="POST" style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm br-5" type="submit">
                                                            <i>
                                                                <svg class="table-delete" xmlns="http://www.w3.org/2000/svg"
                                                                    height="20" viewBox="0 0 24 24" width="16">
                                                                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                                    <path
                                                                        d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z">
                                                                    </path>
                                                                </svg>
                                                            </i>
                                                        </button>
                                                    </form>
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

    <script src="https://vjs.zencdn.net/7.19.2/video.min.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    @include('backend.partials._toastr-script')

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

    <script>
        const player = videojs('my-video', {
            responsive: true,
            fluid: true,
        });
    </script>
@endsection
