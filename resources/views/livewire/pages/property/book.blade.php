<div>
    <div class="side-booking-body">
        <form wire:submit.prevent="userBooking">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                        <label>Check In</label>
                        <div class="cld-box">
                            <i class="ti-calendar"></i>
                            <input wire:model='state.checkin' type="date"
                                class="form-control @error('checkin') is-invalid @enderror" />
                        </div>
                        @error('checkin')
                            <div id="invalid-feedback" class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                        <label>Check Out</label>
                        <div class="cld-box">
                            <i class="ti-calendar"></i>
                            <input wire:model='state.checkout' type="date"
                                class="form-control @error('checkout') is-invalid @enderror" />
                        </div>
                        @error('checkout')
                            <div id="invalid-feedback" class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                        <div>
                            <label for="guests">Adults</label>
                            <div class="guests-box">
                                <button class="counter-btn" type="button" id="cnt-down"><i
                                        class="ti-minus"></i></button>
                                <input wire:model='state.adults' type="text" id="guestNo"
                                    class="@error('adults') is-invalid @enderror" />
                                <button class="counter-btn" type="button" id="cnt-up"><i
                                        class="ti-plus"></i></button>
                            </div>
                            @error('adults')
                                <div id="invalid-feedback" class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                        <div class="guests">
                            <label>Kids</label>
                            <div class="guests-box">
                                <button class="counter-btn" type="button" id="kcnt-down"><i
                                        class="ti-minus"></i></button>
                                <input wire:model='state.children' type="text" id="kidsNo"
                                    class="@error('children') is-invalid @enderror" />
                                <button class="counter-btn" type="button" id="kcnt-up"><i
                                        class="ti-plus"></i></button>
                            </div>
                            @error('children')
                                <div id="invalid-feedback" class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="side-booking-foot">
                    <span class="sb-header-left">Total Days</span>
                    <h3 class="price theme-cl">
                        @if ($different_days)
                            {{ $different_days }}
                        @endif
                    </h3>
                </div>

                <div class="side-booking-foot">
                    <span class="sb-header-left">Total Payment</span>
                    <h3 class="price theme-cl">
                        @if ($subTotal)
                            {{ trans('global.naira') }} {{ number_format($subTotal, 2) }}
                        @endif
                    </h3>
                </div>

                @auth
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="stbooking-footer mt-1">
                            <div class="form-group mb-0 pb-0">
                                <button type="submit" class="btn book_btn theme-bg">Book It Now</button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <a href="#" class="alio_green btn book_btn theme-bg" data-toggle="modal" data-target="#login">
                            <i class="fas fa-sign-in-alt mr-1"></i><span class="dn-lg">Please sign in</span>
                        </a>
                    </div>
                @endauth


            </div>
        </form>

    </div>
</div>
