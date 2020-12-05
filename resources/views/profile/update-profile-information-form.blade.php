<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profil jobseeker') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ini adalah form update profil') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Namamu') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
{{--        @if(Auth::user()->role==4)--}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="nik" value="{{ __('NIK') }}" />
            <x-jet-input id="nik" type="text" class="mt-1 block w-full" wire:model.defer="state.nik" />
            <x-jet-input-error for="nik" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label value="{{ __('Jenis Kelamin') }}" />
            <select class="custom-select" name="jenis_kelamin" wire:model.defer="state.jenis_kelamin">
                <option value="Laki-laki" >Laki-laki</option>
                <option value="Perempuan" >Perempuan</option>
            </select>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="domisili" value="{{ __('Domisili') }}" />
            <x-jet-input id="domisili" type="text" class="mt-1 block w-full" wire:model.defer="state.domisili" />
            <x-jet-input-error for="domisili" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="nomor_hp" value="{{ __('Nomor HP') }}" />
            <x-jet-input id="nomor_hp" type="text" class="mt-1 block w-full" wire:model.defer="state.nomor_hp" />
            <x-jet-input-error for="nomor_hp" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label value="{{ __('Riwayat Pendidikan') }}" />
            <select class="custom-select" name="riwayat_pendidikan" wire:model.defer="state.riwayat_pendidikan">
                <option value="SMA/SMK" >SMA/SMK</option>
                <option value="D3" >D3</option>
                <option value="Sarjana" >Sarjana</option>
                <option value="Magister" >Magister</option>
                <option value="Lainnya" >Lainnya</option>
            </select>
        </div>

        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="email" value="{{ __('Quotes') }}" />
            <textarea name="quotes" id="quotes"  class="form-control" cols="30" rows="10" wire:model.defer="state.quotes">
            </textarea>
            <x-jet-input-error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
