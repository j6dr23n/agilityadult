@extends('backend.layouts.app')

@section('extra-css')
    <link href="https://vjs.zencdn.net/7.19.2/video-js.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
@endsection

@section('content')
    <!-- main contnet -->
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">


            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">View All Post</span>
                </div>
                <div class="justify-content-center mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Posts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View All Post</li>
                    </ol>
                </div>
            </div>
            <!-- /breadcrumb -->

            <!-- row  -->
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Post</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table  table-bordered text-nowrap mb-0" id="example2">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Created Date</th>
                                            <th class="text-center">Poster</th>
                                            <th>Title</th>
                                            <th>Tags</th>
                                            <th>Views</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($videos as $item)
                                        @php
                                            $item->views_count = views($item)->count();
                                        @endphp
                                            <tr>
                                                <td class="text-center">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                                <td class="text-center">
                                                    @if (is_array($item->poster))
                                                        <img src="{{ asset('storage/videos/images/' . $item->poster[0]) }}"
                                                            alt="" width="100px" height="60px">
                                                    @else
                                                        <img src="{{ $item->poster }}" alt="" width="100px" height="60px">
                                                    @endif
                                                </td>
                                                <td>{{ Str::limit($item->title, 100) }}</td>
                                                <td>{{ Str::limit($item->tags, 50) }}</td>
                                                <td>{{ $item->views_count }} views</td>
                                                <td><span
                                                        class="badge badge-{{ $item->status == 'draft' ? 'danger' : 'success' }}-transparent">{{ $item->status }}</span>
                                                </td>
                                                <td class="actions">
                                                    <a class="btn btn-warning btn-sm br-5 me-2"
                                                        data-bs-target="#scrollmodal{{ $item->id }}"
                                                        data-bs-toggle="modal" href="#">
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
                                                    <form action="{{ route('videos.destroy', $item->id) }}" method="POST"
                                                        style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm br-5" type="submit">
                                                            <i>
                                                                <svg class="table-delete"
                                                                    xmlns="http://www.w3.org/2000/svg" height="20"
                                                                    viewBox="0 0 24 24" width="16">
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
                                            <!-- Scroll with content modal -->
                                            <div class="modal fade" id="scrollmodal{{ $item->id }}">
                                                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                    <div class="modal-content modal-content-demo">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">{{ $item->title }}</h6>
                                                            <button aria-label="Close" class="btn-close"
                                                                data-bs-dismiss="modal" type="button"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if (is_array($item->poster))
                                                                <!-- Swiper -->
                                                                <h5 class="text-center">Poster</h5>
                                                                <div class="swiper mySwiper">
                                                                    <div class="swiper-wrapper">
                                                                        @foreach ($item->poster as $image)
                                                                            <div class="swiper-slide">
                                                                                <img src="{{ '/storage/videos/images/' . $image }}"
                                                                                    class="img-fluid poster-image" />
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="swiper-button-next"></div>
                                                                    <div class="swiper-button-prev"></div>
                                                                    <div class="swiper-pagination"></div>
                                                                </div>
                                                            @endif
                                                            <hr>
                                                            @if ($item->embed_link !== null)
                                                                <h5 class="text-center">Videos</h5>
                                                                <video id="my-video"
                                                                    class="video-js vjs-16-9 vjs-big-play-centered" controls
                                                                    preload="auto"
                                                                    poster="{{ '/storage/videos/images/' . $item->poster[0] }}"
                                                                    data-setup='{"fluid": true}'>
                                                                    <source src="{{ $item->embed_link }}"
                                                                        type="video/mp4" />
                                                                    <p class="vjs-no-js">
                                                                        To view this video please enable JavaScript, and
                                                                        consider upgrading to a
                                                                        web browser that
                                                                        <a href="https://videojs.com/html5-video-support/"
                                                                            target="_blank">supports HTML5
                                                                            video</a>
                                                                    </p>
                                                                </video>
                                                            @endif
                                                            <hr>
                                                            <div class="font-size-12 mb-4 mt-2">
                                                                <h5
                                                                    class="font-size-19 font-weight-medium text-black text-center mb-3">
                                                                    Tags
                                                                </h5>
                                                                @php
                                                                    $tags = explode(',', $item->tags);
                                                                @endphp
                                                                @foreach ($tags as $key => $value)
                                                                    <a href="{{ route('pages.search', $value) }}"
                                                                        style="border:1px solid black; border-radius: 15px;"
                                                                        class="d-inline-flex text-gray-600 px-2 py-2 align-items-center mr-3 font-size-14 text-info">{{ $value }}</a>
                                                                @endforeach
                                                            </div>
                                                            <a class="btn btn-info btn-block" href="{{ $item->link }}">
                                                                <span class="btn-label">
                                                                    <i class="fas fa-download"></i>
                                                                </span>
                                                                Download
                                                            </a>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn ripple btn-secondary" data-bs-dismiss="modal"
                                                                type="button">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Scroll with content modal -->
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                {{ $videos->onEachSide(0)->links('backend.partials._pagination') }}
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
