<div>
    <div class="row mx-3">
        <div class="form-group col-sm-12 col-lg-3 mx-sm-3 mb-2">
            <div class="input-with-icon">
                <input wire:model.debounce.350ms="searchWord" type="search" class="form-control" placeholder="search title">
                <i class="ti-search"></i>
            </div>
        </div>
        <div class="form-group col-sm-12 col-lg-3 mx-sm-3 mb-2">
            <select class="form-control" wire:model="cat">
              <option value="">All Categories</option>
              @foreach($Categories as $id => $Category)
                <option value="{{ $id }}">{{ $Category }}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group col-sm-12 col-lg-3 mx-sm-3 mb-2">
            <select class="form-control" wire:model="SubCat">
              <option value="">All Sub Categories</option>
              @foreach($SubCategories as $id => $Category)
                <option value="{{ $id }}">{{ $Category }}</option>
              @endforeach
            </select>
        </div>

    </div>
    
    <div class="row">
        <div class="{{ !$viewFreelancer ? 'col-lg-12 col-md-12' : 'col-lg-8 col-md-8' }}">

            @if($selectedRows)
                <div class="d-flex justify-content-center align-items-center">
                    <button wire:click.prevent="acceptAll" class="btn btn-theme btn-sm">Accept all</button>
                    <button wire:click.prevent="rejectAll" class="btn btn-warning btn-sm">Reject all</button>
                    <button wire:click.prevent="deleteAll" class="btn btn-danger btn-sm">Delete All</button>
                </div>
            @endif

            <div class="dashboard_property">
                <div class="table-responsive">
                    <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="m2_hide">
                                        <input wire:model="selectPageRows" type="checkbox" class="" name="todo2"
                                        id="todoCheck2">
                                    </th>
                                    <th scope="col">User</th>
                                    <th scope="col" class="m2_hide">Views</th>
                                    <th scope="col" class="m2_hide">Created At</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                        
                        <tbody>
                            @forelse ($freelancers as $freelancer)
                                <tr>
                                    <td class="m2_hide">
                                        <input wire:model="selectedRows" type="checkbox" value="{{ $freelancer->id() }}"
                                        name="todo2" id="{{ $freelancer->id() }}">
                                    </td>
                                    <td>
                                        {{ $freelancer->user()->name() }}
                                    </td>
                                   
                                    <td class="m2_hide">
                                        <x-views :model="$freelancer"/>
                                    </td>
                                    <td class="m2_hide">
                                        <div class="_leads_posted"><h5>{{ $freelancer->createdDate }}</h5></div>
                                    </td>
                                    <td>
                                        <div class="_leads_status">
                                            @if ($freelancer->isVerified == true)
                                                <span class="active">
                                                    {{ $freelancer->verify_badge }}
                                                </span>
                                            @else
                                                <span class="expire">
                                                    {{ $freelancer->verify_badge }}
                                                </span>
                                            @endif
                                            
                                        </div>
                                    </td>
                                    <td>
                                        <div class="_leads_action">
                                            <x-buttons.default wire:click='viewFreelancer({{ $freelancer->id() }})'>
                                                View Freelancer
                                            </x-buttons.default>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <div class="text-center m-4">
                                    <p>No freelancers available</p>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{ $freelancers->links() }}
        </div>
        @if ($viewFreelancer)
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="float-right">
                            <x-buttons.default wire:click="resetAll">
                                <i class="fas fa-times text-white"></i>
                            </x-buttons.default>
                        </div>  
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12 ">
                        <x-form.label class="m-0 p-0" style="font-size: medium ;font-weight: bold" for="verfication" value="{{ __('Update Status') }}" />
                        <select wire:change="verfication({{ $viewFreelancer }}, $event.target.value)" class="form-control">
                            <option value="1" @if($viewFreelancer->isVerified == 1) selected @endif>Verified</option>
                            <option value="0" @if($viewFreelancer->isVerified == 0) selected @endif>Unverified</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 mb-1">
                        <x-form.label for="title" value="{{ __('Title') }}" />
                        <x-form.input value="{{ $viewFreelancer->title }}" class="block mt-3" type="text" disabled />
                    </div>

                    <div class="col-sm-12 mb-1">
                        <x-form.label for="rate" value="{{ __('Rate') }}" />
                        <x-form.input value="{{ $viewFreelancer->rate }}" class="block mt-3" type="text" disabled />
                    </div>

                    <div class="col-sm-12 mb-1">
                        <x-form.label for="telephone" value="{{ __('Telephone') }}" />
                        <x-form.input value="{{ $viewFreelancer->telephone }}" class="block mt-3" type="text" disabled />
                    </div>

                    <div class="col-sm-12 mb-1">
                        <x-form.label for="address" value="{{ __('Address') }}" />
                        <x-form.input value="{{ $viewFreelancer->address }}" class="block mt-3" type="text" disabled />
                    </div>

                    <div class="col-sm-12 mb-1">
                        <x-form.label for="city" value="{{ __('City') }}" />
                        <x-form.input value="{{ $viewFreelancer->city }}" class="block mt-3" type="text" disabled />
                    </div>

                    <div class="col-sm-12 mb-1">
                        <x-form.label for="" value="{{ __('Category') }}" />
                        <select class="form-control" disabled>
                            @foreach ($Categories as $id => $Category)
                                <option value="1" @if($id == $viewFreelancer->branch_id) selected @endif>{{ $Category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-12 mb-1">
                        <x-form.label for="subcategory" value="{{ __('Sub Category') }}" />
                        <select class="form-control" disabled>
                            @foreach ($SubCategories as $id => $Category)
                                <option value="1" @if($id == $viewFreelancer->sub_branch_id) selected @endif>{{ $Category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-12 mb-1">
                        <textarea class="form-control h-120" disabled>{{ $viewFreelancer->description }}</textarea>
                    </div>
                    
                </div>
            </div>
        @endif
    </div>
</div>
