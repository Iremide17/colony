<div>
    <section class="gray pt-4">
        <div class="container">
            <div class="row m-0">
                <div class="short_wraping">
                    <div class="row align-items-center">
                    
                        <div class="col-lg-3 col-md-6 col-sm-12  col-sm-6">

                        </div>
                
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="flex justify-center items-center">
                                {{ $properties->links('pagination-link') }}
                            </div>
                        </div>
                
                        <div class="col-lg-3 col-md-6 col-sm-12 order-lg-3 order-md-2 col-sm-6">
                            <div class="shorting-right">
                                <label>Sort By:</label>
                                <div class="dropdown show">
                                    <a class="btn btn-filter dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="selection">Most Rated</span>
                                    </a>
                                    <div class="drp-select dropdown-menu">
                                        <a class="dropdown-item" wire:model="">Most Rated</a>
                                        <a class="dropdown-item" wire:model="">Most Viewed</a>
                                        <a class="dropdown-item" wire:model="">News Listings</a>
                                        <a class="dropdown-item" wire:model="">High Rated</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row"> 

                {{-- filter --}}
                <x-filter :categories="$categories" :types="$types"/>
                
                {{-- main content --}}
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="row justify-content-center">
                        @forelse ($properties as $property)
                            <x-front.property.vertical :property='$property'/>
                        @empty
                            <div class="text-center">
                                <h5>No properties listed yet</h5>
                            </div>
                        @endforelse
                    </div>
                </div>
             
            </div>
        </div>	
    </section>
</div>