@component('mail::message')
{!! $data['body'] !!}

Thanks,<br>
{{ optional($data)['name'] ?? 'Your guest' }}
@endcomponent