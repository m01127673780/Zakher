<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <title>@yield('title') | @if (app()->getLocale() == "ar")
        {{$settings->site_title_ar}}
        @else
        {{$settings->site_title_en}}
        @endif
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" ">
    <!--    ------------------------------------------------------------------------------------------>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script type="module">
        import Swiper from 'https://unpkg.com/swiper/swiper-bundle.esm.browser.min.js'


        var mySwiper = new Swiper('.swiper-container', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        })
    </script>

    <!--  start owl crousel ---------------------------------------------------------------------------->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!--  End   owl crousel ------------------------------------------------------------------------------>
    <link rel="stylesheet" type="text/css" href="{{asset('siteAssets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('siteAssets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('siteAssets/fonts/themify/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('siteAssets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('siteAssets/fonts/elegant-font/html-css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('siteAssets/vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('siteAssets/vendor/css-hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('siteAssets/vendor/animsition/css/animsition.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('siteAssets/vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('siteAssets/vendor/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('siteAssets/vendor/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('siteAssets/vendor/lightbox2/css/lightbox.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('siteAssets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('siteAssets/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('siteAssets/css/main.css')}}">

    <link rel="stylesheet" href="{{asset('siteAssets/css/overwrite.css')}}">
    @stack('css')

    @if (app()->getLocale() == "ar")
    <link rel="stylesheet" type="text/css" type="text/css" href="{{asset('siteAssets/css/rtl.css')}}">
    @endif

    @livewireStyles
</head>

<body class="rtl">

    @include('layouts.website.includes.header')

    @yield('content')

    @include('layouts.website.includes.footer')

    <div id="dropDownSelect1"></div>
    <script type="text/javascript" src="{{asset('siteAssets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('siteAssets/vendor/animsition/js/animsition.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('siteAssets/vendor/bootstrap/js/popper.js')}}"></script>
    <script type="text/javascript" src="{{asset('siteAssets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('siteAssets/vendor/select2/select2.min.js')}}"></script>
    <script type="text/javascript">
        $(".selection-1").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });
    </script>
    <script type="text/javascript" src="{{asset('siteAssets/vendor/slick/slick.min.js')}}"></script>

    <!-- For RTL -->


    @if (app()->getLocale() == "ar")
    <script type="text/javascript" src="{{asset('siteAssets/js/slick-custom-rtl.js')}}"></script>
    <script type="text/javascript" src="{{asset('siteAssets/js/homeSliders-rtl.js')}}"></script>

    @else
    <script>
        $(document).ready(function () {
            $("body").removeClass("rtl");
        });
    </script>
    <script type="text/javascript" src="{{asset('siteAssets/js/slick-custom.js')}}"></script>
    <script src="{{asset('siteAssets/js/homeSliders.js')}}"></script>
    @endif

    <script type="text/javascript" src="{{asset('siteAssets/vendor/countdowntime/countdowntime.js')}}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>




    <script>
        $(document).ready(function () {
            $(".owl-carousel").owlCarousel();
        });
    </script>
    <!--  End   owl crousel ------------------------------------------------------------------------------>


    <script type="text/javascript" src="{{asset('siteAssets/vendor/lightbox2/js/lightbox.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('siteAssets/vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
        $('.block2-btn-addcart').each(function () {
            var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
            $(this).on('click', function () {
                swal(nameProduct, "is added to cart !", "success");
            });
        });
        $('.block2-btn-addwishlist').each(function () {
            var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
            $(this).on('click', function () {
                swal(nameProduct, "is added to wishlist !", "success");
            });
        });
    </script>
    <script src="{{asset('siteAssets/js/main.js')}}"></script>


    <script>
        $(document).ready(function () {
            function alignModal() {
                var modalDialog = $(this).find(".modal-dialog");

                // Applying the top margin on modal dialog to align it vertically center
                modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
            }
            // Align modal when it is displayed
            $(".modal").on("shown.bs.modal", alignModal);


        });
    </script>
    <!--    -->
    <script>
        $(".zoomWrapper img").click(function () {
            $(this).toggleClass("flasher");
        });
    </script>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>

    @stack('scripts')

    @livewireScripts
</body>

</html>