@extends('frontend.layouts.app')

@section('extra-css')
    <link href="https://vjs.zencdn.net/7.19.2/video-js.css" rel="stylesheet" />>
@endsection

@section('content')
    <main id="content">
        <div class="bg-gray-4500 dark">
            <div class="container px-md-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb dark">
                        <li class="breadcrumb-item"><a href="{{ route('videos.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Videos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $video->title }}</li>
                    </ol>
                </nav>
                <div class="row mb-4">
                    <div class="col-md-8 col-xl-9 mb-4">
                        <div class="position-relative min-h-270rem mb-2d mr-xl-3">
                            @if ($video->embed_link !== null)
                                <p align="center">
                                    {!! $video->embed_link !!}
                                </p>
                            @endif
                            @if ($video->drive_id !== null)
                                <video id="my-video" class="video-js" controls preload="auto"
                                    poster="{{ '/storage/videos/images/' . $video->poster[0] }}" data-setup="{}">
                                    <source
                                        src="https://drive.google.com/u/0/uc?id={{ $video->drive_id }}&export=download"
                                        type="video/mp4" />
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a
                                        web browser that
                                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                            video</a>
                                    </p>
                                </video>
                            @endif
                        </div>
                        <div class="mr-xl-3">
                            <div class="mb-2">
                                <h5 class="font-size-21 font-weight-medium text-white">{{ $video->title }}
                                </h5>
                            </div>
                            <div class="font-size-12 mb-4">
                                <span class="d-inline-flex text-gray-1300 align-items-center mr-3">Published on
                                    {{ \Carbon\Carbon::parse($video->created_at)->diffForHumans() }}</span>
                                <span class="d-inline-flex text-gray-1300 align-items-center mr-3"><i
                                        class="far fa-eye mr-1d"></i> {{ $totalViews }} views</span>
                            </div>
                            <hr>
                            <div class="font-size-12 mb-4">
                                <h5 class="font-size-19 font-weight-medium text-white text-center mb-3">Tags
                                </h5>
                                @php
                                    $tags = explode(',', $video->tags);
                                @endphp
                                @foreach ($tags as $key => $value)
                                    <a href="{{ route('pages.search', $value) }}"
                                        style="border:1px solid white; border-radius: 15px;"
                                        class="d-inline-flex text-gray-600 px-2 py-2 align-items-center mr-3 font-size-14 text-info">{{ $value }}</a>
                                @endforeach
                            </div>
                            <hr>
                            <a class="btn btn-info btn-block" href="{{ $video->link }}">
                                <span class="btn-label">
                                    <i class="fa-solid fa-download"></i>
                                </span>
                                Folder Link
                            </a>
                            <nav class="js-scroll-nav">
                                <div class="space-1 position-relative d-flex">
                                    <a class="nav-link mx-auto px-6 py-2d font-size-14 h-w-primary z-index-2 border border-gray-3900 rounded-pill bg-gray-4500"
                                        href="#leave-comment"><i class="far fa-comment mr-2"></i> Leave a comment</a>
                                    <div class="border-top content-centered w-100 border-gray-3900"></div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        {{-- <a href="single-video-v1.html" class="d-block mb-3d">
                            <img class="img-fluid" src="{{ asset('frontend/assets/img/350x277/img1.jpg') }}"
                                alt="Image-Description">
                        </a> --}}
                        <div class="mb-4">
                            <h5 class="text-white font-size-18 font-weight-medium">Up Next</h5>
                            @foreach ($videos as $item)
                            @php
                                $image = json_decode($item->poster)
                            @endphp
                                <div class="row d-block d-xl-flex align-items-center no-gutters mb-2d">
                                    <div class="col product-image mb-2d mb-xl-0">
                                        <a href="single-video-v3.html" class="d-block  stretched-link">
                                            <img class="img-fluid poster-image" src="{{ '/storage/videos/images/' . $image[0] }}" alt="Image-Description" >
                                        </a>
                                    </div>
                                    <div class="col">
                                        <div class="mx-xl-2d">
                                            <div class="product-title font-size-13 font-weight-semi-bold mb-1d">
                                                <a href="single-video-v3.html"
                                                    class="">{{ $item->title }}</a>
                                            </div>
                                            <div class="product-meta dot font-size-12 mb-1">
                                                <span class="d-inline-flex text-gray-1300">{{ $item->views }}
                                                    views</span>
                                                <span
                                                    class="d-inline-flex text-gray-1300">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container px-md-5" id="leave-comment">
            <div class="space-1">
                <div id="disqus_thread"></div>
            </div>
        </div>
    </main>
@endsection


@section('extra-js')
    <script src="https://vjs.zencdn.net/7.19.2/video.min.js"></script>

    <script>
        const player = videojs('my-video', {
            responsive: true,
            fluid: true,
        });
    </script>
    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        var disqus_config = function() {
            this.page.url = 'http://localhost/movie/'; // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = 1; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };

        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document,
                s = d.createElement('script');
            s.src = 'https://agadult.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
            Disqus.</a></noscript>
@endsection
