<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Jobseeker Regular') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">User</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.user-regular.index') }}">Data Regular</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="user-regular" :model="$user" />
    </div>
</x-app-layout>
