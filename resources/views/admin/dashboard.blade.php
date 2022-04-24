<x-app-layout>
    <x-slot name="header">
        <div class="breadcrumbs-wrap">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
            </ol>
            <h2 class="breadcrumb-title">Hello Administrator {{ auth()->user()->name() }}!</h2>
        </div>
    </x-slot>

    <div class="dashboard-body">

        {{-- <div class="row mb-4">
            <div class="form-group col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="custom-file">
                            <input id="my-input" class="custom-file-input" type="file" name="">
                            <label for="my-input" class="custom-file-label btn btn-success">Upload Property Types cvv</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <x-buttons.default>
                            View Types
                        </x-buttons.default>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="custom-file">
                    <input id="my-input" class="custom-file-input" type="file" name="">
                    <label for="my-input" class="custom-file-label btn btn-success">Upload Property Categories cvv</label>
                </div>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h4>
                    You are a:
                    <span class="pc-title theme-cl">
                        @if (auth()->user()->type === 1)
                        Super Adminstrator
                        @elseif(auth()->user()->type === 2)
                        Administrator
                        @endif
                    </span>
                </h4>
            </div>
        </div>

        <div class="row justify-content-center mt-4">

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="_category_box">
                    <a href="{{ route('admin.user.index') }}">
                        <div class="_category_elio">
                            <div class="_category_thumb">
                                <img src="{{ asset('img/f-4.png') }}" class="img-fluid hover" alt="" />
                                <img src="{{ asset('img/f-44.png') }}" class="img-fluid simple" alt="" />
                            </div>
                            <div class="_category_caption">
                                <h5>User</h5>
                                <span>{{ $users->count() }} {{ Illuminate\Support\Str::plural('User', count($users)) }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="_category_box">
                    <a href="{{ route('admin.property.index') }}">
                        <div class="_category_elio">
                            <div class="_category_thumb">
                                <img src="{{ asset('img/f-4.png') }}" class="img-fluid hover" alt="" />
                                <img src="{{ asset('img/f-44.png') }}" class="img-fluid simple" alt="" />
                            </div>
                            <div class="_category_caption">
                                <h5>Property</h5>
                                <span>{{ $properties->count() }} {{ Illuminate\Support\Str::plural('Property', count($properties)) }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="_category_box">
                    <a href="{{ route('admin.agent.index') }}">
                        <div class="_category_elio">
                            <div class="_category_thumb">
                                <img src="{{ asset('img/f-6.png') }}" class="img-fluid hover" alt="" />
                                <img src="{{ asset('img/f-66.png') }}" class="img-fluid simple" alt="" />
                            </div>
                            <div class="_category_caption">
                                <h5>Agent</h5>
                                <span>{{ $agents->count() }} {{ Illuminate\Support\Str::plural('Agent', count($agents)) }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="_category_box">
                    <a href="{{ route('admin.freelancer.index') }}">
                        <div class="_category_elio">
                            <div class="_category_thumb">
                                <img src="{{ asset('img/f-1.png') }}" class="img-fluid hover" alt="" />
                                <img src="{{ asset('img/f-11.png') }}" class="img-fluid simple" alt="" />
                            </div>
                            <div class="_category_caption">
                                <h5>Freelancer</h5>
                                <span>{{ $freelancers->count() }} {{ Illuminate\Support\Str::plural('Freelancer', count($freelancers)) }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="_category_box">
                    <a href="{{ route('admin.booking.index') }}">
                        <div class="_category_elio">
                            <div class="_category_thumb">
                                <img src="{{ asset('img/f-4.png') }}" class="img-fluid hover" alt="" />
                                <img src="{{ asset('img/f-44.png') }}" class="img-fluid simple" alt="" />
                            </div>
                            <div class="_category_caption">
                                <h5>Booking</h5>
                                <span>{{ $bookings->count() }} {{ Illuminate\Support\Str::plural('Booking', count($bookings)) }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="_category_box">
                    <a href="{{ route('admin.job.index') }}">
                        <div class="_category_elio">
                            <div class="_category_thumb">
                                <img src="{{ asset('img/f-5.png') }}" class="img-fluid hover" alt="" />
                                <img src="{{ asset('img/f-55.png') }}" class="img-fluid simple" alt="" />
                            </div>
                            <div class="_category_caption">
                                <h5>Job</h5>
                                <span>{{ $jobs->count() }} {{ Illuminate\Support\Str::plural('Job', count($jobs)) }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="_category_box">
                    <a href="{{ route('admin.ticket.index') }}">
                        <div class="_category_elio">
                            <div class="_category_thumb">
                                <img src="{{ asset('img/f-4.png') }}" class="img-fluid hover" alt="" />
                                <img src="{{ asset('img/f-4.png') }}" class="img-fluid simple" alt="" />
                            </div>
                            <div class="_category_caption">
                                <h5>Ticket</h5>
                                <span>{{ $tickets->count() }} {{ Illuminate\Support\Str::plural('Ticket', count($tickets)) }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="_category_box">
                    <a href="{{ route('admin.application') }}">
                        <div class="_category_elio">
                            <div class="_category_thumb">
                                <img src="{{ asset('img/f-8.png') }}" class="img-fluid hover" alt="" />
                                <img src="{{ asset('img/f-88.png') }}" class="img-fluid simple" alt="" />
                            </div>
                            <div class="_category_caption">
                                <h5>Site Setting</h5>
                                <span>Update settings</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
