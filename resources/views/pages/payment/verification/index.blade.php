<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Verifikasi Pembayaran') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Pembayaran</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.payment-verification.index') }}">Verifikasi Pembayaran</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="payment-verification" :model="$payment" />
    </div>
</x-app-layout>
