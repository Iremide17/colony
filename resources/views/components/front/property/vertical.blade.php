<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <div class="property-listing list_view">
        
        <div class="listing-img-wrapper">
            <div class="_exlio_125">{{ $property->purpose}}</div>
            <div class="list-img-slide">
                <a href="{{ route('property.show', $property) }}"><img src="{{ asset('storage/'.$property->firstImage()) }}" class="img-fluid mx-auto" alt="{{ $property->title}}" /></a>
            </div>
        </div>
        
        <div class="list_view_flex">
        
            <div class="listing-detail-wrapper mt-1">
                <div class="listing-short-detail-wrap">
                    <div class="_card_list_flex mb-2">
                        <div class="_card_flex_01">
                            <span class="_list_blickes _netork">{{ $property->frequency()}}</span>
                            <span class="_list_blickes types">{{ $property->category->name}}</span>
                        </div>
                        <div class="_card_flex_last">
                            <div class="prt_saveed_12lk">
                                <livewire:pages.favourite :property="$property" :key="$property->id()">
                            </div>
                        </div>
                    </div>
                    <div class="_card_list_flex">
                        <div class="_card_flex_01">
                            <h4 class="listing-name verified">
                                <a href="{{ route('property.show', $property) }}" class="prt-link-detail">{{ $property->title}}
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="price-features-wrapper">
                <div class="list-fx-features">
                    <div class="listing-card-info-icon">
                        B- {{ $property->yearBuilt()}} 
                    </div>
                    <div class="listing-card-info-icon">
                       {{ $property->type_badge}}
                    </div>
                    <div class="listing-card-info-icon">
                       <span class="_list_blickes types">
                            {{ trans('global.naira') }} {{ $property->price() }}
                       </span>
                    </div>
                </div>
            </div>
            
            <div class="listing-detail-footer flex">
                <div class="footer-first mr-4">
                    {{-- rating --}}
                    <div class="foot-rates">
                        <span class="elio_rate good">4.2</span>
                        <div class="_rate_stio">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>

                </div>
                <div class="footer-flex">
                    <a href="{{ route('property.show', $property) }}" class="prt-view">View Detail</a>
                </div>
            </div>
        </div>
        
    </div>
</div>