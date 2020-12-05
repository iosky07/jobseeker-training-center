<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Pembayaran') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Pembayaran</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.payment.index') }}">Pembayaran</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="payment" :model="$payment" />
    </div>
</x-app-layout>
