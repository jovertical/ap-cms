<div class="article clearfix">
    <div class="group-blog-top">
        <div class="group-blog-title">
            <h2 class="article-name">
                <a href="{{ route(user_env().'.tutorials.show', $tutorial) }}">
                    {{ $tutorial->title }}
                </a>
            </h2>
        </div>
    </div>

    <div class="article-image">
        <a href="#">
            <img src="" alt="">
        </a>
    </div>

    <ul class="article-info list-inline">
        <li class="article-date">
            <i class="fa fa-calendar"></i> {{ $tutorial->created_at->diffForHumans() }}
        </li>
        <li class="article-author">
            <i class="fa fa-user"></i> {{ $tutorial->creator->full_name }}
        </li>
        <li class="article-comment">
            <a href="#">
                <i class="fa fa-list-ol"></i>
                <span>{{ $tutorial->episodes->count() }}</span> Episode(s)
            </a>
        </li>
    </ul>

    <div class="article-content">
        {!! $tutorial->body !!}
    </div>
</div>