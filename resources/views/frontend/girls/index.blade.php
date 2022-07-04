@extends('frontend.layouts.app')

@section('extra-css')
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
@endsection

@section('content')
    <main id="content">
        <section class="bg-gray-1100 dark">
            <div class="container px-md-4">
                <div class="row row-cols-md-5 row-cols-xl">
                    @foreach ($girls as $item)
                        <div class="col-12 col-xl mb-5 pb-2 mb-xl-0" style="border:1px solid white;">
                            <div class="product">
                                <div class="product-title font-weight-bold font-size-2 text-center mt-1"><a
                                        href="{{ $item->link }}">{{ $item->name }}</a>
                                </div>
                                <a href="{{ $item->link }}">
                                    <div class="product-image mb-1 mt-2">
                                        <!-- Swiper -->
                                        <div class="swiper mySwiper">
                                            <div class="swiper-wrapper">
                                                @foreach ($item->images as $image)
                                                    <img src="{{ asset('storage/girls/images/' . $image) }}"
                                                        class="swiper-slide" alt="{{ $item->name }}">
                                                @endforeach
                                            </div>
                                            <!-- Add Arrows -->
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                            <!-- Add Pagination -->
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                </a>
                                {!! $item->info !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection

@section('extra-js')
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 5,
            autoHeight: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                "@0.00": {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                "@0.75": {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                "@1.00": {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                "@1.50": {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            },
        });
    </script>
@endsection
