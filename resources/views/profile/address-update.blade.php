<x-form-section submit="updateAddress">
    <x-slot name="title">
        {{ __('Address Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your address details.') }}
    </x-slot>

    <x-slot name="form">
        <!-- City -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="city" value="{{ __('City') }}" />
            <x-input id="city" type="text" class="mt-1 block w-full" wire:model="state.city" required />
            <x-input-error for="city" class="mt-2" />
        </div>

        <!-- District -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="district" value="{{ __('District') }}" />
            <x-input id="district" type="text" class="mt-1 block w-full" wire:model="state.district" required />
            <x-input-error for="district" class="mt-2" />
        </div>

        <!-- Street -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="street" value="{{ __('Street') }}" />
            <x-input id="street" type="text" class="mt-1 block w-full" wire:model="state.street" required />
            <x-input-error for="street" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
