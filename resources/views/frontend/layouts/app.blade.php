<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo2.madrasthemes.com/vodi-html/html-demo/home/home-v10.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Jun 2022 10:25:36 GMT -->

<head>

    <title>Agility Adult-</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="https://demo2.madrasthemes.com/vodi-html/favicon.ico">

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&amp;family=Open+Sans:wght@300;400;600;700;800&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/dzsparallaxer/dzsparallaxer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/cubeportfolio/css/cubeportfolio.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/fancybox/dist/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/select2/dist/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/theme.css') }}">
    <!-- font awesome kit code -->
    <script src="https://kit.fontawesome.com/4835d1ece4.js" crossorigin="anonymous"></script>
    @yield('extra-css')
</head>

<body>

    @include('frontend.partials._header')


    @yield('content')


    @include('frontend.partials._footer')



    @include('frontend.partials._auth')

    <a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;" data-hs-go-to-options='{
            "offsetTop": 700,
            "position": {
                "init": {
                    "right": 15
                },
                "show": {
                    "bottom": 15
                },
                "hide": {
                    "bottom": -15
                }
            }
        }'>
        <i class="fas fa-angle-up"></i>
    </a>


    <script src="{{ asset('frontend/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/vendor/hs-header/dist/hs-header.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/hs-go-to/dist/hs-go-to.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/hs-unfold/dist/hs-unfold.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/hs-show-animation/dist/hs-show-animation.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/hs-sticky-block/dist/hs-sticky-block.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/hs-counter/dist/hs-counter.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/appear.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/cubeportfolio/js/jquery.cubeportfolio.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/dzsparallaxer/dzsparallaxer.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/slick-carousel/slick/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/fancybox/dist/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/select2/dist/js/select2.full.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/hs.core.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/hs.validation.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/hs.cubeportfolio.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/hs.slick-carousel.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/hs.fancybox.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/hs.select2.js') }}"></script>

    <script>
        $(document).on('ready', function () {
            // initialization of header
            var header = new HSHeader($('#header')).init();

            // initialization of mega menu
            var megaMenu = new HSMegaMenu($('.js-mega-menu'), {
                desktop: {
                    position: 'left'
                }
            }).init();

            // initialization of fancybox
            $('.js-fancybox').each(function () {
                var fancybox = $.HSCore.components.HSFancyBox.init($(this));
            });

            // initialization of unfold
            var unfold = new HSUnfold('.js-hs-unfold-invoker').init();


            // initialization of slick carousel
            $('.js-slick-carousel').each(function () {
                var slickCarousel = $.HSCore.components.HSSlickCarousel.init($(this));
            });

            // initialization of form validation
            $('.js-validate').each(function () {
                $.HSCore.components.HSValidation.init($(this), {
                    rules: {
                        confirmPassword: {
                            equalTo: '#signupPassword'
                        }
                    }
                });
            });

            // initialization of show animations
            $('.js-animation-link').each(function () {
                var showAnimation = new HSShowAnimation($(this)).init();
            });

            // initialization of counter
            $('.js-counter').each(function () {
                var counter = new HSCounter($(this)).init();
            });

            // initialization of sticky block
            var cbpStickyFilter = new HSStickyBlock($('#cbpStickyFilter'));

            // initialization of cubeportfolio
            $('.cbp').each(function () {
                var cbp = $.HSCore.components.HSCubeportfolio.init($(this), {
                    layoutMode: 'grid',
                    filters: '#filterControls',
                    displayTypeSpeed: 0
                });
            });

            $('.cbp').on('initComplete.cbp', function () {
                // update sticky block
                cbpStickyFilter.update();

                // initialization of aos
                AOS.init({
                    duration: 650,
                    once: true
                });
            });

            $('.cbp').on('filterComplete.cbp', function () {
                // update sticky block
                cbpStickyFilter.update();

                // initialization of aos
                AOS.init({
                    duration: 650,
                    once: true
                });
            });

            $('.cbp').on('pluginResize.cbp', function () {
                // update sticky block
                cbpStickyFilter.update();
            });

            // animated scroll to cbp container
            $('#cbpStickyFilter').on('click', '.cbp-filter-item', function (e) {
                $('html, body').stop().animate({
                    scrollTop: $('#demoExamplesSection').offset().top
                }, 200);
            });

            // initialization of go to
            $('.js-go-to').each(function () {
                var goTo = new HSGoTo($(this)).init();
            });

            // initialization of select picker
            $('.js-custom-select').each(function () {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });
        });
    </script>

    <script>
        if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="../../assets/vendor/polifills.js"><\/script>');
    </script>

    @yield('extra-js')
</body>

</html>