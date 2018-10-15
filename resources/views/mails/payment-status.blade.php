@component('mail::message')
    #Thanks for Shopping with us

    #Dear {{ $customer->fullname }}

    Your payment status is {{ payment($payment->status) }}

    Thanks,
    {{ config('app.name') }}
@endcomponent
