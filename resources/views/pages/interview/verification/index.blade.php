<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Verifikasi Interview') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Interview</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.interview-verification.index') }}">Verifikasi Interview</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="interview-verification" :model="$interview" />
    </div>
</x-app-layout>
