<x-app-layout>
    <x-slot name="header">
        <div class="breadcrumbs-wrap">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
            <h2 class="breadcrumb-title">Hello Administrator {{ auth()->user()->name() }}!</h2>
        </div>
    </x-slot>

    <div class="dashboard-body">

        <livewire:admin.user.index />

    </div>
</x-app-layout>
