<div class="article clearfix">
    <div class="group-blog-top">
        <div class="group-blog-title">
            <h2 class="article-name">
                <a href="{{ route(user_env().'.distributors.show', $distributor) }}">
                    {{ $distributor->full_name }}
                </a>
            </h2>
        </div>
    </div>

    <ul class="article-info" style="list-style-type: none;">
        <li>
            <i class="fa fa-map-marker"></i>
            <span>{{ implode(', ', explode('|', $distributor->address)) }}</span>
        </li>

        @auth
            <li>
                <i class="fa fa-envelope"></i>
                <span>{{ $distributor->email }}</span>
            </li>
            <li>
                <i class="fa fa-phone-square"></i>
                <span>{{ $distributor->contact_number }}</span>
            </li>
        @else
            <li>
                <i class="fa fa-info-circle"></i>
                <a href="{{ route(user_env().'.login') }}">
                    <span>Login to see contact details</span>
                </a>
            </li>
        @endauth
    </ul>

    <div class="article-content">
        Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Quidem alias ea rem officia ipsa. Quia numquam cupiditate
        possimus atque odio, aperiam delectus? Unde necessitatibus
        quam deserunt perferendis veritatis doloremque eos.
    </div>
</div>