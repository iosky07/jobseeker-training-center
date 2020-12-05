<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Jobseeker Premium') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">User</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.user-premium.index') }}">Data User</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="user-premium" :model="$user" />
    </div>
</x-app-layout>
