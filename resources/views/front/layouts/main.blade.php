<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <link rel="shortcut icon" href="/front/favicon.ico" type="image/png" />

        <link rel="stylesheet" href="/front/maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <link href="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/social-buttons.scss.css" rel="stylesheet" type="text/css"
            media="all" />

        <link rel="stylesheet" type="text/css" href="/front/fonts.googleapis.com/css/bitter.css">

        <link href="/front/maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"
        />

        <link href="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/animate.min.css" rel="stylesheet" type="text/css" media="all"
        />

        <link href="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/owl.carousel.css" rel="stylesheet" type="text/css" media="all"
        />

        <link href="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/cs-cosmetics.global.scss.css" rel="stylesheet" type="text/css"
            media="all" />

        <link href="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/cs-cosmetics.styles.scss.css" rel="stylesheet" type="text/css"
            media="all" />

        <script src="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/html5shiv.js" type="text/javascript"></script>

        <script src="/front/ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>

        <script src="/front/cdn.shopify.com/s/assets/themes_support/option_selection-ea4f4a242e299f2227b2b8038152223f741e90780c0c766883939e8902542bda.js"
            type="text/javascript"></script>

        <script src="/front/cdn.shopify.com/s/assets/themes_support/api.jquery-0ea851da22ae87c0290f4eeb24bc8b513ca182f3eb721d147c009ae0f5ce14f9.js"
            type="text/javascript"></script>

        <script src="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/scripts.js" type="text/javascript"></script>

        <script src="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/social-buttons.js" type="text/javascript"></script>

        <script src="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/jquery.flexslider-min.js" type="text/javascript"></script>

        <script src="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/jquery.zoom.js" type="text/javascript"></script>

        <script src="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/jquery.fancybox.js" type="text/javascript"></script>

        <script src="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/jquery.fancybox.pack.js" type="text/javascript"></script>
        <link href="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/jquery.fancybox.pack.css" rel="stylesheet" type="text/css"
            media="all" />

        <script src="/front/maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="/front/cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.0/isotope.pkgd.min.js" type="text/javascript"></script>

        <script src="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/imagesloaded.pkgd.min.js" type="text/javascript"></script>

        <script src="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/instafeed.min.js" type="text/javascript"></script>

        <link rel="stylesheet" href="/front/app/css/main.css">

        <!-- Page specific stylesheets -->
        @yield('styles')
    </head>

    <body class="{{ implode(' ', $classes ?? []) }}">
        @include(user_env('partials.header'))

        <div class="fix-sticky"></div>

        <div id="main-content" class="wrapper clearfix">
            @yield('content') @include(user_env('partials.footer'))

            <script src="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/modernizr.js" type="text/javascript"></script>

            <script src="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/classie.js" type="text/javascript"></script>

            <script src="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/jquery.bxslider.min.js" type="text/javascript"></script>

            <script src="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/owl.carousel.min.js" type="text/javascript"></script>

            <script src="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/cs-cosmetics.script.js" type="text/javascript"></script>

            <script src="/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/cs-cosmetics.optionSelect.js" type="text/javascript"></script>

            <script src="/front/app/js/main.js" type="text/javascript"></script>

            <script>
                $(document).ready(function (e) {
                    $('#messageModal').modal();
                });

                $(window).ready(function ($) {
                    $('.megamenu-container-1 .megamenu-container-2').css("width", $('.main-header-inner').innerWidth());
                });

                $(window).resize(function () {
                    $('.megamenu-container-1 .megamenu-container-2').css("width", $('.main-header-inner').innerWidth());
                });

                $(window).scroll(function () {
                    var scrollTop = $(this).scrollTop();
                    addaffix(scrollTop);
                });

                function addaffix(scr) {
                    if ($(window).innerWidth() >= 992) {
                        if (scr > 87) {
                            if (!$('#top').hasClass('affix')) {
                                $('#top').addClass('affix').addClass('');
                            }
                        } else {
                            if ($('#top').hasClass('affix')) {
                                $('#top').prev().remove();
                                $('#top').removeClass('affix').removeClass('');
                            }
                        }
                    } else $('#top').removeClass('affix');
                }
            </script>

            <!-- Page specific scripts -->
            @yield('scripts')
        </div>
        <!--/. App -->
    </body>
</html>