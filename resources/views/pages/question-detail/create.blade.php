<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Soal Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Soal</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.question-detail.index') }}">Buat Soal Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:question-detail-form action="create" :testId="$id" />
    </div>
</x-app-layout>
