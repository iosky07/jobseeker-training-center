<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Info Loker') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">User</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.job-info.index') }}">Buat Info Loker</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:job-info-form action="create" />
    </div>
</x-app-layout>
