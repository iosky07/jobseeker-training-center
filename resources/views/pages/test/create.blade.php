<x-app-layout>
<x-slot name="header_content">
        <h1>{{ __('Buat Jadwal Tes Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Jadwal Tes</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.test.index') }}">Buat Jadwal Tes Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:test-form action="create" />
    </div>
</x-app-layout>
