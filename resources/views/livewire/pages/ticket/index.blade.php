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
        <div class="row">
            <div class="{{ !$ticket_details ? 'col-lg-12 col-md-12' : 'col-lg-6 col-md-8' }}"
                title="Click to perform action"">
                <div class=" card-body p-0">
                    <div class="dashboard_property">
                        <div class="table-responsive">
                            <table class="table table-lg table-hover">

                                <thead class="thead-dark">
                                    <tr>
                                        <th></th>
                                        <th>Ticket ID</th>
                                        <th> Title</th>
                                        <th> Category</th>
                                        <th> Status</th>
                                        <th> Last Updated</th>
                                        <th> Action</th>
                                    </tr>
                                </thead>
                                @forelse ($tickets as $key => $ticket)
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
                                            @foreach ($categories as $category) @if ($category->id === $ticket->category_id)
                                            {{ $category->name }} @endif @endforeach
                                        </td>
                                        <td>
                                            @if ($ticket->status_id === 1)
                                            <span
                                                class="badge {{ $ticket->status->color }}">{{ $ticket->status->name }}</span>{{ $ticket->color }}
                                            @elseif($ticket->status_id === 2)
                                            <span
                                                class="badge {{ $ticket->status->color }}">{{ $ticket->status->name }}</span>{{ $ticket->color }}
                                            @endif
                                        </td>
                                        <td>{{ $ticket->updated_at }}</td>
                                        <td>
                                            <div class="_leads_action">
                                                <a wire:click.prevent="delete({{ $ticket->id() }})"><i
                                                        class="fas fa-trash"></i></a>
                                                <x-buttons.default wire:click="Ticket_details({{ $ticket->id() }})">Comment
                                                </x-buttons.default>
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
                <div class="col-lg-6 col-md-6">

                    <div class="row mt-3 ml-3 mr-3">
                        <div class="col-md-12">
                            <x-buttons.danger wire:click="resetAll" class="float-right">
                                <i class="fas fa-times text-danger"></i>
                            </x-buttons.danger>
                        </div>
                        
                    </div>
                    @if ($ticket_details->status_id == 1) 
                        <div class="messages-container margin-top-0">
                            <p class="text-center text-bold">{{ $ticket_details->message }}</p>
                            <div class="messages-container-inner">
                                <!-- Message Content -->
                                <div class="dash-msg-content">
                                    <x-comments :ticket="$ticket_details" />
                                
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
