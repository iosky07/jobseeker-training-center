<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ini Forum') }}</h1>
    </x-slot>
        <div class="mx-3 my-3">

            <div class="row">
                <div class="col-md-6">
                    @livewire("chat-form")
                </div>
                <div class="col-md-6">
                    @livewire("chat-list")
                </div>
            </div>

        </div>
</x-app-layout>
