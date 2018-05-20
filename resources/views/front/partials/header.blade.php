<div id="newsletter-popup" class="modal fade" style="display: none;" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="nl-wraper-popup bounceInDown" style="background-image: url(/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/mailing_bg.png?17231127553059638277)">
        <div class="nl-wraper-popup-inner">
            <form action="https://codespot.us5.list-manage.com/subscribe/post?u=ed73bc2d2f8ae97778246702e&amp;id=c63b4d644d" method="post"
                name="mc-embedded-subscribe-form" target="_blank">
                <h4>Newsletter</h4>
                <p>Welcome to demo store. This popup content can be edited in the Customize Setting.
                    <br/> - You can turn it on/off.
                    <br/> - You can edit text
                    <br/> - You can configure timeout to auto-hide easily. (default is 20s)</p>
                <div class="group_input">
                    <input class="form-control" type="email" name="EMAIL" placeholder="Enter your email address..." />
                    <button class="btn" type="submit">
                        <i class="fa fa-paper-plane" data-toggle="tooltip" data-placement="top" title="Submit"></i>
                    </button>
                </div>
            </form>
            <div id="popup-hide">
                <input type="checkbox" id="mc-popup-hide" value="0" onclick="checkcookie()" checked="checked">
                <label for="mc-popup-hide">Don't show this popup again</label>
            </div>
            <div class="nl-popup-close">
                <span onclick="$('#newsletter-popup').modal('hide')" data-toggle="tooltip" data-placement="top" title="Close">
                    <i class="fa fa-times"></i>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- Header -->
<header id="top" class="cosmetics_home3 clearfix">
    <section class="top-header">
        <div class="top-header-wrapper">
            <div class="container">
                <div class="row">
                    <div class="top-header-inner">
                        <div class="left-area hidden-xs">
                            <!-- Customer Links -->
                            <ul class="unstyled">
                                <li class="toolbar-customer login-account">
                                    <span id="loginButton">
                                        <i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
                                        <i class="sub-dropdown visible-sm visible-md visible-lg"></i>
                                        <a href="#" class=""> . </a>
                                        <!--{{ route(user_env().'.login') }}-->
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="right-area hidden-xs">
                            <ul class="unstyled">
                                <li class="search-field fl">
                                    <a href="/search" class="search dropdown-toggle dropdown-link" data-toggle="dropdown" title="Search Toolbar">
                                        <img src="//cdn.shopify.com/s/files/1/1286/1471/t/2/assets/icon-search.png?17601579617009295893" alt="search icon" />
                                        <i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
                                        <i class="sub-dropdown visible-sm visible-md visible-lg"></i>
                                    </a>
                                    <div id="search-info" class="dropdown-menu">
                                        <form class="search" action="/search">
                                            <input type="hidden" name="type" value="product" />
                                            <input type="image" src="//cdn.shopify.com/s/files/1/1286/1471/t/2/assets/icon-search.png?17601579617009295893" alt="Go"
                                                id="go">
                                            <input type="text" name="q" class="search_box" placeholder="Search something ..." value="" />
                                        </form>
                                        <!--<div class="fix_search_dropdown" style="opacity:0; height:200px;background:transparent;"></div>-->
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="main-header">
        <div class="main-header-wrapper">
            <div class="container clearfix">
                <div class="row">
                    <div class="main-header-inner">
                        <div class="nav-logo">
                            <div class="logo">
                                <h1>
                                    <a href="{{ route(user_env().'.home') }}">
                                        <img src="/front/logo.png" alt="" />
                                    </a>
                                </h1>
                            </div>
                        </div>
                        <div class="navigation_area">
                            <ul class="navigation_links">
                                <li class="nav-item dropdown navigation">
                                    <a href="#" class="dropdown-toggle dropdown-link" data-toggle="dropdown">
                                        <span>Sell AuraRich</span>
                                        <i class="fa fa-angle-down"></i>
                                        <i class="sub-dropdown1  visible-sm visible-md visible-lg"></i>
                                        <i class="sub-dropdown visible-sm visible-md visible-lg"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class=" dropdown li-sub-mega">
                                            <a href="{{ route(user_env().'.about') }}">
                                                <span>About Us</span>

                                                <i class="sub-dropdown1  visible-sm visible-md visible-lg"></i>
                                                <i class="sub-dropdown visible-sm visible-md visible-lg"></i>
                                            </a>

                                        </li>
                                        <li class=" dropdown li-sub-mega">
                                            <a href="{{ route(user_env().'.getstarted') }}">
                                                <span>Sell Aura Rich</span>
                                                <i class="sub-dropdown1  visible-sm visible-md visible-lg"></i>
                                                <i class="sub-dropdown visible-sm visible-md visible-lg"></i>
                                            </a>

                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route(user_env().'.deals') }}">
                                        <span>Deals</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route(user_env().'.products.index') }}">
                                        <span>Products</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route(user_env().'.news') }}">
                                        <span>News</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route(user_env().'.distributors') }}">
                                        <span>Distributors</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown navigation">
                                    @auth
                                        <a href="#" class="dropdown-toggle dropdown-link" data-toggle="dropdown">
                                            <span>My account</span>
                                            <i class="fa fa-angle-down"></i>
                                            <i class="sub-dropdown1  visible-sm visible-md visible-lg"></i>
                                            <i class="sub-dropdown visible-sm visible-md visible-lg"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class=" dropdown li-sub-mega">
                                                <a href="{{ route(user_env().'.account.profile') }}">
                                                    <span>My profile</span>
                                                    <i class="sub-dropdown1  visible-sm visible-md visible-lg"></i>
                                                    <i class="sub-dropdown visible-sm visible-md visible-lg"></i>
                                                </a>
                                            </li>
                                            <li class=" dropdown li-sub-mega">
                                                <a href="{{ route(user_env().'.account.password') }}">
                                                    <span>My password</span>
                                                    <i class="sub-dropdown1  visible-sm visible-md visible-lg"></i>
                                                    <i class="sub-dropdown visible-sm visible-md visible-lg"></i>
                                                </a>
                                            </li>
                                            <li class=" dropdown li-sub-mega">
                                                <a href="/logout">
                                                    <span>Logout</span>
                                                    <i class="sub-dropdown1  visible-sm visible-md visible-lg"></i>
                                                    <i class="sub-dropdown visible-sm visible-md visible-lg"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    @else
                                        <a href="#" class="dropdown-toggle dropdown-link" data-toggle="dropdown">
                                            <span>My account</span>
                                            <i class="fa fa-angle-down"></i>
                                            <i class="sub-dropdown1  visible-sm visible-md visible-lg"></i>
                                            <i class="sub-dropdown visible-sm visible-md visible-lg"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class=" dropdown li-sub-mega">
                                                <a href="{{ route(user_env().'.register') }}">
                                                    <span>Register</span>
                                                    <i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
                                                    <i class="sub-dropdown visible-sm visible-md visible-lg"></i>
                                                </a>
                                            </li>
                                            <li class=" dropdown li-sub-mega">
                                                <a href="{{ route(user_env().'.login') }}">
                                                    <span>Login</span>
                                                    <i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
                                                    <i class="sub-dropdown visible-sm visible-md visible-lg"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    @endauth
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route(user_env().'.faqs') }}">
                                        <span>FAQs</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route(user_env().'.tutorials.index') }}">
                                        <span>Tutorials</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="mobile-top-navigation visible-xs">
                            <button id="showLeftPush" class="visible-xs">
                                <i class="fa fa-bars fa-2x"></i>
                            </button>
                            <ul class="list-inline">
                                <li class="is-mobile-login">
                                    <div class="btn-group">
                                        <div class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <ul class="customer dropdown-menu">
                                            <li class="logout">
                                                <a href="/account/login">Login</a>
                                            </li>
                                            <li class="account">
                                                <a href="/account/register">Create an account</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="is-mobile-nav-menu nav-menu visible-xs" id="is-mobile-nav-menu">
                            <ul class="nav navbar-nav hoverMenuWrapper">
                                <li class="nav-item">
                                    <a href="/">
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown navigation">
                                    <a href="/collections/all" class="dropdown-toggle dropdown-link" data-toggle="dropdown">
                                        <span>Shop</span>
                                        <i class="fa fa-angle-down"></i>
                                        <i class="sub-dropdown1  visible-sm visible-md visible-lg"></i>
                                        <i class="sub-dropdown visible-sm visible-md visible-lg"></i>
                                    </a>
                                    <ul class="navigation_links">
                                        <li class="nav-item active">
                                            <a href="{{ route(user_env().'.home') }}">
                                                <span>Products</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/">
                                                <span>Tutorials</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/">
                                                <span>Distributors</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="nav-item active">
                                    <a href="/">
                                        <span>Contact Us</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mobile-nav">
        <div class="row mobile-nav-wrapper">
            <nav class="mobile clearfix">
                <div class="flyout">
                    <ul class="clearfix">
                        <li>
                            <a href="/" class=" current navlink">
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="/collections/all" class=" navlink">
                                <span>Catalog</span>
                            </a>
                        </li>
                        <li>
                            <a href="/blogs/news" class=" navlink">
                                <span>Blog</span>
                            </a>
                        </li>
                        <li>
                            <a href="/pages/about-us" class=" navlink">
                                <span>About us</span>
                            </a>
                        </li>
                        <li class="customer-links">Sign in</li>
                        <li class="customer-links">Create an account</li>
                        <li class="search-field">
                            <form class="search" action="/search" id="search">
                                <input type="image" src="//cdn.shopify.com/s/files/1/1286/1471/t/2/assets/icon-search.png?17231127553059638277" alt="Go"
                                    id="mobile_go" class="go" />
                                <input type="text" name="q" class="search_box" placeholder="Search something ..." value="" />
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>
    <script>
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
</header>