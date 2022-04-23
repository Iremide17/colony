<div class="col-lg-4 col-md-12 col-sm-12">
    <div class="page-sidebar p-0">
        <a class="filter_links" data-toggle="collapse" href="#fltbox" role="button" aria-expanded="false" aria-controls="fltbox">Open Advance Filter<i class="fa fa-sliders-h ml-2"></i></a>							
        <div class="collapse" id="fltbox">

            <!-- Find New Property -->
            <div class="sidebar-widgets p-4">
                
                <div class="form-group">
                    <div class="input-with-icon">
                        <input wire:model.debounce.350ms="search" type="search" class="form-control" placeholder="Title | City | State | Address">
                        <i class="ti-search"></i>
                    </div>
                </div>

                <div class="form-group">
                    <div class="simple-input">
                        <select wire:model="category" id="category" class="form-control">
                            <option value="">Category</option>
                            @foreach ($categories as $key => $category)
                                    <option value="{{ $key }}">{{ $category }}</option>  
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="simple-input">
                        <select wire:model="type" id="type" class="form-control">
                            <option value="">Type</option>
                            @foreach ($types as $key => $type)
                                <option value="{{ $key }}">{{ $type }}</option>  
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <select id="my-select" class="form-control" wire:model="purpose">
                        <option value="">Purpose</option>
                        <option value="for-rent">For Rent</option>
                        <option value="for-sale">For Sale</option>
                    </select>
                </div>
                                
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 pt-4">
                        <h6>Advance Features</h6>
                        <ul class="row p-0 m-0">
                            <li class="col-lg-6 col-md-6 p-0">
                                <input id="airCondition" class="checkbox-custom" wire:model="airCondition" type="checkbox">
                                <label for="airCondition" class="checkbox-custom-label">Air Condition</label>
                            </li>
                            <li class="col-lg-6 col-md-6 p-0">
                                <input id="swimming" class="checkbox-custom" wire:model="swimming" type="checkbox">
                                <label for="swimming" class="checkbox-custom-label">Swimming Pool</label>
                            </li>
                            <li class="col-lg-6 col-md-6 p-0">
                                <input id="tiled" class="checkbox-custom" wire:model="tiled" type="checkbox">
                                <label for="tiled" class="checkbox-custom-label">Tiled</label>
                            </li>
                            <li class="col-lg-6 col-md-6 p-0">
                                <input id="tapped" class="checkbox-custom" wire:model="tapped" type="checkbox">
                                <label for="tapped" class="checkbox-custom-label">Tap Water</label>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 pt-4">
                        <x-buttons.default class="float-right" wire:click="resetFilter">Clear Search</x-buttons.default>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
    <!-- Sidebar End -->

</div>