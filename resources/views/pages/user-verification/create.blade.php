<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Upload Bukti Pembayaran') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">User</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.user-choosen.create') }}">Upload Bukti Pembayaran</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:user-verification-form action="create" />
    </div>
</x-app-layout>
