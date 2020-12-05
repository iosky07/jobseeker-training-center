<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Lihat HRD') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">User</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.user-hrd.index') }}">Lihat HRD</a></div>
        </div>
        </div>
        <div class="section-body">
            @foreach($users as $user)
                <div class="form-group col-span-6 sm:col-span-5">
                    ID : {{$user->id}}<br>
                    Nama : {{$user->name}}<br>
                    Email : {{$user->email}}<br>
                    Jenis Kelamin : {{$user->jenis_kelamin}}<br>
                    NIK : {{$user->nik}}<br>
                    Domisili : {{$user->domisili}}<br>
                    Nomor HP : {{$user->nomor_hp}}<br>
                    Riwayat Pendidikan : {{$user->riwayat_pendidikan}}<br>
                    Status : {{($user->role == 1 ? 'Admin' : ($user->role == 2 ? 'HRD' : ($user->role == 3 ? 'Premium' : ($user->role == 4 ? 'Non Premium' : 'Penyusup'))))}}
                </div>
            @endforeach
            {{--        <livewire:create-user action="showUser" :userId="request()->user" />--}}
        </div>
    </x-slot>

</x-app-layout>
