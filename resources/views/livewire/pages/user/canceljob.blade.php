<div class="px-2 py-1 text-xs text-gray-500 transition duration-100 rounded hover:bg-red-400">

    <a wire:click="confirmJobCancel" wire:loading.attr="disabled" class="cursor-pointer">
        <x-buttons.default><i class="fa fa-times" aria-hidden="true"></i> Cancel Job</x-buttons.default>
    </a>

    <x-jet-dialog-modal wire:model="confirmingJobCancel">
        <x-slot name="title">
            {{ __("Cancel Job") }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to cancel this Job?!, You will not be able to undo your action.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingJobCancel')" wire:loading.attr="disabled">
                {{ __("Cancel") }}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="cancelJob" wire:loading.attr="disabled">
                {{ __('Cancel Job') }}
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
</div>
