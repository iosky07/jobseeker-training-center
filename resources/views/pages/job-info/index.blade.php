<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Info Loker') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Info Loker</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.job-info.index') }}">Data Info Loker</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="job-info" :model="$job" />
    </div>
</x-app-layout>
