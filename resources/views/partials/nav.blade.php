<div class="header header-light">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="{{ url('/') }}">
                    <img src="{{ asset('storage/'.application('image')) }}" class="logo" alt="{{ application('name') }}" width="50.5em" id="navLogo"/>
                </a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        @auth
                            <livewire:pages.nav.booking.indicator>

                            {{-- <li><a href="{{ route('agent.property.index') }}" class="add_prt"><i class="fas fa-plus-circle"></i></a></li> --}}
                            <li>
                                <div class="btn-group account-drop p-0">
                                    <button type="button" class="btn btn-order-by-filt" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ Auth::user()->profile_photo_url }}" class="avater-img" alt="">
                                    </button>
                                    <x-front.flip />
                                </div>
                            </li>
                        @else
                            <li>
                                <a href="#" class="alio_green" data-toggle="modal" data-target="#login">
                                       <i class="fas fa-sign-in-alt mr-1"></i><span class="dn-lg">Sign In</span>
                                </a>
                            </li>
                        @endauth

                    </ul>
                </div>
            </div>


            <div class="nav-menus-wrapper">
                <ul class="nav-menu">
                    <li class="active"><a href="{{ url('/') }}">Home</a></li>

                    <li class=""><a href="{{ route('property.index') }}">Properties</a></li>
                    <li class=""><a href="{{ url('about-us') }}">About us</a></li>
                    <li class=""><a href="{{ url('contact') }}">Contact us</a></li>
                    <li class=""><a href="{{ route('market.index') }}">Market</a></li>

                    @if(Auth::check() && !auth()->user()->isFreelancer())
                        <li class=""><a href="{{ route('freelancer.create') }}">Become a freelancer</a></li>  
                    @endif
                </ul>


                <ul class="nav-menu nav-menu-social align-to-right dhsbrd">
                    @auth
                        <li>
                            <div class="btn-group account-drop">
                                <button type="button" class="btn btn-order-by-filt" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ Auth::user()->profile_photo_url }}" class="avater-img" alt="{{ auth()->user()->name() }}">
                                </button>
                                <x-front.flip />
                            </div>
                        </li>

                        @agent
                            <li class="add-listing">
                                <a href="{{ route('agent.property.create') }}" class="theme-cl">
                                    <i class="fas fa-plus-circle mr-1"></i>Add Property
                                </a>
                            </li>
                        @endagent
                    @else
                        <li>
                            <a href="#" class="alio_green" data-toggle="modal" data-target="#login">
                                <i class="fas fa-sign-in-alt mr-1"></i><span class="dn-lg">Sign In</span>
                            </a>
                        </li>
                    @endauth
                </ul>

            </div>
        </nav>
    </div>
</div>

<div class="clearfix"></div>
