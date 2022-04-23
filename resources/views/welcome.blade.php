<!DOCTYPE html>
<html lang="en">
	
	<head>
        @include('partials.head')
    </head>
	
    <body class="yellow-skin">
        
        <div class="preloader"></div>
			
       
        <div id="main-wrapper">
		
			@include('partials.nav')
					
			<div class="home-map-banner full-wrapious">
				<livewire:pages.map>
	
				<!-- Advance Search -->
				<div class="advance-search-container">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<button data-toggle="collapse" data-target="#ad-search" class="btn adv-btn theme-bg">Advance Search</button>

								<div id="ad-search" class="collapse">
									<div class="map-search-box">
							
										<div class="full_search_box nexio_search lightanic_search hero_search-radius modern">
											<div class="search_hero_wrapping">
												<form name="geodir-listing-search" action="{{ route('property.index') }}" method="get">
													<div class="row">

														<div class="col-lg-2 col-md-2 col-sm-12">
															<div class="form-group">
																<div class="input-with-icon">
																	<select id="pcategory" class="form-control" name="category">
																		<option value="">&nbsp;</option>
																		@foreach ($categories as $category)
																			<option value="{{ $category->id }}">{{ $category->name }}</option>
																		@endforeach
																	</select>
																</div>
															</div>
														</div>
														
														<div class="col-lg-2 col-md-2 col-sm-12">
															<div class="form-group">
																<div class="input-with-icon">
																	<select id="lookingfor" class="form-control" name="purpose">
																		<option value="">&nbsp;</option>
																		<option value="for-rent">For Rent</option>
																		<option value="for-sale">For Sale</option>
																	</select>
																</div>
															</div>
														</div>
														
							
														<div class="col-lg-3 col-md-3 col-sm-12">
															<div class="form-group">
																<div class="input-with-icon">
																	<select id="price" class="form-control" name="price">
																		<option value="">&nbsp;</option>
																		<option value="1">From 30,000 To 50,000</option>
																		<option value="1">From 50,000 To 70,000</option>
																		<option value="2">From 70,000 To 100,000</option>
																		<option value="3">From 100,000 & Above</option>
																	</select>
																</div>
															</div>
														</div>
														
														<div class="col-lg-3 col-md-3 col-sm-12">
															<div class="form-group none">
																<div class="input-with-icon">
																	<select id="ptypes" class="form-control" name="type">
																		<option value="">&nbsp;</option>
																		@foreach ($types as $type)
																			<option value="{{ $type->id }}">{{ $type->name }}</option>  
																		@endforeach
																	</select>
																</div>
															</div>
														</div>
														
														<div class="col-lg-2 col-md-2 col-sm-12 small-padd">
																<div class="form-group none">
																	<x-buttons.default class="btn search-btn" data-title="fas fa-search" aria-label="fas fa-search">Search</x-buttons.default>
																</div>
														</div>
														
													</div>
												</form>
											</div>
										</div>
										
									</div>
						
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		
			{{-- categories --}}
			<section class="gray-simple min">
				<div class="container">
				
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<h2>Featured Property Types</h2>
								<p>Find All Type of Property.</p>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center">
						
						@foreach ($categories as $category)
							<div class="col-lg col-md-4">
								<!-- Single Category -->
								<div class="property_cats_boxs">
									<a href="grid-layout-with-sidebar.html" class="category-box">
										<div class="property_category_short">
											<div class="category-icon clip-1">
												<i class="{{ $category->icon }}"></i>
											</div>

											<div class="property_category_expand property_category_short-text">
												<h4>{{ $category->name }}</h4>
												<p>
													{{ $category->properties->count() }}
													{{ Illuminate\Support\Str::plural('Property', count($category->properties)) }}
												</p>
											</div>
										</div>
									</a>	
								</div>
							</div>
						@endforeach
						
					</div>
				</div>
			</section>
		
			{{-- listed properties --}}
			<section>
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-10 text-center">
							<div class="sec-heading center mb-4">
								<h2>Recent Listed Property</h2>
								<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center">
						@forelse ($properties as $property)
							<x-front.property :property="$property"/>
						@empty
							<p>No properties available</p>
						@endforelse
              	
					</div>
					
					<!-- Pagination -->
					<x-front.explore>
                        <x-slot name="link">
                            <a href="{{ route('property.index')}}" class="btn btn-theme-light-2 rounded">
                                Explore More Properties
                            </a>
                        </x-slot>
                    </x-front.explore>
					
				</div>
			</section>
		
			{{-- how it works --}}
			<section class="min light-bg">
				<div class="container">
					
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8">
							<div class="sec-heading center">
								<h2>How It Works?</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center">
						
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="wpk_process">
								<div class="wpk_thumb">
									<div class="wpk_thumb_figure">
										<img src="{{ asset('img/account-cl.svg') }}" class="img-fluid" alt="" />
									</div>
								</div>
								<div class="wpk_caption">
									<h4>Create An Account</h4>
									<p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum available.</p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="wpk_process active">
								<div class="wpk_thumb">
									<div class="wpk_thumb_figure">
										<img src="{{ asset('img/search.svg') }}" class="img-fluid" alt="" />
									</div>
								</div>
								<div class="wpk_caption">
									<h4>Find & Search Property</h4>
									<p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum available.</p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="wpk_process">
								<div class="wpk_thumb">
									<div class="wpk_thumb_figure">
										<img src="{{ asset('img/booking-cl.svg') }}" class="img-fluid" alt="" />
									</div>
								</div>
								<div class="wpk_caption">
									<h4>Book Your Property</h4>
									<p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum available.</p>
								</div>
							</div>
						</div>
					
					</div>
					
				</div>
			</section>

			<div class="clearfix"></div>
			
			{{-- agent --}}
			<section class="image-cover" style="background:#122947 url({{ asset('img/pattern.png')}}) no-repeat;">
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8">
							<div class="sec-heading center light">
								<h2>Our Featured Agents</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center">
						<x-front.agent/>
						<x-front.agent/>
						<x-front.agent/>
					</div>

                    <x-front.explore>
                        <x-slot name="link">
                            <a href="list-layout-with-map.html" class="btn btn-theme-light-2 rounded">
                                Explore More Agents
                            </a>
                        </x-slot>
                    </x-front.explore>
					
				</div>
			</section>
	
			@include('partials.footer')
					
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			
		</div>
		
		@include('partials.script')

	</body>

</html>