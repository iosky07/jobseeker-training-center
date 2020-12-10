<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Riwayat Skor') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Skor</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.question-score.index') }}">Detail Skor</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="score" :model="$score" />
    </div>
</x-app-layout>
