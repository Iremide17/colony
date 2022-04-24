<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Freelancer Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your freelancer account\'s profile information.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="telephone" value="{{ __('Telephone') }}" />
            <x-jet-input id="telephone" type="text" class="mt-1 block w-full" wire:model.defer="agent.telephone" autocomplete="telephone" />
            <x-jet-input-error for="telephone" class="mt-2" />
        </div>
        
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address" value="{{ __('Address') }}" />
            <x-jet-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="agent.address" autocomplete="address" />
            <x-jet-input-error for="address" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
