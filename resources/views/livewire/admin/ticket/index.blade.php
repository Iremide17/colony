<div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h4>Total ticket raised
                <span class="pc-title theme-cl">
                    {{ $tickets->count() }}
                </span>
            </h4>
        </div>
    </div>

    <div class="card">
        <div class="row m-3">
            <div class="form-group mx-sm-3 mb-2">
                <div class="input-with-icon">
                    <input wire:model.debounce.350ms="searchWord" type="search" class="form-control" placeholder="search title/message">
                    <i class="ti-search"></i>
                </div>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <select class="form-control" wire:model="status">
                  <option value="">All statuses</option>
                  @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <select class="form-control" wire:model="priority">
                  <option value="">All priorities</option>
                  @foreach($priorities as $priority)
                    <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <select class="form-control" wire:model="category">
                  <option value="">All categories</option>
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
            </div> 
        </div>
        <div class="row">
            <div class="{{ !$ticket_details ? 'col-lg-12 col-md-12' : 'col-lg-8 col-md-8' }}" title="Click to perform action"">
                <div class="card-body p-0">
                    <div class="dashboard_property">
                        <div class="table-responsive">
                            <table class="table table-lg table-hover">

                                <thead class="thead-dark">
                                    <tr>
                                        <th></th>
                                        <th> Ticket ID</th>
                                        <th> Title</th>
                                        <th> Status</th>
                                        <th> Priority</th>
                                        <th> Category</th>
                                        <th> User</th>
                                        <th> Last Updated</th>
                                        <th> Action</th>
                                    </tr>
                                </thead>
                                @forelse ($tickets as $key =>  $ticket)
                                    <tbody>

                                        <tr>
                                            <td>
                                                <p>({{ $key + 1 }}).</p>
                                            </td>
                                            <td>
                                                <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
                                                    {{ $ticket->ticket_id }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $ticket->title }}
                                            </td>
                                            <td>
                                                @if ($ticket->status_id === 1)
                                                        <span class="badge {{ $ticket->status->color }}">{{ $ticket->status->name }}</span>
                                                @elseif($ticket->status_id === 2)
                                                        <span class="badge {{ $ticket->status->color }}">{{ $ticket->status->name }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($ticket->priority_id === 1)
                                                        <span class="badge {{ $ticket->priority->color }}">{{ $ticket->priority->name }}</span>
                                                @elseif($ticket->priority_id === 2)
                                                        <span class="badge {{ $ticket->priority->color }}">{{ $ticket->priority->name }}</span>
                                                @elseif($ticket->priority_id === 3)
                                                    <span class="badge {{ $ticket->priority->color }}">{{ $ticket->priority->name }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $ticket->category->name }}
                                            </td>
                                            <td>
                                                {{ $ticket->user()->name() }}
                                            </td>
                                            <td>{{ $ticket->updated_at->diffForHumans() }}</td>
                                            <td>
                                                <div class="_leads_action">
                                                    <a  wire:click.prevent="delete({{ $ticket->id() }})"><i class="fas fa-trash"></i></a>
                                                    <x-buttons.default wire:click="Ticket_details({{ $ticket->id() }})">Comment</x-buttons.default>
                                                </div>
                                            </td>
                                            
                                        </tr>

                                    </tbody>
                                @empty
                                    <div class="text-center m-5">
                                        <p class="text-info">
                                            No tickets available
                                        </p>
                                    </div>
                                @endforelse


                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @if ($ticket_details)
                <div class="col-lg-4 col-md-4">

                    <div class="row ml-3 mr-3">
                        <div class="col-md-8">
                            <div class="form-group mx-sm-3 mb-2">
                                <select class="form-control" wire:change='updateTicket({{ $ticket_details }}, event.target.value)'>
                                  <option value="">Update Ticket</option>
                                  @foreach($statuses as $status)
                                    <option value="{{ $status->id }}" @if ($ticket_details->status_id == $status->id ) selected @endif>{{ $status->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <x-buttons.default wire:click="resetAll" class="float-right">
                                <i class="fas fa-times text-danger"></i>
                            </x-buttons.default>
                        </div>
                        
                    </div>
                    @if ($ticket_details->status_id == 1) 
                        <div class="messages-container margin-top-0">
                            <p class="text-center text-bold">{{ $ticket_details->message }}</p>
                            <div class="messages-container-inner">
                                <!-- Message Content -->
                                <div class="dash-msg-content">
                                    <x-comments :model="$ticket_details" />
                                
                                </div>

                            </div>

                        </div>
                    @else
                        <p class="text-center text-bold">Ticket Closed</p>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
