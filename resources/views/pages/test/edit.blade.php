<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Jadwal Test') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Jadwal Test</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.test.index') }}">Edit Jadwal Test</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:test-form action="update" :dataId="request()->test" />
    </div>
</x-app-layout>
