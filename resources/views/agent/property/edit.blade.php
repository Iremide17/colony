<x-app-layout>
    <x-slot name="header">
		<div class="breadcrumbs-wrap">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">Update Property</li>
			</ol>
			<h2 class="breadcrumb-title">Update Your Property</h2>
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
                                            <img src="{{ $property->firstImage() ? asset('storage/'.$property->firstImage()) : asset('default.png')}}" alt="default image" width="150" height="150" class="rounded-full" id="first">
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
                                            <img src="{{ $property->secondImage() ? asset('storage/'.$property->secondImage()) : asset('default.png')}}" alt="default image" width="150" height="150" class="rounded-full" id="second">
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
                                            <img src="{{ $property->thirdImage() ? asset('storage/'.$property->thirdImage()) : asset('default.png') }}" alt="default image" width="150" height="150" class="rounded-full" id="third">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('agent.property.update', $property)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')    
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
                                                <x-form.input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title', $property->title())" autofocus />
                                                <x-form.error for="title" />
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <x-form.label for="purpose" value="{{ __('Property Purpose') }}"/>
                                                <select id="purpose" name="purpose" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    <option value="for-rent" @if($property->purpose() === 'for-rent') selected @endif > Rent</option>
                                                    <option value=-sale" @if($property->purpose() === 'for-sale') selected @endif >Sale</option>
                                                </select>
                                                <x-form.error for="purpose" />
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <x-form.label for="category" value="{{ __('Property Category') }}" />
                                                <select id="category" class="form-control" name="category" value="{{old('category')}}">
                                                    <option value="">&nbsp;</option>
                                                    <option value="apartment" @if($property->category() === 'apartment') selected @endif>Apartment</option>
                                                    <option value="hall" @if($property->category === 'hall') selected @endif>Hall</option>
                                                    <option value="resturant" @if($property->category === 'resturant') selected @endif>Resturant</option>
                                                    <option value="villas" @if($property->category === 'villas') selected @endif>Villas</option>
                                                    <option value="offices" @if($property->category === 'offices') selected @endif>Offices</option>
                                                    <option value="school" @if($property->category === 'school') selected @endif>School</option>
                                                    <option value="hospital" @if($property->category === 'hospital') selected @endif>Hospital</option>
                                                </select>
                                                <x-form.error for="category" />
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <x-form.label for="price" value="{{ __('Property price') }}" />
                                                <x-form.input id="price" class="block w-full mt-1" placeholder="{{ trans('global.naira') }}" type="number" name="price" :value="old('price', $property->price())" autofocus />
                                                <x-form.error for="price" />
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <x-form.label for="area" value="{{ __('Property area') }}" />
                                                <x-form.input id="area" class="block w-full mt-1" placeholder="25sft" type="number" name="area" :value="old('area', $property->area())" autofocus />
                                                <x-form.error for="area" />
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <x-form.label for="bedroom" value="{{ __('Property Bedrooms') }}" />
                                                <select id="bedroom" class="form-control" name="bedroom">
                                                    <option value="">&nbsp;</option>
                                                    <option value="1"@if($property->bedroom === '1') selected @endif>1</option>
                                                    <option value="2" @if($property->bedroom === '2') selected @endif>2</option>
                                                    <option value="3" @if($property->bedroom === '3') selected @endif>3</option>
                                                    <option value="4" @if($property->bedroom === '4') selected @endif>4</option>
                                                    <option value="5" @if($property->bedroom === '5') selected @endif>5</option>
                                                </select>
                                                <x-form.error for="bedroom" />
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <x-form.label for="bathroom" value="{{ __('Property Bathrooms') }}" />
                                                <select id="bathroom" class="form-control" name="bathroom" value="{{old('bathroom')}}">
                                                    <option value="">&nbsp;</option>
                                                    <option value="1"@if($property->bathroom === '1') selected @endif>1</option>
                                                    <option value="2" @if($property->bathroom === '2') selected @endif>2</option>
                                                    <option value="3" @if($property->bathroom === '3') selected @endif>3</option>
                                                    <option value="4" @if($property->bathroom === '4') selected @endif>4</option>
                                                    <option value="5" @if($property->bathroom === '5') selected @endif>5</option>
                                                </select>
                                                <x-form.error for="bathroom" />
                                            </div>
        
                                            <div class="form-group col-md-6">
                                                <x-form.label for="rentFrequent" value="{{ __('Property Rent Frequency') }}" />
                                                <select id="rentFrequent" class="form-control" name="rentFrequent">
                                                    <option value="">&nbsp;</option>
                                                    <option value="daily" @if($property->frequency() === 'daily') selected @endif>Daily</option>
                                                    <option value="weekly" @if($property->frequency() === 'weekly') selected @endif'>Weekly</option>
                                                    <option value="monthly" @if($property->frequency() === 'monthly') selected @endif>Monthly</option>
                                                    <option value="yearly" @if($property->frequency() === 'yearly') selected @endif>Yearly</option>
                                                </select>
                                                <x-form.error for="rentFrequent" />
                                            </div>
        
                                            <div class="form-group col-md-6">
                                                <x-form.label for="type" value="{{ __('Property Type') }}" />
                                                <select id="type" class="form-control" name="type">
                                                    <option value="">&nbsp;</option>
                                                    <option value="sc" @if($property->type() === 'sc') selected @endif>Self Contained</option>
                                                    <option value="sr" @if($property->type() === 'sr') selected @endif>Single Room</option>
                                                    <option value="duplex" @if($property->type() === 'duplex') selected @endif>Duplex</option>
                                                    <option value="2br" @if($property->type() === '2br') selected @endif>2 Bedroom Apartment</option>
                                                    <option value="3br" @if($property->type() === '3br') selected @endif>3 Bedroom Apartment</option>
                                                    <option value="sps" @if($property->type() === 'sps') selected @endif>Small Parking Space</option>
                                                    <option value="lps" @if($property->type() === 'lps') selected @endif>Large Parking Space </option>
        
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
                                                <x-form.input id="address" class="block w-full mt-1" placeholder="address" type="text" name="address" :value="old('address', $property->address)" autofocus />
                                                <x-form.error for="address" />
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <x-form.label for="postal" value="{{ __('Property Postal') }}" />
                                                <x-form.input id="postal" class="block w-full mt-1" placeholder="postal" type="text" name="postal" :value="old('postal', $property->postal)" autofocus />
                                                <x-form.error for="postal" />
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <x-form.label for="longitude" value="{{ __('Property Longitude') }}" />
                                                <x-form.input id="longitude" class="block w-full mt-1" placeholder="longitude" type="text" name="longitude" :value="old('longitude', $property->longitude)" autofocus />
                                                <x-form.error for="longitude" />
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <x-form.label for="latitude" value="{{ __('Property Latitude') }}" />
                                                <x-form.input id="latitude" class="block w-full mt-1" placeholder="latitude" type="text" name="latitude" :value="old('latitude', $property->latitude)" autofocus />
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
                                        
                                            <div class="form-group col-md-12">
                                                <x-form.label for="description" value="{{ __('Property Description') }}" />
                                                <textarea class="form-control h-120" name="description" :value="old('description')">{{ $property->description }}</textarea>
                                                <x-form.error for="description" />
                                            </div>
                                            
                                            <div class="form-group col-md-4">
                                                <x-form.label for="built" value="{{ __('Property built') }}" />
                                                <x-form.input id="built" class="block w-full mt-1" type="date" name="built" :value="old('built',$property->built)" autofocus />
                                                <x-form.error for="built" />
                                            </div>
                                                                    
                                            <div class="form-group col-md-12">
                                                <label>Other Features (optional)</label>
                                                <div class="o-features">
                                                    <ul class="no-ul-list third-row">
                                                        <li>
                                                            <input id="isFenced" class="checkbox-custom" name="isFenced" type="checkbox" @if($property->isFenced) checked @endif>
                                                            <label for="isFenced" class="checkbox-custom-label">Fenced</label>
                                                        </li>
        
                                                        <li>
                                                            <input id="isTapped" class="checkbox-custom" name="isTapped" type="checkbox" @if($property->isTapped) checked @endif>
                                                            <label for="isTapped" class="checkbox-custom-label">Tap Water</label>
                                                        </li>

                                                        <li>
                                                            <input id="isTiled" class="checkbox-custom" name="isTiled" type="checkbox" @if($property->isTiled) checked @endif>
                                                            <label for="isTiled" class="checkbox-custom-label">Floor Tiled</label>
                                                        </li>
        
        
                                                        <li>
                                                            <input id="isWified" class="checkbox-custom" name="isWified" type="checkbox" @if($property->isWified) checked @endif>
                                                            <label for="isWified" class="checkbox-custom-label">Wifi</label>
                                                        </li>
        
                                                        <li>
                                                            <input id="isParked" class="checkbox-custom" name="isParked" type="checkbox" @if($property->isParked) checked @endif>
                                                            <label for="isParked" class="checkbox-custom-label">Parking Space</label>
                                                        </li>
        
                                                        <li>
                                                            <input id="isAirConditioned" class="checkbox-custom" name="isAirConditioned" type="checkbox" @if($property->isAirConditioned) checked @endif>
                                                            <label for="isAirConditioned" class="checkbox-custom-label">Air condition</label>
                                                        </li>
        
                                                        <li>
                                                            <input id="isSwimmed" class="checkbox-custom" name="isSwimmed" type="checkbox" @if($property->isSwimmed) checked @endif> 
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
                                    <button class="btn btn-theme" type="submit">Update Properrty</button>
                                </div>
                                            
                            </div>
                    </form>
                </div>
                
            </div>
            
        </div>
                    
    </div>
</x-app-layout>
