<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>

        <!-- Pre-loaded script -->
        <script>
            window.onload = function(e) {
                try {
                    WebFont.load({
                        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                        active: function() {
                            sessionStorage.fonts = true;
                        }
                    });
                } catch (e) {
                    //
                }
            };
        </script>
        <!--/. Pre-loaded script -->

        <!-- App icon -->
        <link rel="shortcut icon" href="/root/assets/demo/demo2/media/img/logo/favicon.ico" />

        <!-- Vendor bundle -->
        <link href="/root/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />

        <!-- Demo 2 bundle -->
        <link href="/root/assets/demo/demo2/base/style.bundle.css" rel="stylesheet" type="text/css" />

        <!-- Main -->
        <link href="/root/assets/app/css/main.css" rel="stylesheet" type="text/css" />

        <!-- Page specific stylesheets -->
        @yield('styles')
    </head>

    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
        <!-- begin::Page loader -->
        <div class="m-page-loader m-page-loader--base">
            <div class="m-blockui">
                <span>Please wait...</span>
                <span><div class="m-loader m-loader--brand"></div></span>
            </div>
        </div>
        <!-- end::Page Loader -->

        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            @yield('content')
        </div>
        <!-- end:: Page -->

        <!-- Vendor bundle -->
        <script src="/root/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>

        <!-- Demo 2 bundle -->
        <script src="/root/assets/demo/demo2/base/scripts.bundle.js" type="text/javascript"></script>

        <!-- Main -->
        <script src="/root/assets/app/js/main.js" type="text/javascript"></script>

        <!-- Post-loaded script -->
        <script>
            window.onload = function(e) {
                try {
                    document.getElementById('body').classList.remove("m-page--loading");
                    document.getElementById('app').style.display="block";
                } catch (e) {
                    //
                }
            };

        </script>
        <!--/. Post-loaded script -->
        
        <!-- Page specific scripts -->
        @yield('scripts')
    </body>
</html>