<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit HRD') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">User</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.user-hrd.index') }}">Edit HRD</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:user-hrd-form action="update" :userId="request()->user" />
    </div>
</x-app-layout>
