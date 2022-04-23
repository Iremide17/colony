@component('mail::message')
**{{ $booking->user()->name() }}** has just verified your booking: {{ $booking->code() }}.
Thanks for using {{ application('name') }} application. We hope it has made you smile!

@component('mail::panel')
**This verification has earned you 20 points! Current Point = **{{ $booking->user()->currentPoints() }}**
@endcomponent

Thanks,
{{ application('name') }}
@endcomponent
