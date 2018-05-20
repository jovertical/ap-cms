<section class="blcontactog-heading">
    <div class="contact-heading-wrapper">
        <div class="container">
            <div class="row">
                <div class="page-heading-inner">
                    <h1 class="page-title">
                        <span>
                            {{ Request::segment(count($segments = Request::segments())) }}
                        </span>
                    </h1>

                    <div class="breadcrumb clearfix">
                        <span>
                            <a href="{{ route(user_env().'.home') }}" title="Home">
                                <span>
                                    <i class="fa fa-home"></i>
                                </span>
                            </a>
                        </span>

                        @for($i = 1; $i <= count($segments); $i++)
                            <span class="arrow-space">&#62;</span>

                            <span>
                                <a href="{{ $i >= count($segments) ? '#' :
                                    URL::to(implode('/', array_slice($segments, 0, $i, true))) }}"
                                        title="{{ Request::segment($i) }}">{{ Request::segment($i) }}</a>
                            </span>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>