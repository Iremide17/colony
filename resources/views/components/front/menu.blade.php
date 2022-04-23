<div class="dash_user_menues">
    <ul>
        @if (auth()->user()->type === 1 || auth()->user()->type === 2)
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-tachometer-alt"></i>Dashboard</a></li>  
        @elseif(auth()->user()->type === 3)
            <li><a href="{{ route('agent.dashboard') }}"><i class="fa fa-tachometer-alt"></i>Dashboard</a></li>                                  
        @elseif(auth()->user()->type === 4)
            <li><a href="{{ route('freelancer.dashboard') }}"><i class="fa fa-tachometer-alt"></i>Dashboard</a></li>                                  
        @elseif(auth()->user()->type === 5)
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-tachometer-alt"></i>Dashboard</a></li>   
        @endif
        
        <li><a href="{{ route('user.profile', auth()->user()) }}"><i class="fa fa-user-tie"></i>My Profile</a></li>  
        <li class="" {{ request()->is('booking/*') ? 'active' : '' }}">
            <a href="{{ route('booking.index') }}"><i class="fas fa-cart-plus"></i> My Bookings</a>
        </li>
        <li class="" {{ request()->is('ticket/*') ? 'active' : '' }}">
            <a href="{{ route('ticket.index') }}"><i class="fa fa-question"></i>Tickets</a>
        </li>
        <li>
            <a href="{{ route('user.favourite',auth()->user()) }}"><i class="fa fa-bookmark"></i>Favourite Properties</a>
        </li>

        @agent
            <li><a href="{{ route('agent.property.index') }}"><i class="fa fa-tasks"></i>My Properties</a></li>
        @endagent
    </ul>
</div>
