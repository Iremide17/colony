<x-app-layout>
    <x-slot name="header">
		<div class="breadcrumbs-wrap">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">Properties</li>
			</ol>
			<h2 class="breadcrumb-title">Hello Agent {{ auth()->user()->name() }}!</h2>
		</div>
	</x-slot>

    <div class="dashboard-body">                    
       
        <livewire:agent.property.index/>
                    
    </div>

</x-app-layout>
