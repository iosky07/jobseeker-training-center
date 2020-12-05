<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Artikel') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Artikel</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.job-info.index') }}">Data Artikel</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="job-info" :model="$job" />
    </div>
</x-app-layout>
