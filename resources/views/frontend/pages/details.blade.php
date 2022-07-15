@extends('frontend.layouts.app')

@section('extra-css')
    <link href="https://vjs.zencdn.net/7.19.2/video-js.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" /> 
@endsection
@section('content')
    <main>
        <div class="bg-gray-4500 dark">
            <div class="container px-md-5">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb dark">
                        <li class="breadcrumb-item"><a href="{{ route('videos.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Videos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $video->title }}</li>
                    </ol>
                </nav>
                @foreach ($errors->all() as $error)
                    <p class="text-red-700 text-danger text-bold text-center">{{ $error }}</p>
                @endforeach
                <div class="row mb-4">
                    <div class="col-md-8 col-xl-9 mb-4">
                        <div class="position-relative min-h-270rem mb-2d mr-xl-3" style="border:2px solid white">
                            @if (is_array($video->poster) && count($video->poster) > 1)
                                <!-- Swiper -->
                                <h4 class="text-center text-white font-bold">Images</h4>
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        @foreach ($video->poster as $image)
                                            <div class="swiper-slide">
                                                <div class="swiper-zoom-container">
                                                    <img src="{{ '/storage/videos/images/' . $image }}" class="img-fluid"
                                                        style="max-height: 500px !important;" />
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            @endif
                            @if ($video->embed_link !== null && $video->type === 'premium')
                                <video id="my-video" class="video-js vjs-16-9 vjs-big-play-centered" controls
                                    preload="auto" poster="{{ '/storage/videos/images/' . $video->poster[0] }}"
                                    data-setup='{"fluid": true}'>
                                    <source src="{{ $video->embed_link }}" type="video/mp4" />
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a
                                        web browser that
                                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                            video</a>
                                    </p>
                                </video>
                            @endif
                            @if ($video->embed_link !== null && $video->type === 'free')
                                <iframe width="100%" height="480" src="{{ $video->embed_link }}" scrolling="no" frameborder="1" allowfullscreen="true"></iframe>
                                <!-- <iframe width="600" height="480" src="{{ $video->embed_link }}" frameborder="1"
                                    allowFullScreen></iframe> -->
                            @endif
                        </div>
                        <div class="mr-xl-3">
                            <div class="mb-2">
                                <h5 class="font-size-21 font-weight-medium text-white">{{ $video->title }}
                                    @if (Auth::check() && auth()->user()->role !== 'member')
                                        <a href="{{ route('videos.edit', $video->id) }}"
                                            class="btn btn-xs btn-warning bt-pill btn-icon">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endif
                                </h5>
                            </div>
                            <div class="font-size-12 mb-4">
                                <span class="d-inline-flex text-gray-1300 align-items-center mr-3">Published on
                                    {{ \Carbon\Carbon::parse($video->created_at)->diffForHumans() }}</span>
                                <span class="d-inline-flex text-gray-1300 align-items-center mr-3"><i
                                        class="far fa-eye mr-1d"></i>
                                    {{ $totalViews }} views</span>
                            </div>
                            <hr>
                            <div class="font-size-12 mb-4">
                                <h5 class="font-size-19 font-weight-medium text-white text-center mb-2">Tags
                                </h5>
                                @php
                                    $tags = explode(',', $video->tags);
                                @endphp
                                @foreach ($tags as $key => $value)
                                    <a href="{{ route('pages.search', $value) }}"
                                        style="border:1px solid white; border-radius: 15px;"
                                        class="d-inline-flex text-gray-600 px-2 py-2 align-items-center mr-3 font-size-14 text-info mt-2">{{ $value }}</a>
                                @endforeach
                            </div>
                            <hr>
                            @if (Auth::check() && $video->embed_link !== null)
                                <a class="btn btn-info btn-block" href="{{ $video->link }}">
                                    <span class="btn-label">
                                        <i class="fa-solid fa-download"></i>
                                    </span>
                                    Download Link
                                </a>
                            @elseif(Auth::check() && $video->embed_link === null)
                                <a class="btn btn-info btn-block" href="{{ $video->link }}">
                                    <span class="btn-label">
                                        <i class="fa-solid fa-folder-open"></i>
                                    </span>
                                    Folder Link
                                </a>
                            @elseif(Auth::check() === false) 
                                <h5 class="font-size-19 font-weight-medium text-white text-center mb-2">Advertisments
                                </h5>
                                <!-- adsterra ads native start -->
                                <script type="text/javascript">
                                    atOptions = {
                                        'key' : 'ce6eb5a7d8a9e4cd6486f5b6a97f4cef',
                                        'format' : 'iframe',
                                        'height' : 250,
                                        'width' : 300,
                                        'params' : {}
                                    };
                                    document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://silldisappoint.com/ce6eb5a7d8a9e4cd6486f5b6a97f4cef/invoke.js"></scr' + 'ipt>');
                                </script>
                                <!-- adsterra ads native end -->
                            @endif
                            <hr>
                            <h5 class="text-center text-white font-bold">Report For Content Remove</h5>
                            <a class="btn btn-danger btn-block mt-2 text-white" data-toggle="modal"
                                data-target="#reportForm">
                                <span class="btn-label">
                                    <i class="fa-solid fa-exclamation"></i>
                                </span>
                                Report
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
                        <div class="mb-4">
                            <h5 class="text-white font-size-18 font-weight-medium">Up Next</h5>
                            @foreach ($videos as $item)
                                @php
                                    $item->views_count = views($item)->count();
                                @endphp
                                <div class="row d-block d-xl-flex align-items-center no-gutters mb-2d">
                                    <div class="col product-image mb-2d mb-xl-0">
                                        <a href="{{ route('videos.show', $item->slug) }}"
                                            class="d-block  stretched-link">
                                            <img class="img-fluid poster-image"
                                                src="{{ '/storage/videos/images/' . $item->poster[0] }}"
                                                alt="Image-Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <div class="mx-xl-2d">
                                            <div class="product-title font-size-13 font-weight-semi-bold mb-1d">
                                                <a href="single-video-v3.html" class="">{{ $item->title }}</a>
                                            </div>
                                            <div class="product-meta dot font-size-12 mb-1">
                                                <span class="d-inline-flex text-gray-1300">{{ $item->views_count }}
                                                    views</span>
                                                <span
                                                    class="d-inline-flex text-gray-1300">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if(Auth::check() === false) 
                            <!-- adsterra ads native start -->
                            <script type="text/javascript">
                                atOptions = {
                                    'key' : 'ce6eb5a7d8a9e4cd6486f5b6a97f4cef',
                                    'format' : 'iframe',
                                    'height' : 250,
                                    'width' : 300,
                                    'params' : {}
                                };
                                document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://silldisappoint.com/ce6eb5a7d8a9e4cd6486f5b6a97f4cef/invoke.js"></scr' + 'ipt>');
                            </script>
                            <!-- adsterra ads native end -->
                        @endif
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
    @include('frontend.partials._report')
@endsection
@section('extra-js')
    <script src="https://vjs.zencdn.net/7.19.2/video.min.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <script>
        const player = videojs('my-video', {
            responsive: true,
            fluid: true,
        });
    </script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            zoom: true,
            autoHeight: true,
            cssMode: true,
            pagination: {
                el: ".swiper-pagination",
                type: "progressbar",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
         */
        var disqus_config = function() {
            this.page.url = '{{ Request::url() }}'; // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier =
                {{ $video->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document,
                s = d.createElement('script');

            s.src = 'https://agility-adult.disqus.com/embed.js';

            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments
            powered by Disqus.</a></noscript>
@endsection
