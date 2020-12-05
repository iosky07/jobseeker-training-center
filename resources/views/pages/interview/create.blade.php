<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Jadwal Interview Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Jadwal Interview</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.interview.index') }}">Buat Jadwal Interview Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:interview-form action="create" :dataId="request()->interview"/>
    </div>
</x-app-layout>
