@component('mail::message')
**{{ $booking->user()->name() }}** has just booked your property **{{ $booking->property->name() }}**
Login into your dashboard to verify booking so that the booker can proceed to payment.

@component('mail::panel')
<img src="{{ asset('storage/' .$booking->property->firstImage()) }}" alt="{{ $booking->property->name() }}">
@endcomponent

@component('mail::button', ['url' => route('agent.dashboard')])

Go to Dashboard
@endcomponent

Thanks,
Team {{ application('name') }}, {{ date('Y') }}.
@endcomponent
