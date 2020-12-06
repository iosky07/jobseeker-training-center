<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Info Loker') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Info Loker</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.job-info.index') }}">Edit Info Loker</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:job-info-form action="update" :dataId="$id" />
    </div>
</x-app-layout>
