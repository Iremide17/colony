<x-app-layout>
    <x-slot name="header">
		<div class="breadcrumbs-wrap">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">Ticket - ({{$ticket->ticket_id}})</li>
			</ol>
			<h2 class="breadcrumb-title">Hello {{ auth()->user()->name() }}, This is {{ application('name')}} ({{ application('alias')}})...</h2>
		</div>
	</x-slot>

    <div class="dashboard-body">                    
       
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h4>Ticket ID : 
                    <span class="pc-title theme-cl">
                        {{ $ticket->ticket_id }}
                    </span>
                </h4>
            </div>
        </div>

        <div class="card">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card-body p-0">
                        <div class="dashboard_property">
                            <div class="container">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" value="{{ $ticket->title }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Message</label>
                                    <textarea class="form-control" rows="2" id="message"
                                        readonly>{{ $ticket->message }}</textarea>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label for="category">Status</label>
                                        <input type="text" class="form-control" id="status"
                                            value="{{ $ticket->status }}" readonly>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="category">Date Opened</label>
                                        <input type="text" class="form-control" id="opened"
                                            value="{{ $ticket->created_at->format('F d, Y H:i') }}" readonly>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="category">Date Closed</label>
                                        <input type="text" class="form-control" id="closed"
                                            value="{{ $ticket->updated_at->format('F d, Y H:i') }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="category">Ticket Duration</label>
                                        <input type="text" class="form-control" id="closed"
                                            value="{{ $ticket->created_at->diffInHours($ticket->updated_at) }} hour(s)"
                                            readonly>
                                    </div>
                                </div>

                                @admin
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="category">Ticket By</label>
                                        <input type="text" class="form-control" id="closed"
                                            value="{{ ucfirst($ticket->user->name) }} " readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="category">Ticket Visibility</label>
                                        <input type="text" class="form-control" id="closed"
                                            value="{{ ucfirst($ticket->visibility) }} " readonly>
                                    </div>
                                </div>
                                <br>
                                <br>
                                @if($ticket->visibility == "private")
                                <div style="float:right">
                                    <form action="{{ url('admin/public_ticket/' . $ticket->ticket_id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-md"
                                            style="font-weight:bold">Make
                                            Ticket Public</button>
                                    </form>
                                </div>
                                @else
                                <div style="float:right">
                                    <form action="{{ url('admin/private_ticket/' . $ticket->ticket_id) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-md"
                                            style="background:#2737A6;color:white;font-weight:bold;">Make Ticket
                                            Private</button>
                                    </form>
                                </div>
                                @endif
                                @endadmin
                                <br>
                                <br>

                                <x-comments :ticket="$ticket" />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
                    
    </div>

</x-app-layout>
