<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Soal') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Soal</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.question-detail.index') }}">Soal</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="question" :model="$question" />
    </div>
</x-app-layout>
