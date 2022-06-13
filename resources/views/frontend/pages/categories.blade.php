@extends('frontend.layouts.app')

@section('content')
    <main id="content">
        <div class="bg-gray-1100">
            <div class="container px-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb dark font-size-1">
                        <li class="breadcrumb-item">
                            <a href="{{ route('pages.index') }}" class="text-gray-1300">Home</a>
                        </li>
                        <li class="breadcrumb-item text-white active" aria-current="page">
                            Categories
                        </li>
                    </ol>
                </nav>
                <div class="row">
                    <div class="col-lg-auto d-none d-xl-block">
                        <div class="w-md-352rem space-bottom-2">
                            <div class="bg-gray-3100 px-3 pt-4 pb-6 mb-4">
                                <div class="mx-1">
                                    <form action="{{ route('pages.searchInput') }}" class="input-group input-group-merge mb-3 pb-1" method="POST">
                                        @csrf
                                        <input type="search" name="search"
                                            class="form-control font-size-1 font-secondary bg-gray-3800 border-gray-3800 rounded-0"
                                            placeholder="Search..." aria-label="Search an app"
                                            aria-describedby="searchApp" />
                                        <div class="input-group-append">
                                            <button class="input-group-text" id="searchApp" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18">
                                                    <path fill="rgb(151,151,159)"
                                                        d="M7 0C11-0.1 13.4 2.1 14.6 4.9 15.5 7.1 14.9 9.8 13.9 11.4 13.7 11.7 13.6 12 13.3 12.2 13.4 12.5 14.2 13.1 14.4 13.4 15.4 14.3 16.3 15.2 17.2 16.1 17.5 16.4 18.2 16.9 18 17.5 17.9 17.6 17.9 17.7 17.8 17.8 17.2 18.3 16.7 17.8 16.4 17.4 15.4 16.4 14.3 15.4 13.3 14.3 13 14.1 12.8 13.8 12.5 13.6 12.4 13.5 12.3 13.3 12.2 13.3 12 13.4 11.5 13.8 11.3 14 10.7 14.4 9.9 14.6 9.2 14.8 8.9 14.9 8.6 14.9 8.3 14.9 8 15 7.4 15.1 7.1 15 6.3 14.8 5.6 14.8 4.9 14.5 2.7 13.6 1.1 12.1 0.4 9.7 0 8.7-0.2 7.1 0.2 6 0.3 5.3 0.5 4.6 0.9 4 1.8 2.4 3 1.3 4.7 0.5 5.2 0.3 5.7 0.2 6.3 0.1 6.5 0 6.8 0.1 7 0ZM7.3 1.5C7.1 1.6 6.8 1.5 6.7 1.5 6.2 1.6 5.8 1.7 5.4 1.9 3.7 2.5 2.6 3.7 1.9 5.4 1.7 5.8 1.7 6.2 1.6 6.6 1.4 7.4 1.6 8.5 1.8 9.1 2.4 11.1 3.5 12.3 5.3 13 5.9 13.3 6.6 13.5 7.5 13.5 7.7 13.5 7.9 13.5 8.1 13.5 8.6 13.4 9.1 13.3 9.6 13.1 11.2 12.5 12.4 11.4 13.1 9.8 13.6 8.5 13.6 6.6 13.1 5.3 12.2 3.1 10.4 1.5 7.3 1.5Z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                    <div class="bg-gray-3100 pt-5 pb-1 px-3">
                                        <div class="mx-1">
                                            <div
                                                class="border-bottom d-xl-flex pb-2d mb-2 align-items-center border-gray-3200">
                                                <h3 class="font-size-22 text-white mb-xl-0 font-weight-medium">
                                                    Main Categories
                                                </h3>
                                            </div>

                                            <div>
                                                <ol class="list-counter v1 list-unstyled">
                                                    @foreach ($categories as $item)
                                                        <li
                                                            class="d-flex border-gray-3200 pl-5 border-bottom py-2d align-items-center">
                                                            <div class="">
                                                                <h6 class="mb-0 font-size-14">
                                                                    <form method="GET"
                                                                        action="{{ route('pages.categories') }}">
                                                                        <input type="hidden" name="c"
                                                                            value="{{ $item->id }}" />
                                                                            <input
                                                                                type="hidden"
                                                                                name="t"
                                                                                value="{{ $item->title }}" />
                                                                        <a onclick="this.parentNode.submit();"
                                                                            class="text-white">{{ $item->title }}</a>
                                                                    </form>
                                                                </h6>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <section class="py-5">
                            <div class="mb-4">
                                <div class="home-section mb-5">
                                    <header
                                        class="d-md-flex align-items-center justify-content-between mb-3 mb-lg-1 pb-2 w-100 border-bottom border-gray-3900">
                                        <h6
                                            class="d-block position-relative font-size-24 font-weight-medium overflow-md-hidden m-0 text-white">
                                            Categories
                                        </h6>
                                    </header>
                                    <div class="d-xl-flex align-items-center justify-content-between">
                                        <div class="d-xl-flex align-items-center">
                                            <div class="d-flex align-items-center ml-auto">
                                                <div class="hs-unfold d-xl-none">
                                                    <a class="js-hs-unfold-invoker text-white font-weight-bold"
                                                        href="javascript:;" data-hs-unfold-options='{
                                                                                        "target": "#sidebarContent-menu",
                                                                                        "type": "css-animation",
                                                                                        "animationIn": "fadeInLeft",
                                                                                        "animationOut": "fadeOutLeft",
                                                                                        "hasOverlay": "rgba(55, 125, 255, 0.1)",
                                                                                        "smartPositionOff": true
                                                                                    }'><i
                                                            class="fas fa-sliders-h"></i><span
                                                            class="ml-2 font-secondary">FILTERS</span>
                                                    </a>
                                                </div>

                                                <aside id="sidebarContent-menu"
                                                    class="hs-unfold-content sidebar sidebar-left">
                                                    <div class="sidebar-scroller bg-gray-3100">
                                                        <div class="sidebar-container">
                                                            <div class="sidebar-footer-offset" style="padding-bottom: 7rem">
                                                                <div
                                                                    class="d-flex justify-content-end align-items-center pt-4 px-4">
                                                                    <div class="hs-unfold">
                                                                        <a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-soft-secondary"
                                                                            href="javascript:;" data-hs-unfold-options='{
                                                                                                            "target": "#sidebarContent-menu",
                                                                                                            "type": "css-animation",
                                                                                                            "animationIn": "fadeInleft",
                                                                                                            "animationOut": "fadeOutLeft",
                                                                                                            "hasOverlay": "rgba(55, 125, 255, 0.1)",
                                                                                                            "smartPositionOff": true
                                                                                                        }'>
                                                                            <svg width="10" height="10" viewBox="0 0 18 18"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill="currentColor"
                                                                                    d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
                                                                            </svg>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="scrollbar sidebar-body">
                                                                    <div class="sidebar-content py-4 px-3">
                                                                        <div class="">
                                                                            <div class="sidebar-area">
                                                                                <div class="bg-gray-3100 pt-4 pb-6 mb-4">
                                                                                    <div class="mx-1">
                                                                                        <form action="{{ route('pages.searchInput') }}"
                                                                                            class="input-group input-group-merge mb-3 pb-1" method="POST">
                                                                                            <input type="search" name="search"
                                                                                                class="form-control font-size-1 font-secondary bg-gray-3800 border-gray-3800 rounded-0"
                                                                                                placeholder="Search..."
                                                                                                aria-label="Search an app"
                                                                                                aria-describedby="searchApp" />
                                                                                            <div class="input-group-append">
                                                                                                <span
                                                                                                    class="input-group-text"
                                                                                                    id="searchApp-1">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                        width="18"
                                                                                                        height="18">
                                                                                                        <path
                                                                                                            fill="rgb(151,151,159)"
                                                                                                            d="M7 0C11-0.1 13.4 2.1 14.6 4.9 15.5 7.1 14.9 9.8 13.9 11.4 13.7 11.7 13.6 12 13.3 12.2 13.4 12.5 14.2 13.1 14.4 13.4 15.4 14.3 16.3 15.2 17.2 16.1 17.5 16.4 18.2 16.9 18 17.5 17.9 17.6 17.9 17.7 17.8 17.8 17.2 18.3 16.7 17.8 16.4 17.4 15.4 16.4 14.3 15.4 13.3 14.3 13 14.1 12.8 13.8 12.5 13.6 12.4 13.5 12.3 13.3 12.2 13.3 12 13.4 11.5 13.8 11.3 14 10.7 14.4 9.9 14.6 9.2 14.8 8.9 14.9 8.6 14.9 8.3 14.9 8 15 7.4 15.1 7.1 15 6.3 14.8 5.6 14.8 4.9 14.5 2.7 13.6 1.1 12.1 0.4 9.7 0 8.7-0.2 7.1 0.2 6 0.3 5.3 0.5 4.6 0.9 4 1.8 2.4 3 1.3 4.7 0.5 5.2 0.3 5.7 0.2 6.3 0.1 6.5 0 6.8 0.1 7 0ZM7.3 1.5C7.1 1.6 6.8 1.5 6.7 1.5 6.2 1.6 5.8 1.7 5.4 1.9 3.7 2.5 2.6 3.7 1.9 5.4 1.7 5.8 1.7 6.2 1.6 6.6 1.4 7.4 1.6 8.5 1.8 9.1 2.4 11.1 3.5 12.3 5.3 13 5.9 13.3 6.6 13.5 7.5 13.5 7.7 13.5 7.9 13.5 8.1 13.5 8.6 13.4 9.1 13.3 9.6 13.1 11.2 12.5 12.4 11.4 13.1 9.8 13.6 8.5 13.6 6.6 13.1 5.3 12.2 3.1 10.4 1.5 7.3 1.5Z">
                                                                                                        </path>
                                                                                                    </svg>
                                                                                                </span>
                                                                                            </div>
                                                                                        </form>
                                                                                        <div class="bg-gray-3100 pt-5 pb-1">
                                                                                            <div class="mx-1">
                                                                                                <div
                                                                                                    class="border-bottom d-xl-flex pb-2d mb-2 align-items-center border-gray-3200">
                                                                                                    <h3
                                                                                                        class="font-size-22 text-white mb-xl-0 font-weight-medium">
                                                                                                        Popular Now TV Shows
                                                                                                    </h3>
                                                                                                </div>

                                                                                                <div>
                                                                                                    <ol
                                                                                                        class="list-counter v1 list-unstyled">
                                                                                                        @foreach ($categories as $item)
                                                                                                            <li
                                                                                                                class="d-flex border-gray-3200 pl-5 border-bottom py-2d align-items-center">
                                                                                                                <div
                                                                                                                    class="">
                                                                                                                    <form
                                                                                                                        method="GET"
                                                                                                                        action="{{ route('pages.categories') }}">
                                                                                                                        <input
                                                                                                                            type="hidden"
                                                                                                                            name="c"
                                                                                                                            value="{{ $item->id }}" />
                                                                                                                        <input
                                                                                                                            type="hidden"
                                                                                                                            name="t"
                                                                                                                            value="{{ $item->title }}" />
                                                                                                                        <a onclick="this.parentNode.submit();"
                                                                                                                            class="text-white">{{ $item->title }}</a>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                            </li>
                                                                                                        @endforeach
                                                                                                    </ol>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </aside>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content dark mb-4">
                                <div class="tab-pane fade show active" id="pills-one-example1" role="tabpanel"
                                    aria-labelledby="pills-one-example1-tab">
                                    <div class="border-bottom border-gray-3800 mb-4 pb-5">
                                        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 mx-n2">
                                            @foreach ($sub_cat as $item)
                                                <div class="col px-2">
                                                    <div class="product mb-4 pb-1 text-center">
                                                        <form>
                                                            <div class="product-image mb-2">
                                                                <a class="d-block position-relative stretched-link" href="{{ route('pages.search',$cat_title.' '.$item->title) }}">
                                                                    <img class="img-fluid" style="max-height:110px;max-width:100%;display: block;margin-left: auto;margin-right: auto;" src="{{ $item->poster }}"
                                                                        alt="Image-Description" />
                                                                </a>
                                                            </div>
                                                            <h6
                                                                class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
                                                                <a href="{{ route('pages.search',$cat_title.' '.$item->title) }}">{{ $item->title }}</a>
                                                            </h6>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ $sub_cat->onEachSide(0)->links('frontend.partials._pagination') }}
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
