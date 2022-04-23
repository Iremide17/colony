<div>
    @push('styles')
        <style>
            #progressbar {
                margin-bottom: 30px;
                overflow: hidden;
                color: lightgrey
            }

            #progressbar .active {
                color: #1e852f;
                text-align: center
            }

            #progressbar li {
                list-style-type: none;
                font-size: 15px;
                width: 20%;
                float: left;
                position: relative;
                font-weight: 400;
                text-align: center
            }

            #progressbar #title:before {
                font-family: FontAwesome;
                content: "\f13e"
            }

            #progressbar #describe:before {
                font-family: FontAwesome;
                content: "\f086"
            }

            #progressbar #cat:before {
                font-family: FontAwesome;
                content: "\f03a"
            }

            #progressbar #rate:before {
                font-family: FontAwesome;
                content: "\f295"
            }

            #progressbar #confirm:before {
                font-family: FontAwesome;
                content: "\f00c";
            }

            #progressbar li:before {
                width: 50px;
                height: 50px;
                line-height: 45px;
                display: block;
                font-size: 20px;
                color: #ffffff;
                background: lightgray;
                border-radius: 50%;
                margin: 0 auto 10px auto;
                padding: 2px;
            }

            #progressbar li:after {
                content: '';
                width: 100%;
                height: 2px;
                background: lightgray;
                position: absolute;
                left: 0;
                top: 25px;
                z-index: -1;
                text-align: center
            }

            #progressbar li.active:before,
            #progressbar li.active:after {
                background: #1e852f;
            }

            .progress {
                height: 20px
            }

            .progress-bar {
                background-color: #1e852f
            }
        </style>
    @endpush
     <!-- progressbar -->
     <ul id="progressbar">
        <li class="{{ $currentStep == 1 ? 'active' : '' }}" id="title"><strong>Title</strong></li>
        <li class="{{ $currentStep == 2 ? 'active' : '' }}" id="describe"><strong>Description</strong></li>
        <li class="{{ $currentStep == 3 ? 'active' : '' }}" id="cat"><strong>Category</strong></li>
        <li class="{{ $currentStep == 4 ? 'active' : '' }}" id="rate"><strong>Rate</strong></li>
        <li class="{{ $currentStep == 5 ? 'active' : '' }}" id="confirm"><strong>Submit</strong></li>
    </ul>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:{{ $progressCount }}%" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
     
    <form wire:submit.prevent='freelancerForm'>

        @if ($currentStep == 1)
            <div class="justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="wpk_process" style="background-color: #abf5b8">
                        <div class="wpk_caption">
                            <h5>This is the very first thing clients will see, <br> so make it simple and count.</h5>
                        </div>

                        <div class="form-row">           
                            <div class="form-group col-md-12">
                                <div class="d-flex justify-content-center align-items-center">
                                    <x-form.input id="title" class="block w-full mt-3" type="text"  wire:model="title" style="width: 50%" placeholder="Painter | Home decorator" autofocus />
                                    <x-form.error for="title" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        @endif

        {{-- description --}}
        @if ($currentStep == 2)
            <div class="justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="wpk_process" style="background-color: #abf5b8">
                       
                        <div class="wpk_caption">
                            <h5>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum available.</h5>
                        </div>
                       
                        <div class="form-row"> 

                            <div class="form-group col-md-12">
                                {{-- <div class="d-flex justify-content-center align-items-center mt-4"> --}}
                                    {{-- <img src="{{ asset('default.png') }}" width="150" height="150" class="rounded-full" id="first"> --}}
                                    <input type="file" wire:model="image" class="block form-control" id="freelancerImage" 
                                    {{-- onchange="readFirst(this);" --}}
                                    >
                                {{-- </div> --}}
                            </div>

                            <div class="form-group col-md-12">
                                <x-form.input id="address" class="block w-full mt-3" type="text" wire:model="address" :value="old('address')" placeholder="Address" autofocus />
                                <x-form.error for="address" />
                            </div>

                            <div class="form-group col-md-6">
                                <x-form.input id="telephone" class="block w-full mt-3" type="tel" wire:model="telephone" :value="old('telephone')" placeholder="Telephone number" autofocus />
                                <x-form.error for="telephone" />
                            </div>

                            <div class="form-group col-md-6">
                                <x-form.input id="city" class="block w-full mt-3" type="text" wire:model="city" :value="old('city')" placeholder="Ondo city" autofocus />
                                <x-form.error for="city" />
                            </div>

                            <div class="form-group col-md-12" wire:ignore>
                                <select id="language" wire:model="language" class="form-control select2" multiple>
                                    <option value="english">English</option>
                                    <option value="yoruba">Yoruba</option>
                                    <option value="hausa">Hausa</option>
                                    <option value="igbo">Igbo</option>
                                </select>
                                <x-form.error for="language" />
                            </div>

                            {{-- <div class="form-group col-md-12">
                                
                                <div class="d-flex align-items-center">
                                    <div style="width: 80%">
                                        <select wire:="skill[]" id="skill" multiple x-data="{}" x-init="function () { choices($el) }">
                                            <option value="english">English</option>
                                            <option value="yoruba">Yoruba</option>
                                            <option value="hausa">Hausa</option>
                                            <option value="igbo">Igbo</option>
                                        </select>
                                    </div>
                                    <div class="ml-4" style="width: 20%">
                                        <a class="btn btn-theme btn-sm cursor-pointer text-white"
                                         x-data="{}" x-on:click="window.livewire.emitTo('skill-create', 'show')"
                                            >Create Skill
                                        </a>

                                        <livewire:skill-create />
                                    </div>

                                </div>
                            </div> --}}

                            <div class="form-group col-md-12">
                                <textarea class="form-control h-120" wire:model="description" placeholder="let get to know what you do...">{{ old('description') }}</textarea>
                                <x-form.error for="description" />
                            </div>

                        </div>
                    </div>

                </div>          
            </div>
        @endif

        {{-- category --}}
        @if ($currentStep == 3)
            <div class="justify-content-center">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="wpk_process" style="background-color: #abf5b8">
                    
                        <div class="wpk_caption">
                            <h5>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum available.</h5>
                        </div>

                        <div class="form-row mt-4"> 
                            
                            <div class="form-group col-md-6">
                                <select id="selectedCategory" wire:model="selectedCategory" class="form-control">
                                    @foreach ($branches as $id => $branch)
                                        <option value="{{ $id }}">{{ $branch }}</option>
                                    @endforeach
                                </select>
                                <x-form.error for="selectedCategory" />
                            </div>

                            <div class="form-group col-md-6">
                                <select id="selectedSubcategory" wire:model="selectedSubcategory" class="form-control">
                                    <option value="">Select Sub Category</option>
                                    @foreach ($sub_branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                                <x-form.error for="selectedSubcategory" />
                            </div>
                        </div>

                    </div>
                </div>          
            </div>
        @endif

            {{-- rate --}}
        @if ($currentStep == 4)
            <div class="justify-content-center">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="wpk_process" style="background-color: #abf5b8">
                       
                        <div class="wpk_caption">
                            <h4>Let setup your hourly rate</h4>
                            <p3>
                                Clients will see this rate on your profile and in search results 
                                <br>
                                once you publish your profile. You can adjust your rate every time you submit a proposal
                            </p3>
                        </div>

                        <div class="form-row mt-4"> 
                            <div class="form-group col-md-12">
                                <div class="d-flex justify-content-center align-items-center">
                                    <x-form.input id="rate" class="block mt-3" type="number" style="width: 50%" wire:model.debounce.500ms="rate" :value="old('rate')" placeholder="{{ trans('global.naira') }}" autofocus />
                                     <span class="ml-2" style="font-weight:bold; font-size:1.5em; color:#1e852f">/hr</span>
                                </div>
                                <x-form.error for="rate" />

                                <div class="wpk_caption mt-5">
                                    <h4>
                                        {{ application('name') }} Fee 
                                        <span style="margin-left: 10px">
                                            <a href="#" style=" color:#1e852f">Explain this</a>
                                        </span> 
                                    </h4>
                                    <p>
                                        Clients will see this rate on your profile and in search results 
                                        <br>
                                        once you publish your profile. You can adjust your rate every time you submit a proposal
                                    </p>

                                    <div class="d-flex justify-content-center align-items-center">
                                        <x-form.input id="colonyPrice" class="block mt-3" type="text" style="width: 60%" wire:model="colonyPrice" disabled placeholder="{{ trans('global.naira') }}" autofocus />
                                         <span class="ml-2" style="font-weight:bold; font-size:1.0em; color:#1e852f">/hr</span>
                                    </div>
                                </div>

                            </div>                            
                        </div>
                    </div>
                </div>          
            </div>
        @endif

        @if ($currentStep == 5)
            <div class="justify-content-center">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="wpk_process" style="background-color: #abf5b8">
                       
                        <div class="wpk_thumb">
                            <div class="wpk_thumb_figure">
                                <img src="{{ asset('img/account-cl.svg') }}" class="img-fluid" alt="" />
                            </div>
                        </div>
                        <div class="wpk_caption">
                            <h4>Almost there!</h4>
                            <p>
                                You are about to submit your data, please go through and make necessary corrections where needed.
                                <br>
                                After submitting, you can go to your profile to update your information
                                <br>
                                Thank you for taking your time through the process.
                                <br>
                                Team {{ application('name') }}. 
                            </p>
                        </div>
                    </div>
                </div>          
            </div>
        @endif

        <div class="d-flex justify-content-between">
            @if ($currentStep == 1)
                <div></div>
            @endif

            @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4 || $currentStep == 5)
                <x-buttons.default wire:click='decrementStep()' type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Previous</x-buttons.default>
            @endif

            @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                <x-buttons.default wire:click='incrementStep()' type="button" class="text-white border-radius-50">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></x-buttons.default>
            @endif

            @if ($currentStep == 5)
                <x-buttons.default type="submit"><i class="fa fa-save" aria-hidden="true"></i> Submit</x-buttons.default>
            @endif
        </div>
    </form>

    
</div>
    
    @push('scripts')
        <script>
            $('.select2').select2({
                theme: 'bootstrap4'
            });
            $('.select2').on('change', function() {
                @this.set('language', $(this).val());
            });
        </script>

<script>
    $('#first').click(function(){
        $('#freelancerImage').trigger('click');
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
</div> 