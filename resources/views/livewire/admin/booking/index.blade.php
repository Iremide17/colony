<div>
    <div class="card">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-lg table-hover">
                            @forelse ($bookings as $key =>  $booking)
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Property</th>
                                        <th>Agent</th>
                                        <th>Check In/Check Out</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <p>({{ $key + 1 }}).</p>
                                        </td>
                                        <td>
                                            <a href="{{ route('property.show', $booking->property->slug()) }}">
                                                <img src="{{ asset('storage/' . $booking->property->firstImage()) }}"
                                                    class="avatar avatar-30 mr-2 rounded" alt="Avatar">
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <p> {{ $booking->property->agent->user()->name() }} </p>
                                            <span id="number"
                                                data-last="{{ $booking->property->agent->telephone() }}">
                                                <span><i class="ti-headphone-alt"></i><a
                                                        class="see">{{ $booking->property->agent->telephone() }}</a></span>
                                            </span>
                                        </td>
                                        <td>
                                            <p class="badge badge-primary">{{ $booking->checkinDate() }}</p>
                                            -
                                            <p class="badge badge-primary">{{ $booking->checkoutDate() }}</p>
                                            <p class="badge badge-primary">{{ $booking->days() }}days</p>
                                        </td>
                                        <td>
                                            <span class="badge badge-success">{{ trans('global.naira') }}
                                                {{ number_format($booking->total(), 2) }}</span>
                                        </td>
                                        <td>
                                            @if ($booking->isAccepted == 0)
                                                <Span class="badge badge-info">{{ $booking->status_badge }}</Span>
                                            @else
                                                <Span class="badge badge-success">{{ $booking->status_badge }}</Span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="label text-success bg-success-light">
                                                {{ $booking->payment_badge }}</div>
                                        </td>
                                        <td>
                                            @if ($booking->isAccepted == 0)
                                                <x-buttons.default wire:click="acceptBooking({{ $booking->id() }})"
                                                    class="btn btn-outline-theme btn-md btn-rounded">Accept
                                                    Booking
                                                </x-buttons.default>
                                            @endif
                                        </td>
                                    </tr>

                                </tbody>
                            @empty
                                <div class="text-center m-5">
                                    <p class="text-info">
                                        No Bookings available
                                        <span>
                                            <a href="{{ route('property.index') }}">Visit the property page</a>
                                        </span>
                                    </p>
                                </div>
                            @endforelse


                        </table>

                    </div>
                </div>

                {{-- {{ $bookings->links() }} --}}
            </div>
        </div>
    </div>
</div>
