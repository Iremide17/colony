<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body class="yellow-skin">

    <div class="preloader"></div>

    <div id="main-wrapper">

        <div id="main-wrapper">

            @auth
                @include('partials.nav')

                <!-- Page Heading -->
                @if (isset($header))
                    <div class="page-title" style="background:#f4f4f4 url({{ asset('img/slider-5.jpg') }});"
                        data-overlay="5">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    {{ $header }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <section class="gray pt-5 pb-5">
                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-3 col-md-4">
                                <div class="property_dashboard_navbar">

                                    <div class="dash_user_avater">
                                        <img src="{{ Auth::user()->profile_photo_url }}" class="img-fluid avater userImage"
                                            alt="{{ Auth::user()->name() }}">
                                        <h4 class="userName">{{ auth()->user()->name() }}</h4>
                                        <span class="userEmail">{{ auth()->user()->email() }}</span>
                                    </div>

                                    <x-front.menu />

                                    <div class="dash_user_footer">
                                        <ul>
                                            <li>
                                                {{-- <a href="#"><i class="fa fa-power-off"></i></a> --}}
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                this.closest('form').submit();">
                                                        <i class="fa fa-power-off"></i>
                                                    </a>
                                                </form>
                                            </li>
                                            <li><a href="{{ route('admin.ticket.index') }}"><i class="fa fa-comment"></i></a></li>
                                            <li><a href="{{ route('admin.application') }}"><i class="fa fa-cog"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-9 col-md-8">
                                {{ $slot }}
                            </div>

                        </div>
                    </div>
                </section>

            @endauth

            <livewire:delete-modal-component>
            {{-- <livewire:skill-create> --}}

            @include('partials.footer')

        </div>
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

    </div>

    @include('partials.script')
</body>

</html>
