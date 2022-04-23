<div class="submit-page">

    <div class="custom-tab style-1" x-data="{ currentTab: $persist('home')}">
        <ul class="nav nav-tabs pb-2 b-0" id="myTab" role="tablist" wire:ignore>
            <li class="nav-item">
                <a class="nav-link" :class="currentTab == 'home' ? 'active' : '' " @click.prevent="currentTab = 'home' " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" :class="currentTab == 'profile' ? 'active' : '' " @click.prevent="currentTab = 'profile' " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Policy and Terms</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" :class="currentTab == 'contact' ? 'active' : '' " @click.prevent="currentTab = 'contact' " id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" :class="currentTab == 'home' ? 'active show' : ''" wire:ignore.self id="home" role="tabpanel" aria-labelledby="home-tab">
                <form wire:submit.prevent="updateApplicationInformation">
                    <div class="frm_submit_block">
                        <div class="frm_submit_wrap">

                            <div class="row flex items-center justify-center p-4">
                                <div class="dash_user_avater" x-data="{ imagePreview: '{{ asset('storage/'.application('image')) }}' }" title="Click on the image to update your profile picture">
                                    <input wire:model="photo" type="file" class="d-none" x-ref="photo"
                                        x-on:change="
                                        reader = new FileReader();
                                            reader.onload = (event) => {
                                            imagePreview = event.target.result;
                                            document.getElementById('navLogo').src = `${imagePreview}`;
                                        };
                                            reader.readAsDataURL($refs.photo.files[0]);
                                        "
                                    >
                                    <img x-on:click="$refs.photo.click()" src="{{ application('image') ? asset('storage/'.application('image')) : asset('default.png')}}" class="img-fluid avater"
                                        alt="{{ application('name') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <x-form.label for="name" value="{{ __('Company Name') }}" />
                                    <x-form.input id="name" class="block w-full mt-1" type="text" wire:model="app.name" autofocus />
                                    <x-form.error for="name" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.label for="alias" value="{{ __('Company Alias') }}" />
                                    <x-form.input id="alias" class="block w-full mt-1" type="text" wire:model="app.alias" autofocus />
                                    <x-form.error for="alias" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.label for="regNo" value="{{ __('Company Registrations Number') }}" />
                                    <x-form.input id="regNo" class="block w-full mt-1" type="text" wire:model="app.regNo" autofocus />
                                    <x-form.error for="regNo" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.label for="email" value="{{ __('Company Email Address') }}" />
                                    <x-form.input id="email" class="block w-full mt-1" type="email" wire:model="app.email" autofocus />
                                    <x-form.error for="email" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.label for="line1" value="{{ __('Company telephone (hotline)') }}" />
                                    <x-form.input id="line1" class="block w-full mt-1" type="tel" wire:model="app.line1" autofocus />
                                    <x-form.error for="line1" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.label for="line2" value="{{ __('Company telephone Number 2') }}" />
                                    <x-form.input id="line2" class="block w-full mt-1" type="tel" wire:model="app.line2" autofocus />
                                    <x-form.error for="line2" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.label for="slogan" value="{{ __('Company Slogan') }}" />
                                    <x-form.input id="slogan" class="block w-full mt-1" type="text" wire:model="app.slogan" autofocus />
                                    <x-form.error for="slogan" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.label for="motto" value="{{ __('Company Motto') }}" />
                                    <x-form.input id="motto" class="block w-full mt-1" type="text" wire:model="app.motto" autofocus />
                                    <x-form.error for="motto" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.label for="whatsapp" value="{{ __('Company Whatsapp Number') }}" />
                                    <x-form.input id="whatsapp" class="block w-full mt-1" type="text" wire:model="app.whatsapp" autofocus />
                                    <x-form.error for="whatsapp" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.label for="facebook" value="{{ __('Company Facebook Account') }}" />
                                    <x-form.input id="facebook" class="block w-full mt-1" type="text" wire:model="app.facebook" autofocus />
                                    <x-form.error for="facebook" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.label for="instagram" value="{{ __('Company Instagram Account') }}" />
                                    <x-form.input id="instagram" class="block w-full mt-1" type="text" wire:model="app.instagram" autofocus />
                                    <x-form.error for="instagram" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.label for="address" value="{{ __('Company Address') }}" />
                                    <x-form.input id="address" class="block w-full mt-1" type="text" wire:model="app.address" autofocus />
                                    <x-form.error for="address" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.label for="logistic" value="{{ __('Company Logistic Price') }}" />
                                    <x-form.input id="logistic" class="block w-full mt-1" type="number" wire:model="app.logistic" autofocus />
                                    <x-form.error for="logistic" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.label for="cleaning" value="{{ __('Company cleaning Price') }}" />
                                    <x-form.input id="cleaning" class="block w-full mt-1" type="number" wire:model="app.cleaning" autofocus />
                                    <x-form.error for="cleaning" />
                                </div>

                                  <div class="form-group col-md-12">
                                    <x-form.label for="description" value="{{ __('About Company') }}" />
                                    <textarea class="form-control h-120" wire:model="app.description"></textarea>
                                    <x-form.error for="description" />
                                </div>

                                <div class="form-group col-lg-12 col-md-12">
                                    <button class="btn btn-theme float-right" type="submit">Update</button>
                                </div>

                            </div>

                        </div>
                    </div>

                </form>
            </div>
            <div class="tab-pane fade" :class="currentTab == 'profile' ? 'active show' : ''" wire:ignore.self id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class=" add-input">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter Name" wire:model="name.0">
                                            @error('name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class=