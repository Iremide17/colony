<x-app-layout>
    <x-slot name="header">
		<div class="breadcrumbs-wrap">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">Favorites</li>
			</ol>
			<h2 class="breadcrumb-title">Hello {{ auth()->user()->name() }}, This is {{ application('name')}} ({{ application('alias')}})...</h2>
		</div>
	</x-slot>

    <div class="dashboard-body">                    
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h4>Total Favourited
                    <span class="pc-title theme-cl">
                        {{ $favourites->count() }}
                    </span>
                </h4>
            </div>
        </div>
    
        <div class="card">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card-body p-0">
                        <div class="dashboard_property">
                            <div class="table-responsive">
                                <table class="property-table-wrap responsive-table bkmark">
                                        <tbody>
                                            <tr>
                                                <th><i class="fa fa-file-text"></i> Property</th>
                                                <th></th>
                                            </tr>
                                            @forelse ($favourites as $key =>  $favourite)

                                            <!-- Item #1 -->
                                            {{-- <tr>
                                                <td class="dashboard_propert_wrapper">
                                                    <img src="{{ asset('storage/'.$favourite->property->firstImage()) }}" alt="{{ $favourite->property->title() }}">
                                                    <div class="title">
                                                        <h4><a href="#">{{ $favourite->property->title() }}</a></h4>
                                                        <span>{{ $favourite->property->excerpt(50) }} </span>
                                                        <span class="table-property-price">
                                                            {{ trans('global.naira') }} 
                                                            {{ $favourite->property->price() }} / {{ $favourite->property->frequency() }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="action">
                                                    <a href="#" class="delete">
                                                        <i class="ti-close"></i> 
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr> --}}
                                            @empty
                                                <div class="text-center m-5">
                                                    <p class="text-info">
                                                        No properties favourited yet
                                                    </p>
                                                </div>
                                            @endforelse
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                
</div>

</x-app-layout>


