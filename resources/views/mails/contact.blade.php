@component('mail::message')
    # Received message

    ## Dear Admin

    You recently received a message from : {{ $user['name'] }}

    Name: {{ $user['name'] }}

    Email: {{ $user['email'] }}

    Phone: {{ $user['phone'] }}

    Message: {{ $user['user_message'] }}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
