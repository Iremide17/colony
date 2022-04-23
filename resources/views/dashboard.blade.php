<x-app-layout>

	<x-slot name="header">
		<div class="breadcrumbs-wrap">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
			</ol>
			<h2 class="breadcrumb-title">Hello {{ auth()->user()->name() }}, Welcome</h2>
		</div>
	</x-slot>
	
	<div class="dashboard-body">
                                    
	
		
	</div>
			
</x-app-layout>
