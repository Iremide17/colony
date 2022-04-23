<div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h4>Your Booking:
                <span class="pc-title theme-cl">
                    {{$booking->booking_id}}
                </span>
            </h4>
        </div>
    </div>
    @if (!$viewFreelancer)
        <div class="row">
        
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="sec-heading center">
                            <h2>Freelancers Categories</h2>
                            <p>Click on your desired category.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5">                 
                        <div class="form-group mx-sm-3 mb-2">
                            <div class="input-with-icon">
                                <input wire:model.debounce.350ms="searchWord" 
                                    type="search" 
                                    class="form-control" 
                                    placeholder="what do you want?"
                                >
                                <i class="ti-search"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-5 col-sm-5">                 
                        <div class="form-group mx-sm-3 mb-2">
                            <div class="input-with-icon">
                                <input wire:model.debounce.350ms="subcategory" 
                                    type="search" 
                                    class="form-control" 
                                    placeholder="search category!"
                                    list="data"
                                >
            
                                <datalist class="list" id="data">
                                    @foreach ($subcategories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </datalist>
                                <i class="ti-search"></i>
                            </div>
                        </div>
                    </div>

                    @if (!$category == null || !$subcategory == null)
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <x-buttons.default wire:click="clearFilter"> <i class="fa fa-times" aria-hidden="true"></i> Clear</x-buttons.default>
                        </div>
                    @endif
            
                    <div class="col-lg-12 col-md-12 col-sm-12">
                            
                    
                        
                        <div class="row justify-content-center">
                            @foreach ($categories as $category)
                                <div class="col-lg col-md-4" style="cursor: pointer">
                                    <!-- Single Category -->
                                    <div class="property_cats_boxs">
                                        <a wire:click.prevent='searchCard({{ $category->id() }})' class="category-box">
                                            <div class="property_category_short">
                                                <div class="category-icon clip-1">
                                                    <i class="flaticon-beach-house-2"></i>
                                                </div>

                                                <div class="property_category_expand property_category_short-text">
                                                    <h4>{{ $category->name }}</h4>
                                                    <p>
                                                        {{ $category->freelancers->count() }} 
                                                        Freelancers
                                                    </p>
                                                </div>
                                            </div>
                                        </a>	
                                    </div>
                                </div> 
                            @endforeach 
                        </div>

                        <div class="row justify-content-center">

                            @forelse ($freelancers as $freelancer)
                                <div class="col-lg-4 col-md-4 col-sm-12" style="cursor: pointer" wire:click.prevent='revealFreelancer({{ $freelancer->id() }})'>
                                    <div class="grid_agents">
                                        <div class="elio_mx_list theme-bg-2">{{ $freelancer->jobs->count() }} Completed Jobs</div>
                                        <div class="grid_agents-wrap">
                                            
                                            <div class="fr-grid-thumb">
                                                <a wire:click.prevent='revealFreelancer({{ $freelancer->id() }})'>
                                                    <span class="verified"><img src="{{ asset('img/verified.svg') }}" class="verify mx-auto" alt=""></span>
                                                    <img src="{{ asset('img/team-1.jpg') }}" class="img-fluid mx-auto" alt="">
                                                </a>
                                            </div>
                                            
                                            <div class="fr-grid-deatil">
                                                <h5 class="fr-can-name"><a wire:click.prevent='revealFreelancer({{ $freelancer->id() }})'>{{ $freelancer->user()->name() }}</a></h5>
                                                <h5 class="fr-can-name"><a wire:click.prevent='revealFreelancer({{ $freelancer->id() }})'>{{ $freelancer->title }}</a></h5>
                                                <span>
                                                    {{ $freelancer->excerpt(50) }}
                                                </span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            @empty
                                <div class="text-center">
                                    <p>No freelancer available</p>
                                </div>
                            @endforelse
                        
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($viewFreelancer)
        <div class="row">
                        
            <!-- property main detail -->
            <div class="col-lg-8 col-md-12 col-sm-12">
                
                <!-- Single Block Wrap -->
                <div class="property_block_wrap">
                    
                    <div class="property_block_wrap_header">
                        <h4 class="property_block_title">Freelancer's Description</h4>
                    </div>
                    
                    <div class="block-body">
                        <p>{{ $viewFreelancer->description() }}</p>
                    </div>

                    <div class="_prtis_list_body">
                        <ul class="deatil_features">
                            <li>
                                <strong>Freelancer Category</strong>
                                {{ $viewFreelancer->branch->name }}
                            </li>

                            <li>
                                <strong>Freelancer Subcategory</strong>
                                {{ $viewFreelancer->subBranches->name }}
                            </li>

                            <li>
                                <strong>Verification Status</strong>
                                Verified
                            </li>

                            <li>
                                <strong>Verification Status</strong>
                                @foreach($viewFreelancer->language as $language)
                                    <span class="active">{{ $language }},</span>
                                @endforeach
                            </li>
                        </ul>
                    </div>

                    <div class="rating-overview">
                        <div class="rating-overview-box">
                            <span class="rating-overview-box-total">4.8</span>
                            <span class="rating-overview-box-percent">out of 5.0</span>
                            <div class="star-rating" data-rating="5"><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i><i class="fa fa-star-half filled"></i>
                            </div>
                        </div>

                        <div class="rating-bars">
                            <div class="rating-bars-item">
                                <span class="rating-bars-name">Property</span>
                                <span class="rating-bars-inner">
                                    <span class="rating-bars-rating high" data-rating="4.7">
                                        <span class="rating-bars-rating-inner" style="width: 85%;"></span>
                                    </span>
                                    <strong>4.7</strong>
                                </span>
                            </div>
                            <div class="rating-bars-item">
                                <span class="rating-bars-name">Value for Money</span>
                                <span class="rating-bars-inner">
                                    <span class="rating-bars-rating good" data-rating="3.9">
                                        <span class="rating-bars-rating-inner" style="width: 75%;"></span>
                                    </span>
                                    <strong>3.9</strong>
                                </span>
                            </div>
                            <div class="rating-bars-item">
                                <span class="rating-bars-name">Location</span>
                                <span class="rating-bars-inner">
                                    <span class="rating-bars-rating mid" data-rating="6.2">
                                        <span class="rating-bars-rating-inner" style="width: 65.2%;"></span>
                                    </span>
                                    <strong>6.2</strong>
                                </span>
                            </div>
                            <div class="rating-bars-item">
                                <span class="rating-bars-name">Agent Support</span>
                                <span class="rating-bars-inner">
                                    <span class="rating-bars-rating high" data-rating="7.0">
                                        <span class="rating-bars-rating-inner" style="width:70%;"></span>
                                    </span>
                                    <strong>7.0</strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <!-- property Sidebar -->
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="property-sidebar">
                    
                    <div class="agency_gridio_wrap">
                        <div class="agency_gridio_header" style="background:#d2382d url(assets/img/bg2.png)no-repeat">
                            <span class="agents_count">{{ $viewFreelancer->jobs->count() }} Completed Task</span>
                        </div>
                        <div class="agency_gridio_caption">
                            <div class="agency_gridio_thumb">
                                <a href="agency-page.html"><img src="{{ $viewFreelancer->image ? asset('storage/'.$viewFreelancer->image) : asset('default.png')}}" class="img-fluid" alt=""></a>	
                            </div>
                            <div class="agency_gridio_txt">
                                <h4><a href="agency-page.html">{{ $viewFreelancer->title }}</a></h4>
                                <span class="agt_gridio_ocat">
                                    {{ $viewFreelancer->rate }} / <sup style="color: #d2382d; font-weight: bold; font-size: 12px">hr</sup>
                                </span>
                                <x-buttons.default wire:click="assignJob({{ $viewFreelancer->id() }})">Assign Job</x-buttons.default>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>	
    @endif
   
</div>
