<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Artikel') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Artikel</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.job-info.index') }}">Lihat Artikel</a></div>
        </div>
        </div>
        <div class="section-body">
            @foreach($jobs as $data)
                <div class="form-group col-span-6 sm:col-span-5">
{{--                    ID : {{$data->id}}<br>--}}
                    Nama Perusahaan : {{$data->company}}<br>
                    Deadline : {{$data->deadline}}<br>
                    Detail Info : {{$data->detail_info}}<br>
                    Info Link Pendaftaran : {{$data->link_info}}<br>
                </div>
            @endforeach
        </div>
    </x-slot>

</x-app-layout>
