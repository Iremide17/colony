<div>
    <div class="row mb-4 p-2">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div class="col-md-2">
                    <label for="my-select">Type
                        @if($type != null) <a wire:click="clearSearchTypeFilter">
                            <i class="fa fa-times text-red-500 text-sm ml-2 cursor-pointer" aria-hidden="true">clear</i></a> @endif
                    </label>
                    <select id="my-select" class="form-control" wire:model="type">
                        <option>Select Option</option>
                        <option value="1">Super Admin</option>
                        <option value="2">Admin</option>
                        <option value="3">Agent</option>
                        <option value="4">Freelancer</option>
                        <option value="5">User</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="my-select">Search
                        @if($searchTerm != null) <a wire:click="clearSearchTermFilter">
                            <i class="fa fa-times text-red-500 text-sm ml-2 cursor-pointer" aria-hidden="true">clear</i></a> @endif
                    </label>
                    <input type="search" class="form-control w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" wire:model.debounce.350ms="searchTerm" placeholder="Enter name..." list="data">

                    <datalist id="data">
                        @foreach($users as $key => $user)
                        <option value="{{ $user->name}}">{{ $user->name}}</option>
                        @endforeach
                    </datalist>
                </div>

                <div class="col-md-2">
                    <label for="my-select">Sort By</label>
                    <select id="my-select" class="form-control" wire:model="sortBy">
                        <option value="asc">ASC</option>
                        <option value="desc">DESC</option>

                    </select>
                </div>

                <div class="col-md-2">
                    <label for="my-select">Per Page</label>
                    <select id="my-select" class="form-control" wire:model="per_page">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>
                </div>
                <div class="col-md-4">
                    @if ($selectedRows)
                    <label for="my-select">Action</label>
                    <br>

                    <div class="rounded text-gray-50 btn-group">
                        <button type="button" class="text-gray-50 btn btn-success p-2">Bulk Actions</button>
                        <button type="button" class="btn btn-success dropdown-toggle dropdown-icon p-2" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu" style="">
                            <a wire:click.prevent="deleteSelectedRows" class="dropdown-item" href="#"> <i class="text-red-600 fa fa-trash" aria-hidden="true"></i> Delete Selected</a>
                            <a wire:click.prevent="markAllAsSuperAdmin" class="dropdown-item" href="#"><i class="text-amber-600 fa fa-check" aria-hidden="true"></i> Set all as Super Admin</a>
                            <a wire:click.prevent="markAllAsAdmin" class="dropdown-item" href="#"><i class="text-green-600 fa fa-check" aria-hidden="true"></i> Set all as Admin</a>
                            <a wire:click.prevent="markAllAsAgent" class="dropdown-item" href="#"><i class="text-purple-600 fa fa-check" aria-hidden="true"></i> Set all as Agent</a>
                            <a wire:click.prevent="markAllAsFreelancer" class="dropdown-item" href="#"><i class="text-blue-600 fa fa-check" aria-hidden="true"></i> Set all as Freelancer</a>
                        </div>
                    </div>

                    <span class="ml-1"> {{ count($selectedRows) }}
                        {{ Illuminate\Support\Str::plural('User', count($selectedRows)) }} Selected
                    </span>

                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">

            <div class="dashboard_property">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <div class="ml-2 icheck-primary d-inline">
                                        <input wire:model="selectPageRows" type="checkbox" value="" name="todo2" id="todoCheck2">
                                        <label for="todoCheck2"></label>
                                    </div>
                                </th>
                                <th></th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Date Created</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($users as $key => $user)
                            <tr>
                                <td>
                                    <div class="ml-2 icheck-primary d-inline">
                                        <input wire:model="selectedRows" type="checkbox" value="{{ $user->id() }}" name="todo2" id="{{ $user->id() }}">
                                        <label for="{{ $user->id() }}"></label>
                                    </div>
                                </td>
                                <td>{{ $key+1 }}</td>
                                <td><img src="{{ asset('storage/'.$user->profile_photo_path) }}" class="avatar avatar-30 mr-2" alt="{{ $user->name() }}"></td>
                                <td>{{ $user->name() }}</td>
                                <td>
                                    <div class="px-2 py-1 text-center text-gray-700 bg-green-200 rounded">
                                        <select wire:change="changeUser({{$user}}, $event.target.value)" class="form-control w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                            <option value="1" @if($user->type() === 1) selected @endif>Super Administrator</option>
                                            <option value="2" @if($user->type() === 2) selected @endif>Admin</option>
                                            <option value="3" @if($user->type() === 3) selected @endif>Agent</option>
                                            <option value="4" @if($user->type() === 4) selected @endif>Freelancer</option>
                                            <option value="5" @if($user->type() === 5) selected @endif>User</option>
                                        </select>
                                    </div>
                                </td>
                                <td>{{ $user->email() }}</td>
                                <td>{{ $user->joinedDate() }}</td>
                            </tr>
                            @empty
                            <div class="text-center m-4">
                                <p>No user available</p>
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{ $users->links('pagination-link') }}
        </div>
    </div>
</div>
