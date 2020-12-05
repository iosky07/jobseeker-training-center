<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Jadwal Test') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Jadwal</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.test.index') }}">Jadwal Test</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="test" :model="$test" />
    </div>
</x-app-layout>
