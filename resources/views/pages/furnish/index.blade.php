<x-app-layout>
    <x-slot name="header">
		<div class="breadcrumbs-wrap">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">Furnish your Booking: {{$booking->booking_id}}</li>
			</ol>
			<h2 class="breadcrumb-title">Hello {{ auth()->user()->name() }}, This is {{ application('name')}} ({{ application('alias')}})...</h2>
		</div>
	</x-slot>

    <div class="dashboard-body">  

        <livewire:pages.furnish.index :booking="$booking" :key='$booking->id()'>
                    
    </div>

</x-app-layout>
