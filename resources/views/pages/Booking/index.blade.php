<x-app-layout>
    <x-slot name="header">
		<div class="breadcrumbs-wrap">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">Bookings</li>
			</ol>
			<h2 class="breadcrumb-title">Hello {{ auth()->user()->name() }}, This is {{ application('name')}} ({{ application('alias')}})...</h2>
		</div>
	</x-slot>

    <div class="dashboard-body">                    
       

        <livewire:pages.booking.index/>
                    
    </div>

@push('scripts')

    <script>
        $(document).ready(function(){
            var rating_data = 0;

            $('#add_review').click(function() {
                alert('hi');
                $('#review_modal').modal('show');
            });
        });
    </script>
@endpush

</x-app-layout>
