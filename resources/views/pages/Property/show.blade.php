<x-guest-layout>

    @section('title', application('name')." | Property: $property->title")

    @section('keywords')
        {{ $property->purpose() }}
    @endsection

    @section('description')
    {{ $property->title() }}
    @endsection

    @section('metaImage')
        {{ asset('storage/' . $property->firstImage()) }}
    @endsection

	<section class="gallery_parts pt-2 pb-2 d-none d-sm-none d-md-none d-lg-none d-xl-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-7 col-sm-12 pr-1">
                    <div class="gg_single_part left">
                        <a href="{{ asset('storage/'.$property->firstImage()) }}" class="mfp-gallery">
                            <img src="{{ asset('storage/'.$property->firstImage()) }}" class="img-fluid mx-auto" alt="{{ $property->title()}}" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 pl-1">
                    <div class="gg_single_part-right min">
                        <a href="{{ asset('storage/'.$property->firstImage()) }}" class="mfp-gallery">
                            <img src="{{ asset('storage/'.$property->firstImage()) }}" class="img-fluid mx-auto" alt="{{ $property->title()}}" />
                        </a>
                    </div>
                    <div class="gg_single_part-right min mt-2 mb-2">
                        <a href="{{ asset('storage/'.$property->secondImage()) }}" class="mfp-gallery">
                            <img src="{{ asset('storage/'.$property->secondImage()) }}" class="img-fluid mx-auto" alt="{{ $property->title()}}" />
                        </a>
                    </div>
                    <div class="gg_single_part-right min">
                        <a href="{{ asset('storage/'.$property->thirdImage()) }}" class="mfp-gallery">
                            <img src="{{ asset('storage/'.$property->thirdImage()) }}" class="img-fluid mx-auto" alt="{{ $property->title()}}" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="featured_slick_gallery gray d-block d-md-block d-lg-block d-xl-none">
        <div class="featured_slick_gallery-slide">
            <div class="featured_slick_padd">
                <a href="{{ asset('storage/'.$property->firstImage()) }}" class="mfp-gallery">
                    <img src="{{ asset('storage/'.$property->firstImage()) }}" class="img-fluid mx-auto" alt="{{ $property->title()}}" />
                </a>
            </div>
            <div class="featured_slick_padd">
                <a href="{{ asset('storage/'.$property->secondImage()) }}" class="mfp-gallery">
                    <img src="{{ asset('storage/'.$property->secondImage()) }}" class="img-fluid mx-auto" alt="{{ $property->title()}}" />
                </a>
            </div>
            <div class="featured_slick_padd">
                <a href="{{ asset('storage/'.$property->thirdImage()) }}" class="mfp-gallery">
                    <img src="{{ asset('storage/'.$property->thirdImage()) }}" class="img-fluid mx-auto" alt="{{ $property->title()}}" />
                </a>
            </div>
        </div>
    </div>
    <!-- ============================ Hero Banner End ================================== -->
    
    <!-- ============================ Property Detail Start ================================== -->
    <section class="pt-4">
        <div class="container">
            <div class="row">
                
                <!-- property main detail -->
                <div class="col-lg-8 col-md-12 col-sm-12">
                    
                    <div class="property_info_detail_wrap mb-4">
                        
                        <div class="property_info_detail_wrap_first">
                            <div class="pr-price-into">
                                <ul class="prs_lists">
                                    <li><span class="bed">{{ $property->purpose()}}</span></li>
                                    <li><span class="bath">{{ $property->category->name}}</span></li>
                                    <li><span class="gar">B-{{ $property->yearBuilt()}}</span></li>

                                    @if ($property->area)
                                        <li><span class="sqft">{{ $property->area()}} sqft  </span></li>  
                                    @endif
                                </ul>
                                <h2>{{ $property->title()}}</h2>
                                <span><i class="lni-map-marker"></i> {{ $property->address()}}</span>
                            </div>
                        </div>
                        
                        <div class="property_detail_section">
                            <div class="prt-sect-pric">
                                <ul class="_share_lists">
                                    <li>
                                        <x-social.share :property="$property" url="{{ Request::url() }}"/>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- Single Block Wrap -->
                    <div class="property_block_wrap">
                        
                        <div class="property_block_wrap_header">
                            <h4 class="property_block_title">About Property</h4>
                        </div>
                        
                        <div class="block-body">
                            <p>{{ $property->description()}}</p>
                        </div>
                        
                    </div>
                    
                    <!-- Single Block Wrap -->
                    <div class="property_block_wrap">
                        
                        <div class="property_block_wrap_header">
                            <h4 class="property_block_title">Advance Features</h4>
                        </div>
                        
                        <div class="block-body">
                            <ul class="row p-0 m-0">
                                @if ($property->bedroom)
                                    <li class="col-lg-4 col-md-6 mb-2 p-0">
                                        <i class="fa fa-bed mr-1"></i> 
                                        {{ $property->bedroom()}} Bedrooms
                                    </li>
                                @endif

                                @if ($property->bathroom)
                                    <li class="col-lg-4 col-md-6 mb-2 p-0">
                                        <i class="fa fa-bath mr-1"></i> 
                                        {{ $property->bathroom()}} Bathrooms
                                    </li>
                                @endif

                                @if ($property->area)
                                    <li class="col-lg-4 col-md-6 mb-2 p-0">
                                        <i class="fa fa-expand-arrows-alt mr-1"></i> 
                                        {{ $property->area()}} sqft
                                    </li>
                                @endif

                                @if ($property->built)
                                    <li class="col-lg-4 col-md-6 mb-2 p-0">
                                        <i class="fa fa-building mr-1"></i> 
                                        Build {{ $property->yearBuilt()}}
                                    </li>
                                @endif

                            </ul>
                        </div>
                        
                    </div>
                    
                    <!-- Single Block Wrap -->
                    <div class="property_block_wrap">
                        
                        <div class="property_block_wrap_header">
                            <h4 class="property_block_title">Amenities</h4>
                        </div>
                        
                        <div class="block-body">
                            <ul class="avl-features third">
                                @if ($property->isAirConditioned == true)
                                    <li class="active">Air Conditioning</li>
                                @endif
                                @if ($property->isSwimmed == true)
                                    <li class="active">Swimming Pool</li>
                                @endif
                                @if ($property->isFurnished == true)
                                    <li class="active">Furnished</li>
                                @endif
                                @if ($property->isParked == true)
                                    <li class="active">Car Parking</li>
                                @endif
                            </ul>
                        </div>
                        
                    </div>
                    
                    <!-- Single Block Wrap -->
                    @if ($property->video() != null)
                        <div class="property_block_wrap">
                            
                            <div class="property_block_wrap_header">
                                <h4 class="property_block_title">Property video</h4>
                            </div>
                            
                            <div class="block-body">
                                <div class="property_video">
                                    <div class="thumb">
                                        <img class="pro_img img-fluid w100" src="{{ asset('storage/'.$property->firstImage()) }}" alt="{{ $property->title()}}">
                                        <div class="overlay_icon">
                                            <div class="bb-video-box">
                                                <div class="bb-video-box-inner">
                                                    <div class="bb-video-box-innerup">
                                                        <a href="{{ $property->video }}" data-toggle="modal" data-target="#popup-video" class="theme-cl"><i class="ti-control-play"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    @endif
                    
                    <!-- Single Reviews Block -->
                    @auth
                        <x-review :model="$property" :key="$property->id()"/>
                    @endauth
                    
                </div>
                
                <!-- property Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="property-sidebar">
                        
                        <!-- Agent Detail -->
                        <div class="sider_blocks_wrap">
                            <div class="side-booking-body">
                                <div class="agent-_blocks_title">
                                
                                    <div class="agent-_blocks_thumb"><img src="{{ asset('storage/'.$property->agent->image())}}" alt="{{ $property->agent->user()->name() }}"></div>
                                    <div class="agent-_blocks_caption">
                                        <h4><a href="#">{{ $property->agent->user()->name() }}</a></h4>
                                            @if ($property->agent->isVerified == true)
                                                <span class="approved-agent"><i class="ti-check"></i>approved</span>
                                            @else
                                                <span class="unapproved-agent"><i class="ti-times"></i>Not approved</span>
                                            @endif
                                    </div>
                                    <div class="clearfix"></div>
                                </div>                            
                            </div>
                        </div>
                        
                        <div class="sider_blocks_wrap">
                            <div class="side-booking-header">
                                <div class="sb-header-left">
                                    <h3 class="price">{{ trans('global.naira') }}{{ $property->price()}}
                                        <sub>/{{ $property->rentFrequent}}</sub>
                                        {{-- <span class="offs">$510</span> --}}
                                    </h3>
                                </div>
                                <div class="price_offer">20% Off</div>
                            </div>
                            
                            <livewire:pages.property.book :property="$property" :key="$property->id()"/>
                            
                        </div>
                    
                        <!-- Similar Property -->
                        <div class="sidebar-widgets">
                            
                            <h4>Similar Property</h4>
                            
                            <div class="sidebar_featured_property">
                                
                                <!-- List Sibar Property -->
                                <div class="sides_list_property">
                                    <div class="sides_list_property_thumb">
                                        <img src="assets/img/p-1.png" class="img-fluid" alt="" />
                                    </div>
                                    <div class="sides_list_property_detail">
                                        <h4><a href="single-property-1.html">Loss vengel New Apartment</a></h4>
                                        <span><i class="ti-location-pin"></i>Sans Fransico</span>
                                        <div class="lists_property_price">
                                            <div class="lists_property_types">
                                                <div class="property_types_vlix sale">For Sale</div>
                                            </div>
                                            <div class="lists_property_price_value">
                                                <h4>$4,240</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- List Sibar Property -->
                                <div class="sides_list_property">
                                    <div class="sides_list_property_thumb">
                                        <img src="assets/img/p-4.png" class="img-fluid" alt="" />
                                    </div>
                                    <div class="sides_list_property_detail">
                                        <h4><a href="single-property-1.html">Montreal Quriqe Apartment</a></h4>
                                        <span><i class="ti-location-pin"></i>Liverpool, London</span>
                                        <div class="lists_property_price">
                                            <div class="lists_property_types">
                                                <div class="property_types_vlix">For Rent</div>
                                            </div>
                                            <div class="lists_property_price_value">
                                                <h4>$7,380</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- List Sibar Property -->
                                <div class="sides_list_property">
                                    <div class="sides_list_property_thumb">
                                        <img src="assets/img/p-7.png" class="img-fluid" alt="" />
                                    </div>
                                    <div class="sides_list_property_detail">
                                        <h4><a href="single-property-1.html">Curmic Studio For Office</a></h4>
                                        <span><i class="ti-location-pin"></i>Montreal, Canada</span>
                                        <div class="lists_property_price">
                                            <div class="lists_property_types">
                                                <div class="property_types_vlix buy">For Buy</div>
                                            </div>
                                            <div class="lists_property_price_value">
                                                <h4>$8,730</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- List Sibar Property -->
                                <div class="sides_list_property">
                                    <div class="sides_list_property_thumb">
                                        <img src="assets/img/p-5.png" class="img-fluid" alt="" />
                                    </div>
                                    <div class="sides_list_property_detail">
                                        <h4><a href="single-property-1.html">Montreal Quebec City</a></h4>
                                        <span><i class="ti-location-pin"></i>Sreek View, New York</span>
                                        <div class="lists_property_price">
                                            <div class="lists_property_types">
                                                <div class="property_types_vlix">For Rent</div>
                                            </div>
                                            <div class="lists_property_price_value">
                                                <h4>$6,240</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    
                    </div>
                </div>
                
            </div>
        </div>
    </section>
			
</x-guest-layout>
