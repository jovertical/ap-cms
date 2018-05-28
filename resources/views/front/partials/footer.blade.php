
<!-- Message -->
@if (Session::has('message'))
    @component(user_env().'.components.modal')
        {!! Session::get('message.content') !!}
    @endcomponent
@endif

<!-- Footer -->
<footer>
    <section class="newsletter-block">
        <div class="newsletter-wrapper" style="background-image:url('/front/footer_newsletter_bkg.jpg')">
            <div class="container">
                <div class="row">
                    <div class="newsletter-inner">
                        <div class="dis_table">
                            <div class="dis_tablecell">
                                <div class="newsletter-title home-title">
                                    <h4>EMAIL FOR NEWSLETTER</h4>
                                </div>
                                <div class="newsletter-subtext">
                                    For more information and updates please subscribe to our
                                    newsletter to receive emails from {{ $app['name'] }} automatically.
                                </div>
                                <div class="footer-newsletter-content">
                                    <form method="POST" action="{{ route(user_env().'.newsletter.store') }}">
                                        @csrf

                                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                                            placeholder="Enter your email address">

                                        <input type="submit" class="btn newsletter" value="Subcribe" name="subscribe" id="subscribe">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="information-block">
        <div class="information-wrapper">
            <div class="container">
                <div class="row">
                    <div class="information-inner">
                        <div class="footer_infologo">
                            <a href="{{ route(user_env().'.home') }}">
                                <img src="/front/logo1.png" alt="" />
                            </a>
                        </div>
                        <div class="footer_content">
                            <div class="footer-block01 about-us col-ms-5 col-md-5">
                                <div class="footer-title "><h5>About us</h5></div>
                                <div class="fi-aboutus-content">
                                    <div class="top"><i> {!! Str::limit($app['about'], 355) !!} </i></div>
                                    <div class="bottom">
                                        <div class="address"><i class="fa fa-home"></i> {!! $app['address'] !!} </div>
                                        <!--<div class="email"><i class="fa fa-envelope"></i> jessica@aurarich.com.ph </div>
                                        <div class="email"><i class="fa fa-envelope"></i> dave@aurarich.com.ph </div>-->
                                         <div class="email"><i class="fa fa-envelope"></i> contest@aurarich.com.ph </div>
                                         <div class="email"><i class="fa fa-envelope"></i> info@aurarich.com.ph </div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-block02 aboutus-links col-ms-4 col-md-4">

                                <div class="fi-useful-content">
                                    <ul class="fi-left col-sm-6">

                                        <li>
                                            <a href="{{ route(user_env().'.reviews') }}"><span>Reviews</span></a>
                                        </li>

                                        <li>
                                            <a href="/pages/contact"><span>Privacy policy</span></a>
                                        </li>
                                    </ul>
                                    <ul class="fi-right col-sm-6">
                                        <li>
                                            <a href="{{ route(user_env().'.location') }}"><span>Store Location</span></a>
                                        </li>
                                        <li>
                                            <a href="{{ route(user_env().'.contact') }}"><span>Contact us</span></a>
                                        </li>
                                    </ul>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="copy-right">
        <div class="copy-right-wrapper">
            <div class="container">
                <div class="row">
                    <div class="copy-right-inner">
                        <div class="copy-right-left">
                            <div class="footer_links">
                                <ul>
                                    <li>
                                        <a href="{{ route(user_env().'.about') }}" title="About Us">About Us</a>
                                        <i class="">/</i>
                                    </li>
                                    <li>
                                        <a href="{{ route(user_env().'.getstarted') }}" title="Sell AuraRich">Sell AuraRich</a>
                                        <i class="">/</i>
                                    </li>
                                    <li>
                                        <a href="{{ route(user_env().'.deals') }}" title="Deals">Deals</a>
                                        <i class="">/</i>
                                    </li>
                                    <li>
                                        <a href="{{ route(user_env().'.products.index') }}" title="Products">Products</a>
                                        <i class="">/</i>
                                    </li>
                                    <li>
                                        <a href="{{ route(user_env().'.news') }}" title="News">News</a>
                                        <i class="">/</i>
                                    </li>
                                    <li>
                                        <a href="{{ route(user_env().'.distributors.index') }}" title="Distributors">Distributors</a>
                                        <i class="">/</i>
                                    </li>
                                    <li>
                                        <a href="{{ route(user_env().'.faqs') }}" title="FAQs">FAQs</a>
                                        <i class="">/</i>
                                    </li>
                                    <li>
                                        <a href="{{ route(user_env().'.tutorials.index') }}" title="Tutorials">Tutorials</a>
                                        <i class="">/</i>
                                    </li>
                                        <li>
                                        <a href="{{ route(user_env().'.reviews') }}" title="Reviews">Reviews</a>
                                        <i class="">/</i>
                                    </li>

                                </ul>
                            </div>

                            <div class="footer_copyright">
                                <span>Copyright</span>
                                <a href="{{ route(user_env().'.home') }}">{{ config('app.name') }}</a>
                                | All Rights Reserved  {{ date('Y') }}
                            </div>
                        </div>
                                         <div class="copy-right-right">
                            <div class="footer_social">
                                <a href="{{ $app['facebook_url'] }}" title="Aura Rich on Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="{{ $app['youtube_url'] }}" title="Aura Rich on Youtube">
                                    <i class="fa fa-youtube"></i>
                                </a>
                                <a href="{{ $app['twitter_url'] }}" title="Aura Rich on Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="{{ $app['instagram_url'] }}" title="Aura Rich on Instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
</footer>


<div id="newsletter-popup" class="modal fade" style="display: none;" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="nl-wraper-popup bounceInDown" style="background-image: url(/front/cdn.shopify.com/s/files/1/1286/1471/t/2/assets/mailing_bg.png?17231127553059638277)">
        <div class="nl-wraper-popup-inner">
            <form method="POST" action="{{ route(user_env().'.newsletter.store') }}">
                @csrf

                <h4>EMAIL FOR NEWSLETTER</h4>
                <p>
                    For more information and updates please subscribe to our
                    newsletter to receive emails from {{ $app['name'] }} automatically.
                </p>
                <div class="group_input">
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                        placeholder="Enter your email address">

                    <button class="btn" type="submit">
                        <i class="fa fa-paper-plane" data-toggle="tooltip" data-placement="top" title="Submit"></i>
                    </button>
                </div>
            </form>

            <div id="popup-hide">
                <input type="checkbox" id="mc-popup-hide" value="0" onclick="checkcookie()">
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

<!-- Float right icon -->
<div class="float-right-icon">
    <ul>
        <li>
            <div id="scroll-to-top" data-toggle="" data-placement="left" title="Scroll to Top" class="off">
                <i class="fa fa-angle-up"></i>
            </div>
        </li>
    </ul>
</div>
