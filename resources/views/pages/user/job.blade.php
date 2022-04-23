<x-app-layout>
    <x-slot name="header">
		<div class="breadcrumbs-wrap">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">Jobs</li>
			</ol>
			<h2 class="breadcrumb-title">Hello {{ auth()->user()->name() }}, This is {{ application('name')}} ({{ application('alias')}})...</h2>
		</div>
	</x-slot>

    <div class="dashboard-body">                    
        <livewire:pages.user.job :user="$user" :key='$user->id()'>
    </div>
                
</div>

</x-app-layout>


