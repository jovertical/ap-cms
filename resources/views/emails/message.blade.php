@component('mail::message')
    {!! $data['body'] !!}
        <ul>
            <li>Email: {{ $data['email'] }}</li>
            <li>Contact number: {{ optional($data)['contact_number'] }}</li>
        </ul>

    Thanks,<br>
    {{ optional($data)['name'] ?? 'Your guest' }}
@endcomponent