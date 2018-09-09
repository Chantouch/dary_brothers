@component('mail::message')
    #Received message

    ##Dear Admin

    You recently received a message from : {{ $user['name'] }}

    Name: {{ $user['name'] }}

    Email: {{ $user['email'] }}

    Phone: {{ $user['phone'] }}

    Message: {{ $user['message'] }}

    Thanks,
    {{ config('app.name') }}
@endcomponent
