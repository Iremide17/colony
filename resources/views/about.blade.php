<x-guest-layout>

    <x-slot name="header">
        <div class="breadcrumbs-wrap">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
            <h2 class="breadcrumb-title">About Us - Who We Are?</h2>
        </div>
    </x-slot>

    <section>
			
        <div class="container">
        
            <!-- row Start -->
            <div class="row align-items-center">
                
                <div class="col-lg-6 col-md-6">
                    <div class="story-wrap explore-content">
                        
                        <h2>Our Agency Story</h2>
                        <span class="theme-cl">Check out our company story and work process</span>
                        <p class="mt-4">{{ application('description') }}</p>
                        <p class="mb-3">{{ application('description') }}</p>
                        <a href="#" class="btn theme-bg btn-rounded">More About Us</a>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6">
                    <img src="{{ asset('img/immio.jpg') }}" class="img-fluid rounded" alt="" />
                </div>
                
            </div>
            <!-- /row -->					
            
        </div>
                
    </section>

    <section class="image-cover" style="background:#27ae60 url({{ asset('img/pattern.png') }}) no-repeat;">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12">
                    <div class="text-center mb-5">
                        <span class="text-light">Our Awards</span>
                        <h2 class="font-weight-normal text-light">Over 1,24,000+ Happy User Bieng with us Still they Love Our Services</h2>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="_morder_counter">
                        <div class="_morder_counter_thumb"><i class="ti-cup"></i></div>
                        <div class="_morder_counter_caption">
                            <h5 class="text-light"><span>32</span> M</h5>
                            <span class="text-light">Blue Burmin Award</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="_morder_counter">
                        <div class="_morder_counter_thumb"><i class="ti-briefcase"></i></div>
                        <div class="_morder_counter_caption">
                            <h5 class="text-light"><span>43</span> M</h5>
                            <span class="text-light">Mimo X11 Award</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="_morder_counter">
                        <div class="_morder_counter_thumb"><i class="ti-light-bulb"></i></div>
                        <div class="_morder_counter_caption">
                            <h5 class="text-light"><span>51</span> M</h5>
                            <span class="text-light">Australian UGC Award</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="_morder_counter">
                        <div class="_morder_counter_thumb"><i class="ti-heart"></i></div>
                        <div class="_morder_counter_caption">
                            <h5 class="text-light"><span>42</span> M</h5>
                            <span class="text-light">IITCA Green Award</span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <section>
        <div class="container">
        
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="sec-heading center">
                        <h2>Meet Our Team</h2>
                        <p>Professional & Dedicated Team</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                
                    <div class="team-slide item-slide">
                        
                        <!-- Single Teamm -->
                        <div class="single-team">
                            <div class="team-grid">
                        
                                <div class="teamgrid-user">
                                    <img src="assets/img/user-1.jpg" alt="" class="img-fluid" />
                                </div>
                                
                                <div class="teamgrid-content">
                                    <h4>Shaurya Preet</h4>
                                    <span>Co-Founder</span>
                                </div>
                                
                                <div class="teamgrid-social">
                                    <ul>
                                        <li><a href="#" class="f-cl"><i class="ti-facebook"></i></a></li>
                                        <li><a href="#" class="t-cl"><i class="ti-twitter"></i></a></li>
                                        <li><a href="#" class="i-cl"><i class="ti-instagram"></i></a></li>
                                        <li><a href="#" class="l-cl"><i class="ti-linkedin"></i></a></li>
                                    </ul>
                                </div>
                    
                            </div>
                        </div>
                        
                        <!-- Single Teamm -->
                        <div class="single-team">
                            <div class="team-grid">
                        
                                <div class="teamgrid-user">
                                    <img src="assets/img/user-2.jpg" alt="" class="img-fluid" />
                                </div>
                                
                                <div class="teamgrid-content">
                                    <h4>Shivangi Preet</h4>
                                    <span>Content Writer</span>
                                </div>
                                
                                <div class="teamgrid-social">
                                    <ul>
                                        <li><a href="#" class="f-cl"><i class="ti-facebook"></i></a></li>
                                        <li><a href="#" class="t-cl"><i class="ti-twitter"></i></a></li>
                                        <li><a href="#" class="i-cl"><i class="ti-instagram"></i></a></li>
                                        <li><a href="#" class="l-cl"><i class="ti-linkedin"></i></a></li>
                                    </ul>
                                </div>
                    
                            </div>
                        </div>
                        
                        <!-- Single Teamm -->
                        <div class="single-team">
                            <div class="team-grid">
                        
                                <div class="teamgrid-user">
                                    <img src="assets/img/user-3.jpg" alt="" class="img-fluid" />
                                </div>
                                
                                <div class="teamgrid-content">
                                    <h4>Yash Preet</h4>
                                    <span>Content Writer</span>
                                </div>
                                
                                <div class="teamgrid-social">
                                    <ul>
                                        <li><a href="#" class="f-cl"><i class="ti-facebook"></i></a></li>
                                        <li><a href="#" class="t-cl"><i class="ti-twitter"></i></a></li>
                                        <li><a href="#" class="i-cl"><i class="ti-instagram"></i></a></li>
                                        <li><a href="#" class="l-cl"><i class="ti-linkedin"></i></a></li>
                                    </ul>
                                </div>
                    
                            </div>
                        </div>
                        
                        <!-- Single Teamm -->
                        <div class="single-team">
                            <div class="team-grid">
                        
                                <div class="teamgrid-user">
                                    <img src="assets/img/user-4.jpg" alt="" class="img-fluid" />
                                </div>
                                
                                <div class="teamgrid-content">
                                    <h4>Dhananjay Preet</h4>
                                    <span>CEO & Manager</span>
                                </div>
                                
                                <div class="teamgrid-social">
                                    <ul>
                                        <li><a href="#" class="f-cl"><i class="ti-facebook"></i></a></li>
                                        <li><a href="#" class="t-cl"><i class="ti-twitter"></i></a></li>
                                        <li><a href="#" class="i-cl"><i class="ti-instagram"></i></a></li>
                                        <li><a href="#" class="l-cl"><i class="ti-linkedin"></i></a></li>
                                    </ul>
                                </div>
                    
                            </div>
                        </div>
                        
                        <!-- Single Teamm -->
                        <div class="single-team">
                            <div class="team-grid">
                        
                                <div class="teamgrid-user">
                                    <img src="assets/img/user-5.jpg" alt="" class="img-fluid" />
                                </div>
                                
                                <div class="teamgrid-content">
                                    <h4>Rahul Gilkrist</h4>
                                    <span>App Designer</span>
                                </div>
                                
                                <div class="teamgrid-social">
                                    <ul>
                                        <li><a href="#" class="f-cl"><i class="ti-facebook"></i></a></li>
                                        <li><a href="#" class="t-cl"><i class="ti-twitter"></i></a></li>
                                        <li><a href="#" class="i-cl"><i class="ti-instagram"></i></a></li>
                                        <li><a href="#" class="l-cl"><i class="ti-linkedin"></i></a></li>
                                    </ul>
                                </div>
                    
                            </div>
                        </div>
                        
                        <!-- Single Teamm -->
                        <div class="single-team">
                            <div class="team-grid">
                        
                                <div class="teamgrid-user">
                                    <img src="assets/img/user-6.jpg" alt="" class="img-fluid" />
                                </div>
                                
                                <div class="teamgrid-content">
                                    <h4>Adam Wilcard</h4>
                                    <span>Web Developer</span>
                                </div>
                                
                                <div class="teamgrid-social">
                                    <ul>
                                        <li><a href="#" class="f-cl"><i class="ti-facebook"></i></a></li>
                                        <li><a href="#" class="t-cl"><i class="ti-twitter"></i></a></li>
                                        <li><a href="#" class="i-cl"><i class="ti-instagram"></i></a></li>
                                        <li><a href="#" class="l-cl"><i class="ti-linkedin"></i></a></li>
                                    </ul>
                                </div>
                    
                            </div>
                        </div>
                        
                    </div>
                
                </div>
            </div>
        
        </div>
    </section>

    <section class="gray-simple">
        <div class="container">
        
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="sec-heading center">
                        <h2>Good Reviews By Clients</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="item-slide space">
                        
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="_testimonial_wrios">
                                <div class="_testimonial_flex">
                                    <div class="_testimonial_flex_first">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/user-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="_tsl_flex_capst">
                                            <h5>Susan D. Murphy</h5>
                                            <div class="_ovr_posts"><span>CEO, Leader</span></div>
                                            <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
                                        </div>
                                    </div>
                                    <div class="_testimonial_flex_first_last">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/c-1.png" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="facts-detail">
                                    <p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="_testimonial_wrios">
                                <div class="_testimonial_flex">
                                    <div class="_testimonial_flex_first">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/user-2.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="_tsl_flex_capst">
                                            <h5>Maxine E. Gagliardi</h5>
                                            <div class="_ovr_posts"><span>Apple CEO</span></div>
                                            <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.5</div>
                                        </div>
                                    </div>
                                    <div class="_testimonial_flex_first_last">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/c-2.png" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="facts-detail">
                                    <p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="_testimonial_wrios">
                                <div class="_testimonial_flex">
                                    <div class="_testimonial_flex_first">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/user-3.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="_tsl_flex_capst">
                                            <h5>Roy M. Cardona</h5>
                                            <div class="_ovr_posts"><span>Google Founder</span></div>
                                            <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.9</div>
                                        </div>
                                    </div>
                                    <div class="_testimonial_flex_first_last">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/c-3.png" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="facts-detail">
                                    <p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="_testimonial_wrios">
                                <div class="_testimonial_flex">
                                    <div class="_testimonial_flex_first">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/user-4.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="_tsl_flex_capst">
                                            <h5>Dorothy K. Shipton</h5>
                                            <div class="_ovr_posts"><span>Linkedin Leader</span></div>
                                            <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
                                        </div>
                                    </div>
                                    <div class="_testimonial_flex_first_last">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/c-4.png" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="facts-detail">
                                    <p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="_testimonial_wrios">
                                <div class="_testimonial_flex">
                                    <div class="_testimonial_flex_first">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/user-5.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="_tsl_flex_capst">
                                            <h5>Robert P. McKissack</h5>
                                            <div class="_ovr_posts"><span>CEO, Leader</span></div>
                                            <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
                                        </div>
                                    </div>
                                    <div class="_testimonial_flex_first_last">
                                        <div class="_tsl_flex_thumb">
                                            <img src="assets/img/c-5.png" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="facts-detail">
                                    <p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
            
        </div>
    </section>
	
			
</x-guest-layout>
