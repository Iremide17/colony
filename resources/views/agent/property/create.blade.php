<x-app-layout>
    <x-slot name="header">
		<div class="breadcrumbs-wrap">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">Submit Property</li>
			</ol>
			<h2 class="breadcrumb-title">Submit Your Property</h2>
		</div>
	</x-slot>

    <div class="dashboard-body">                    
       
        <div class="dashboard-wraper">
            <div class="row">
                
                <div class="col-lg-12 col-md-12">

                    <div>
                        <h3>Media</h3>
                        <div class="frm_submit_wrap">
                            <div class="form-row">
                                <div class="form-group col-lg-4 col-sm-2">
                                    <div class="flex flex-row justify-center">
                                        <div class="mt-4">
                                            <button class="btn btn-theme btn-sm" id="uploadImage1">
                                                {{ __('First Image') }}
                                            </button>
                                            <x-form.error for="image1" />
                                        </div>
                                        <div>
                                            <img src="{{ asset('default.png') }}" alt="default image" width="150" height="150" class="rounded-full" id="first">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-4 col-sm-2">
                                    <div class="flex flex-row justify-center">
                                        <div class="mt-4">
                                            <button class="btn btn-theme btn-sm" id="uploadImage2">
                                                {{ __('Second Image') }}
                                            </button>
                                            <x-form.error for="image2" />
                                        </div>
                                        <div>
                                            <img src="{{ asset('default.png') }}" alt="default image" width="150" height="150" class="rounded-full" id="second">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-4 col-sm-2">
                                    <div class="flex flex-row justify-center">
                                        <div class="mt-4">
                                            <button class="btn btn-theme btn-sm" id="uploadImage3">
                                                {{ __('Third Image') }}
                                            </button>
                                            <x-form.error for="image3" />
                                        </div>
                                        <div>
                                            <img src="{{ asset('default.png') }}" alt="default image" width="150" height="150" class="rounded-full" id="third">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('agent.property.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="submit-page">
                            
                                <x-form.input id="image1" class="d-none" type="file" name="image" onchange="readFirst(this);" />
                                <x-form.input id="image2" class="d-none" type="file" name="image2" onchange="readSecond(this);" />
                                <x-form.input id="image3" class="d-none" type="file" name="image3" onchange="readThird(this);" />

                                <!-- Basic Information -->
                                <div class="frm_submit_block">	
                                    <h3>Basic Information</h3>
                                    <div class="frm_submit_wrap">
                                        <div class="form-row">
                                        
                                            <div class="form-group col-md-12">
                                                <x-form.label for="title" value="{{ __('Property Title') }}" />
                                                <x-form.input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')" autofocus />
                                                <x-form.error for="title" />
                                            </div>

                                            @admin
                                                <div class="form-group col-md-6">
                                                    <x-form.label for="agent_id" value="{{ __('Property Agent') }}" />
                                                    <select id="agent_id" class="form-control" name="agent_id" value="{{old('agent_id')}}">
                                                        <option value="">Select Agent</option>
                                                        @foreach ($agents as $agent)
                                                            <option value="{{ $agent->id() }}">{{ $agent->user()->name() }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-form.error for="agent_id" />
                                                </div>
                                            @endadmin
                                            
                                            <div class="form-group col-md-6">
                                                <x-form.label for="purpose" value="{{ __('Property Purpose') }}"/>
                                                <select id="purpose" name="purpose" class="form-control" value="{{old('purpose')}}">
                                                    <option value="">&nbsp;</option>
                                                    <option value="for-rent">For Rent</option>
                                                    <option value="for-sale">For Sale</option>
                                                </select>
                                                <x-form.error for="purpose" />
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <x-form.label for="category" value="{{ __('Property Category') }}" />
                                                <select id="category" class="form-control" name="category" value="{{old('category')}}">
                                                    @foreach ($categories as $id =>  $category)
                                                        <option value="{{ $id }}">{{ $category }}</option>
                                                    @endforeach
                                                </select>
                                                <x-form.error for="category" />
                                            </div>

                                            <div class="form-group col-md-6">
                                                <x-form.label for="price" value="{{ __('Property price') }}" /> <small class="text-danger">Specify price based on requency(Daily/Yearly) </small>
                                                <x-form.input class="block w-full mt-1" placeholder="{{ trans('global.naira') }}" type="text" name="price" :value="old('price')" autofocus />
                                                <x-form.error for="price" />
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <x-form.label for="area" value="{{ __('Property area') }}" />
                                                <x-form.input id="area" class="block w-full mt-1" placeholder="25sft" type="number" name="area" :value="old('area')" autofocus />
                                                <x-form.error for="area" />
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <x-form.label for="bedroom" value="{{ __('Property Bedrooms') }}" />
                                                <select id="bedroom" class="form-control" name="bedroom" value="{{old('bedroom')}}">
                                                    <option value="">&nbsp;</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                                <x-form.error for="bedroom" />
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <x-form.label for="bathroom" value="{{ __('Property Bathrooms') }}" />
                                                <select id="bathroom" class="form-control" name="bathroom" value="{{old('bathroom')}}">
                                                    <option value="">&nbsp;</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                                <x-form.error for="bathroom" />
                                            </div>
        
                                            <div class="form-group col-md-6">
                                                <x-form.label for="rentFrequent" value="{{ __('Property Rent Frequency') }}" />
                                                <select id="rentFrequent" class="form-control" name="rentFrequent" value="{{old('rentFrequent')}}">
                                                    <option value="">&nbsp;</option>
                                                    <option value="daily">Daily</option>
                                                    <option value="weekly">Weekly</option>
                                                    <option value="monthly">Monthly</option>
                                                    <option value="yearly">Yearly</option>
                                                </select>
                                                <x-form.error for="rentFrequent" />
                                            </div>
        
                                            <div class="form-group col-md-6">
                                                <x-form.label for="type" value="{{ __('Property Type') }}" />
                                                <select id="type" class="form-control" name="type" :value="old('type')">
                                                    @foreach ($types as $id => $type)
                                                        <option value="{{ $id }}">{{ $type }}</option>
                                                    @endforeach
                                                </select>
                                                <x-form.error for="type" />
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Location -->
                                <div class="frm_submit_block">	
                                    <h3>Location</h3>
                                    <div class="frm_submit_wrap">
                                        <div class="form-row">
                                        
                                            <div class="form-group col-md-6">
                                                <x-form.label for="address" value="{{ __('Property Address') }}" />
                                                <x-form.input id="address" class="block w-full mt-1" placeholder="address" type="text" name="address" :value="old('address')" autofocus />
                                                <x-form.error for="address" />
                                            </div>

                                            <div class="form-group col-md-6">
                                                <x-form.label for="city" value="{{ __('Property City') }}" />
                                                <x-form.input id="city" class="block w-full mt-1" placeholder="city" type="text" name="city" :value="old('city')" autofocus />
                                                <x-form.error for="city" />
                                            </div>

                                            <div class="form-group col-md-6">
                                                <x-form.label for="state" value="{{ __('Property State') }}" />
                                                <x-form.input id="state" class="block w-full mt-1" placeholder="state" type="text" name="state" :value="old('state')" autofocus />
                                                <x-form.error for="state" />
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <x-form.label for="postal" value="{{ __('Property Postal') }}" />
                                                <x-form.input id="postal" class="block w-full mt-1" placeholder="postal" type="text" name="postal" :value="old('postal')" autofocus />
                                                <x-form.error for="postal" />
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <x-form.label for="longitude" value="{{ __('Property Longitude') }}" />
                                                <x-form.input id="longitude" class="block w-full mt-1" placeholder="longitude" type="text" name="longitude" :value="old('longitude')" autofocus />
                                                <x-form.error for="longitude" />
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <x-form.label for="latitude" value="{{ __('Property Latitude') }}" />
                                                <x-form.input id="latitude" class="block w-full mt-1" placeholder="latitude" type="text" name="latitude" :value="old('latitude')" autofocus />
                                                <x-form.error for="latitude" />
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Detailed Information -->
                                <div class="frm_submit_block">	
                                    <h3>Detailed Information</h3>
                                    <div class="frm_submit_wrap">
                                        <div class="form-row">
                                        
                                            <div class="form-group col-md-12 mt-2">
                                                <x-form.label for="description" value="{{ __('Property Description') }}" />
                                                <textarea class="form-control h-120" name="description" :value="old('description')"></textarea>
                                                <x-form.error for="description" />
                                            </div>
                                            
                                            <div class="form-group col-md-6 mt-2">
                                                <x-form.label for="built" value="{{ __('Property Built') }}" />
                                                <x-form.input  class="block w-full mt-1" type="date" name="built" :value="old('built')" autofocus />
                                                <x-form.error for="built" />
                                            </div>

                                             <div class="form-group col-md-6 mt-2">
                                                <x-form.label for="video" value="{{ __('Property Video Link') }}" />
                                                <x-form.input id="video" class="block w-full mt-1" type="text" name="video" :value="old('video')" placeholder="https://www.youtube.com/embed/qN3OueBm9F4?rel=0" autofocus />
                                                <x-form.error for="video" />
                                            </div>
                                                                    
                                            <div class="form-group col-md-12 mt-2">
                                                <label>Other Features (optional)</label>
                                                <div class="o-features">
                                                    <ul class="no-ul-list third-row">
                                                        <li>
                                                            <input id="isFenced" class="checkbox-custom" name="isFenced" type="checkbox">
                                                            <label for="isFenced" class="checkbox-custom-label">Fenced</label>
                                                        </li>
        
                                                        <li>
                                                            <input id="isTapped" class="checkbox-custom" name="isTapped" type="checkbox">
                                                            <label for="isTapped" class="checkbox-custom-label">Tap Water</label>
                                                        </li>

                                                        <li>
                                                            <input id="isTiled" class="checkbox-custom" name="isTiled" type="checkbox">
                                                            <label for="isTiled" class="checkbox-custom-label">Floor Tiled</label>
                                                        </li>
        
        
                                                        <li>
                                                            <input id="isWified" class="checkbox-custom" name="isWified" type="checkbox">
                                                            <label for="isWified" class="checkbox-custom-label">Wifi</label>
                                                        </li>
        
                                                        <li>
                                                            <input id="isParked" class="checkbox-custom" name="isParked" type="checkbox">
                                                            <label for="isParked" class="checkbox-custom-label">Parking Space</label>
                                                        </li>
        
                                                        <li>
                                                            <input id="isAirConditioned" class="checkbox-custom" name="isAirConditioned" type="checkbox">
                                                            <label for="isAirConditioned" class="checkbox-custom-label">Air condition</label>
                                                        </li>
        
                                                        <li>
                                                            <input id="isSwimmed" class="checkbox-custom" name="isSwimmed" type="checkbox"> 
                                                            <label for="isSwimmed" class="checkbox-custom-label">Swimming Pool</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group col-lg-12 col-md-12">
                                    <label>Property Agreement *</label>
                                    <ul class="no-ul-list">
                                        <li>
                                            <input id="agreement" class="checkbox-custom" name="agreement" type="checkbox">
                                            <label for="agreement" class="checkbox-custom-label">I consent to having this website store my submitted information so they can respond to my inquiry.</label>
                                            <x-form.error for="agreement" />
                                        </li>
                                    </ul>
                                </div>
                                
                                <div class="form-group col-lg-12 col-md-12">
                                    <button class="btn btn-theme" type="submit">Submit & Preview</button>
                                </div>
                                            
                            </div>
                    </form>
                </div>
                
            </div>
            
        </div>
                    
    </div>
    @push('scripts')
        <script>
            $('#uploadImage3').click(function(){
                $('#image3').trigger('click');
            });
        
            function readThird(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#third')
                            .attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            
        </script>
        
        <script>
            $('#uploadImage2').click(function(){
                $('#image2').trigger('click');
            });
        
            function readSecond(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#second')
                            .attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            
        </script>
        
        <script>
            $('#uploadImage1').click(function(){
                $('#image1').trigger('click');
            });
        
            function readFirst(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#first')
                            .attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            
        </script>
    @endpush
</x-app-layout>
