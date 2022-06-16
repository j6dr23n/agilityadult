@extends('frontend.layouts.app')

@section('content')
    <main id="content">
        <div class="bg-gray-1100 dark pb-5">
            <div class="container px-md-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb dark flex-nowrap flex-md-wrap overflow-auto overflow-md-hidden">
                        <li class="breadcrumb-item flex-shrink-0 flex-shrink-md-1"><a href="#">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-shrink-md-1"><a href="#">Manga</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-shrink-md-1 active">{{ $manga->title }}</li>
                    </ol>
                </nav>
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-4 mb-md-0">
                            <div class="mb-5 pb-1">
                                <img src="{{ '/storage/manga/' . $manga->poster }}" alt="" class="img-fluid poster-image">
                            </div>
                            <div class="row no-gutters mb-5 mb-lg-1">
                                <div class="col-lg">
                                    <div class="mb-4 mb-md-0 pr-lg-5 pr-wd-0">
                                        <h6
                                            class="font-size-26 text-white font-weight-medium font-secondary mb-5 text-lh-sm">
                                            {{ $manga->title }}</h6>
                                        <ul class="list-unstyled nav nav-meta font-secondary mb-3">
                                            <li class="text-gray-1300 flex-shrink-0 flex-shrink-md-1">Total Chapters (
                                                {{ $chapters->count() }} )</li>
                                            <li class="text-gray-1300 flex-shrink-0 flex-shrink-md-1">Added:
                                                {{ $manga->created_at->diffForHumans() }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-gray-1300 mb-4 font-secondary">
                                <div>
                                    <i class="far fa-eye font-size-18"></i>
                                    <span class="font-size-12 font-weight-semi-bold ml-1">{{ $totalViews }} views</span>
                                </div>
                                <div class="ml-6">
                                    <a href="#" class="text-gray-1300">
                                        <i class="far fa-thumbs-up font-size-18"></i>
                                    </a>
                                    <span class="font-size-12 font-weight-semi-bold ml-1">7+</span>
                                </div>
                            </div>
                            <p class="mb-6 mb-lg-10 font-size-15 text-gray-1800 pr-lg-6 text-lh-lg">{{ $manga->info }}</p>
                            <div>
                                <div class="tab-nav__v10">
                                    <ul class="nav justify-content-center" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active pb-3" id="pills-one-code-features-example-tab"
                                                data-toggle="pill" href="#pills-one-code-features-example" role="tab"
                                                aria-controls="pills-two-code-features-example"
                                                aria-selected="true">Chatpers</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="bg-gray-3100">
                                    <div class="container px-md-5 py-5 pt-lg-7 pb-lg-9">
                                        <div class="tab-content mb-1">
                                            <div class="tab-pane fade show active" id="pills-one-code-features-example"
                                                role="tabpanel" aria-labelledby="pills-one-code-features-example-tab">
                                                @foreach ($chapters as $item)
                                                    <div class="font-size-1 mb-2 text-center">
                                                        <a href="{{ route('pages.chapter.show',[$manga->slug,$item->chapter_no]) }}"
                                                            class="text-gray-1300 h-color-white">
                                                            <span>( {{ $manga->title }} of Chatper -
                                                                {{ $item->chapter_no }} )</span>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <hr>
                        <div class="pl-md-2 ml-md-1">
                            <h3 class="text-white text-center mb-3">Simliar Manga</h3>
                            @foreach ($mangas as $item)
                                <div class="product">
                                    <div class="row mx-n2 mb-7">
                                        <div class="col-md-6 px-2">
                                            <div class="product-image mb-2">
                                                <a href="{{ route('pages.manga.show', $item->slug) }}"
                                                    class="d-inline-block position-relative stretched-link" tabindex="0">
                                                    <img class="img-fluid poster-image"
                                                        src="{{ '/storage/manga/' . $item->poster }}"
                                                        alt="Image Description">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 px-2">
                                            @php
                                                $tags = explode(',', $item->tags);
                                            @endphp
                                            <div>
                                                <div class="product-meta font-size-12 text-center">
                                                    <span><a href="single-episodes-v1.html" class="h-g-primary"
                                                            tabindex="0">{{ $tags[0] }}</a></span>
                                                    <span><a href="single-episodes-v1.html" class="h-g-primary"
                                                            tabindex="0">{{ $tags[0] }}</a></span>
                                                    <span><a href="single-episodes-v1.html" class="h-g-primary"
                                                            tabindex="0">{{ $tags[0] }}</a></span>
                                                </div>
                                                <div class="product-title font-size-19 font-weight-bold mb-0 text-center">
                                                    <a href="single-episodes-v1.html" tabindex="0">{{ Str::limit($item->title,30) }}</a>
                                                </div>
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
    </main>
@endsection
