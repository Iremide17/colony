<div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="_prt_filt_dash">
                <div class="_prt_filt_dash_flex">
                    <div class="foot-news-last">
                        <div class="input-group">
                          <input wire:model="searchWord" type="text" class="form-control" placeholder="search properties">
                            <div class="input-group-append">
                                <span type="button" class="input-group-text theme-bg b-0 text-light"><i class="fas fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12 col-md-12">

            @if($selectedRows)
                <div class="row">
                    <div class="col-lg-4"><button wire:click.prevent="deleteAll" class="btn btn-danger btn-sm">Delete All</button></div>
                </div>
            @endif

            <div class="dashboard_property">
                <div class="table-responsive">
                    <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="m2_hide">
                                        <input wire:model="selectPageRows" type="checkbox" class="" name="todo2"
                                        id="todoCheck2">
                                    </th>
                                    <th scope="col">Property</th>
                                    <th scope="col" class="m2_hide">Stats</th>
                                    <th scope="col" class="m2_hide">Posted On</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                        
                        <tbody>
                            @forelse ($properties as $property)
                                <tr>
                                    <td class="m2_hide">
                                        <input wire:model="selectedRows" type="checkbox" value="{{ $property->id() }}"
                                        name="todo2" id="{{ $property->id() }}">
                                    </td>
                                    <td>
                                        <div class="dash_prt_wrap">
                                            <div class="dash_prt_thumb">
                                                <img src="{{ asset('storage/'. $property->firstImage()) }}" class="img-fluid" alt="{{  $property->title() }}" />
                                            </div>
                                            <div class="dash_prt_caption">
                                                <h5>{{ $property->title() }}</h5>
                                                <div class="prt_dashb_lot">{{ $property->address() }}</div>
                                                <div class="prt_dash_rate"><span>{{ trans('global.naira') }} {{ number_format($property->price(), 2) }}/<sub>{{ $property->frequency()}}</sub></span></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="m2_hide">
                                        <x-views :model="$property"/>
                                    </td>
                                    <td class="m2_hide">
                                        <div class="_leads_posted"><h5>{{ $property->createdDate }}</h5></div>
                                    </td>
                                    <td>
                                        <div class="_leads_status">
                                            @if ($property->isVerified == true)
                                                <span class="active">
                                                    {{ $property->verify_badge }}
                                                </span>
                                            @else
                                                <span class="expire">
                                                    {{ $property->verify_badge }}
                                                </span>
                                            @endif
                                            
                                        </div>
                                    </td>
                                    <td>
                                        <div class="_leads_action">
                                            <a href="{{ route('agent.property.edit',$property)}}"><i class="fas fa-edit"></i></a>
                                            <a  wire:click.prevent="delete({{ $property->id() }})"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <div class="text-center m-4">
                                    <p>No properties available</p>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{ $properties->links() }}
        </div>
    </div>
</div>
