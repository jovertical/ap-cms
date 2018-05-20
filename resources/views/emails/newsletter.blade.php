@component('mail::message')
<h1>{{ $newsletter->title }}</h1>

{!! $newsletter->body !!}

Thanks,<br>
{{ config('app.name') }}
@endcomponent