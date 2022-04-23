<div class="space-y-6">
    
    <span class="block">
        {{ $ticket->comments()->count()}}
        {{ Illuminate\Support\Str::plural('Comment', count($ticket->comments())) }}
    </span>

    <section class="flex flex-col gap-4 p-2">
        <x-replies :comments="$ticket->comments()" :ticket="$ticket" />
    </section>

    {{-- Comment Form --}}
    <div class="">
        <form wire:submit.prevent='commentForm'>
            <x-form.textarea wire:model="body" name="body" placeholder="Leave a comment here...">
                {{ old('body') }}
            </x-form.textarea>
            <x-form.error for="body" />

            <x-buttons.default>
                Submit
            </x-buttons.default>
        </form>
    </div>

</div>
