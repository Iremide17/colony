<div class="row">
    <div class="col-md-12">
        <button wire:click="raiseTicket" type="button"class="btn btn-theme">Raise a Ticket</button>
        <div class="modal fade" id="ticket_modal" tabindex="-1" role="dialog"
            aria-labelledby="authomessage" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered login-pop-form"
                role="document">
                <div class="modal-content" id="authomessage">
                    <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i
                            class="ti-close"></i></span>
                    <div class="modal-body">
                        <h4 class="modal-header-title">Raise an issue</h4>
                        <div class="login-form">
                            <form action="{{ route('ticket.store') }}" method="POST">
                                @csrf

                                <input type="hidden" name="booking" value="{{ $booking->id()}}">

                                <div class="form-group col-lg-12 col-md-12">
                                    <x-form.label for="title" value="{{ __('Title') }}" />
                                    <x-form.input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')" autofocus />
                                    <x-form.error for="title" />
                                </div>

                                <div class="form-group col-lg-12 col-md-12">
                                    <x-form.label for="category" value="{{ __('Category') }}"/>
                                    <select id="category" name="category" class="form-control" value="{{old('category')}}">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-form.error for="category" />
                                </div>

                                 <div class="form-group col-lg-12 col-md-12">
                                    <x-form.label for="priority" value="{{ __('Priority') }}"/>
                                    <select id="priority" name="priority" class="form-control" value="{{old('priority')}}">
                                        <option value="">Select Priority</option>
                                        @foreach ($priorities as $priority)
                                            <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-form.error for="priority" />
                                </div>
                               
                                <div class="form-group col-lg-12 col-md-12">
                                    <textarea name='message' class="form-control h-120" placeholder="Type your message here..."></textarea>
                                    <x-form.error for="message" />
                                </div>
                                
                                <div class="form-group col-lg-12 col-md-12">
                                    <button class="btn btn-theme" type="submit">Open Ticket</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>