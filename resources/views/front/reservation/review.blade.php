@extends(user_env().'.layouts.main')

@section('content')
    @include(user_env().'.partials.breadcrumbs')

    <div class="message-box text-center">
        <p class="message-text">
            Your reservation has been created. Thank you!
            We will get back to you shortly.
        </p>
    </div>
@endsection