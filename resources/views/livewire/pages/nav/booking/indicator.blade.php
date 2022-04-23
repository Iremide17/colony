@if ($hasBookings)
    <li class="_my_prt_list">
        <a href="{{ route('booking.index') }}" title="Click to see the property in your booking">
            <livewire:pages.nav.booking.count>
            My Booking
        </a>
    </li>
@endif
