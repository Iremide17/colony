<div>
   
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h4>Remaining Days in Booking
                <span class="pc-title theme-cl">
                    5
                </span>
            </h4>
        </div>
    </div>

    <div class="card">
        <div class="row">
            <div class="{{ !$bookings_details ? 'col-lg-12 col-md-12' : 'col-lg-8 col-md-8' }}" title="Click to perform action">
                <div class="card-body p-0">
                    <div class="dashboard_property">
                        <div class="table-responsive">
                            <table class="table table-lg table-hover">

                                <thead class="thead-dark">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Status</th>
                                        <th>Payment Status</th>
                                    </tr>
                                </thead>
                                @forelse ($bookings as $key =>  $booking)
                                    <tbody>

                                        <tr>
                                            <td>
                                                <p>({{ $key + 1 }}).</p>
                                            </td>
                                            <td>
                                                <div class="dash_prt_wrap">
                                                    <div class="dash_prt_thumb">
                                                        <img src="{{ asset('storage/' . $booking->property->firstImage()) }}"
                                                            class="img-fluid"
                                                            alt="{{ $booking->property->title() }}" />
                                                    </div>
                                                    <div class="dash_prt_caption">
                                                        <h5>{{ $booking->property->title() }}</h5>
                                                        <div class="prt_dashb_lot">
                                                            {{ $booking->property->address() }}</div>
                                                        <div class="prt_dash_rate">
                                                            {{ trans('global.naira') }}
                                                            <span>{{ number_format($booking->property->price(), 2) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p>{{ $booking->checkinDate() }}</p>
                                            </td>
                                            <td>
                                                <p>{{ $booking->checkoutDate() }}</p>
                                            </td>

                                            <td>
                                                @if ($booking->isAccepted == 0)
                                                    <div class="_leads_status"><span
                                                            class="expire">{{ $booking->status_badge }}</span>
                                                    </div>
                                                @else
                                                    <div class="_leads_status"><span
                                                            class="active">{{ $booking->status_badge }}</span>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($booking->paymentStatus == true)
                                                    <div class="_leads_status">
                                                        <span  class="active">
                                                        {{ $booking->payment_badge }}
                                                        </span>
                                                    </div>
                                                @else
                                                    <div class="_leads_status">
                                                        <span  class="expire">
                                                        {{ $booking->payment_badge }}
                                                    </span>
                                                    </div>
                                                @endif
                                            </td>
                                            <td> 
                                                @if ($booking->isAccepted == 1)
                                                    <x-buttons.default wire:click="BookingDetails({{ $booking->id }})">Action</x-buttons.default>
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
                </div>
            </div>
            @if ($bookings_details)
                <div class="col-lg-4 col-md-4">

                    <div class="col-lg-12 col-md-12 col-sm-12 m-3">
                        <x-buttons.default type="button" class="float-right" wire:click="resetBooking">
                            <i class="fa fa-times" aria-hidden="true"></i> close
                        </x-buttons.default>
                    </div>

                    @if ($booking->paymentStatus == false)
                        <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal"role="form">
                                @csrf

                            <input type="hidden" id="payment_type" name="payment_type" value="paystack">
                            <input type="hidden" name="email" value="{{ auth()->user()->email() }}">
                            {{-- required --}}
                            <input type="hidden" name="orderID" value="345">
                            <input type="hidden" name="amount" value="{{ $bookings_details->total() }}00">
                            {{-- required in kobo --}}
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="currency" value="NGN">
                            <input type="hidden" name="metadata"
                                value="{{ json_encode(
                                    $array = [
                                        'booking_id' => $bookings_details->id(),
                                        'user_id' => auth()->id(),
                                    ],
                                ) }}">
                            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                            {{-- required --}}
                            <input type="hidden" name="split_code" value="SPL_tV5ByW7Qlg">
                            <input type="hidden" name="split" value="{{ json_encode($split) }}">


                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                    <h3>Your Booking</h3>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="pro_product_wrap">
                                        <h5>
                                            <a href="{{ route('property.show', $bookings_details->property->slug()) }}">
                                                {{ $bookings_details->property->title() }}
                                            </a>
                                        </h5>
                                        <ul>
                                            <li><strong>Price</strong>
                                                {{ trans('global.naira') }}
                                                {{ $bookings_details->property->price() }}
                                                <sub>/{{ $bookings_details->property->frequency() }}</sub>
                                            </li>
                                            <li><strong>Days</strong>{{ $bookings_details->days() }}</li>
                                            <li><strong>Total</strong>
                                                {{ number_format($bookings_details->property->price() * $bookings_details->days(), 2) }}
                                            </li>
                                        </ul>

                                        <h5 class="mt-2">
                                            Inclusion
                                        </h5>

                                        <div class="row">
                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <div class="eltio_ol9">
                                                        <div class="eltio_k1">
                                                            @livewire('toggle-button',
                                                            [
                                                            'model' =>
                                                            $bookings_details,
                                                            'field' =>
                                                            'logistic'
                                                            ])
                                                            <label for="logistic" class="checkbox-custom-label">Logistics
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <div class="eltio_ol9">
                                                        <div class="eltio_k1">

                                                            @livewire('toggle-button',
                                                            [
                                                            'model' =>
                                                            $bookings_details,
                                                            'field' =>
                                                            'cleaning'
                                                            ])
                                                            <label for="cleaning" class="checkbox-custom-label">Cleaning
                                                                Services
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group text-center">
                                            <label>Grand Total Price</label>
                                            <h3>
                                                {{ trans('global.naira') }}
                                                {{ number_format($bookings_details->total(), 2) }}
                                            </h3>
                                        </div>


                                        <div class="form-group">
                                            <button type="submit" class="btn btn-md full-width bg-success rounded">Pay
                                                Now</button>
                                        </div>

                                    </div>
                                </div>

                        </form>
                    @else
                        <div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="px-2 py-3">

                                
                                    @if (!$bookings_details->property->isReviewedBy(auth()->user())) 
                                        <livewire:pages.review :booking="$bookings_details" :key="$bookings_details->id()"> 
                                    @endif

                                    
                                    <livewire:pages.ticket :booking="$bookings_details" :key="$bookings_details->id()">

                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <a href="{{ route('furnish.index', $bookings_details)}}"  class="btn btn-theme">Furnish Booking</a>  
                                    </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    @endif
                    
                </div>
            @endif

        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        window.addEventListener('ticket-form', event => {
            $('#ticket_modal').modal('show');
        });+

        window.addEventListener('hide-ticket-form', event => {
            $('#ticket_modal').modal('hide');
            toastr.success(event.detail.message, 'Success!');
        });

        window.addEventListener('hide-ticket-error-form', event => {
            $('#ticket_modal').modal('hide');
            toastr.error(event.detail.message, 'Error!');
        })
    </script>

    <script type="text/javascript">
        window.addEventListener('furnish-form', event => {
            $('#furnish_modal').modal('show');
        });

        window.addEventListener('hide-furnish-form', event => {
            $('#furnish_modal').modal('hide');
            toastr.success(event.detail.message, 'Success!');
        });

        window.addEventListener('hide-furnish-error-form', event => {
            $('#furnish_modal').modal('hide');
            toastr.error(event.detail.message, 'Error!');
        })
    </script>
@endpush
