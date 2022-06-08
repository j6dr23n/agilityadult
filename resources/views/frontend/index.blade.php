@extends('frontend.layouts.app')

@section('content')
    <main id="content">
        <div class="bg-gray-1100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="pl-lg-2 py-6 pb-lg-8 mb-lg-1">
                            <section>
                                <div class="home-section mb-3 pb-1">
                                    <header
                                        class="d-md-flex align-items-center justify-content-center mb-3 mb-lg-1 pb-2 w-100 border-bottom border-gray-3800">
                                        <h6 class="font-size-24 font-weight-medium m-0 text-white">
                                            {{ $title === null ? 'All Video' : ucfirst($title) }}</h6>
                                    </header>
                                    <div class="mt-4" aria-labelledby="pills-two-example1-tab">
                                        <div class="border-bottom border-gray-3800 mb-3 pb-5">
                                            <div class="row mx-n2">
                                                @foreach ($videos as $item)
                                                    @php
                                                        $image = json_decode($item->poster);
                                                        if (is_array($image) === false) {
                                                            return abort('500');
                                                        }
                                                    @endphp
                                                    <div class="col-md-3 px-2">
                                                        <div class="product mb-4">
                                                            <div class="product-image mb-2" style="height: 270px;">
                                                                <a class="d-block position-relative stretched-link"
                                                                    href="{{ route('videos.show', $item->slug) }}">
                                                                    <img class="img-fluid poster-image"
                                                                        src="{{ '/storage/videos/images/' . $image[0] }}"
                                                                        alt="Image-Description">
                                                                </a>
                                                            </div>
                                                            <h6
                                                                class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                                <a href="{{ route('videos.show', $item->slug) }}"
                                                                    class="text-white">{{ Str::limit($item->title, 120) }}</a>
                                                            </h6>
                                                            <div class="font-size-12 text-gray-1300">
                                                                <span>{{ $item->views }} views</span>
                                                                <span class="product-comment">Published on
                                                                    {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    {{ $videos->onEachSIde(0)->links('frontend.partials._pagination') }}

                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
