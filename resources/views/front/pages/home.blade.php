@extends(user_env('layouts.main')) @section('content')
<div id="main-content" class="wrapper clearfix">
    <section class="main-slideshow">
        <div id="home-slideshow" class="home-slideshow-wrapper">

            <div class="home-slideshow-inner">
                <div class="home-slideshow">
                    <ul class="slides">
                        <li class="slideshow-1">
                            <img src="/front/slide-image-1.jpg">
                            <div class="caption position-left">
                                <div class="slide-caption">
                                    <div class="dis_tablecell">
                                        <div class="container">
                                            <p>
                                                <span class="title">

                                                </span>
                                                <span class="title_bold"> </span>
                                                <span class="content"> </span>
                                            </p>

                                            <div class="flex-action not-animated">

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="slideshow-2">
                            <img src="/front/slide-image-2.jpg">
                            <div class="caption position-right">
                                <div class="slide-caption">
                                    <div class="dis_tablecell">
                                        <div class="container">
                                            <p>
                                                <span class="title">
                                                    New collection 2018
                                                </span>
                                                <span class="title_bold">Our Products</span>
                                                <span class="content">The AuraRich product line provides a powerful combination of natural skin
                                                    whitening and toning power.
                                                </span>
                                            </p>

                                            <div class="flex-action not-animated">
                                                <a class="btn" href="{{ route(user_env().'.products.index') }}">View Products</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="slideshow-3">
                            <img src="/front/slide-image-3.jpg" />
                            <div class="caption position-left">
                                <div class="slide-caption">
                                    <div class="dis_tablecell">
                                        <div class="container">
                                            <p>
                                                <span class="title">

                                                </span>
                                                <span class="title_bold">AuraRich Tutorials</span>
                                                <span class="content">Watch the beautiful transformations of our AuraRich users.</span>
                                            </p>

                                            <div class="flex-action not-animated">
                                                <a class="btn" href="{{ route(user_env().'.tutorials.index') }}"> Watch Tutorials</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="slideshow-1">
                            <img src="/front/slide-image-1.jpg">
                            <div class="caption position-left">
                                <div class="slide-caption">
                                    <div class="dis_tablecell">
                                        <div class="container">
                                            <p>
                                                <span class="title">

                                                </span>
                                                <span class="title_bold">AuraRich Philippines</span>
                                                <span class="content"> </span>
                                            </p>

                                            <div class="flex-action not-animated">
                                                <a class="btn" href="{{ route(user_env().'.about') }}">About Us</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="slideshow-1">
                            <img src="/front/slide-image-1.jpg">
                            <div class="caption position-left">
                                <div class="slide-caption">
                                    <div class="dis_tablecell">
                                        <div class="container">
                                            <p>
                                                <span class="title">

                                                </span>
                                                <span class="title_bold">AuraRich Philippines</span>
                                                <span class="content"> </span>
                                            </p>

                                            <div class="flex-action not-animated">
                                                <a class="btn" href="{{ route(user_env().'.about') }}">About Us</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @if (count($categories))
        <section id="home_topbanner">
            <div class="home_topbanner_wrapper">
                <div class="container">
                    <div class="row">
                        <div class="home_topbanner_inner">
    
                             <div class="col-sm-4">
                                <div class="group_banner">
                                   <div class="home_topbanner_image">
                                @foreach ($categories as $index => $category)
                                <div class="group_banner">
                                    <div class="home_topbanner_image">
                                        <a href="{{ route(user_env().'.products.index').'?c='.$category->id }}">
                                            <img src="{{ image_url($category) }}" alt="" style="width: 100%;">
                                        </a>
                                    </div>
    
                                    <div class="home_topbanner_content">
                                        <span class="content">{{ $category->name }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section id="home_saleup_layout">
        <div class="home_saleup_wrapper">
            <div class="container">
                <div class="row">
                    <div class="home_saleup_inner">
                        <div class="home_saleup_image">
                            <img src="/front/home_saleup_image.jpg" alt="" />
                        </div>
                        <div class="home_saleup_content">
                            <div class="dis_table">
                                <div class="dis_tablecell">
                                    <span class="title">
                                        AuraRich Philippines
                                    </span>
                                    <span class="content">Shop now at AuraRich</span>
                                    <a href="" class="btn btn-2">Shop now!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (count($featured_products))
    <section id="home_featuredproduct_layout">
        <div class="home_featuredproduct_wrapper">
            <div class="container">
                <div class="row">
                    <div class="home_featuredproduct_inner">
                        <div class="home_featuredproduct-title home-title">
                            <h4>Featured Products</h4>
                        </div>
                        <div class="home_featuredproduct-content home-content">
                            <div class="featuredproduct-products">
                                @foreach($featured_products as $index => $product) @include(user_env().'.pages.product') @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>
@endsection