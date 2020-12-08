<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Info Loker') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Info Loker</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.job-info.index') }}">Lihat Info Loker</a></div>
        </div>
        </div>

{{--        @foreach($jobs as $data)--}}
    {{--            <div class="form-group col-span-6 sm:col-span-5">--}}
    {{--                ID : {{$data->id}}<br>--}}
    {{--                Nama Perusahaan : {{$data->company}}<br>--}}
    {{--                Deadline : {{$data->deadline}}<br>--}}
    {{--                Detail Info : {{$data->detail_info}}<br>--}}
    {{--                Info Link Pendaftaran : {{$data->link_info}}<br>--}}
    {{--            </div>--}}
{{--        @endforeach--}}
        <div class="section-body">
            <h2 class="section-title"> {{$job->company}}</h2>
{{--            <p class="section-lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--}}
            <div class="card">
                <div class="card-header" >
                    <h4 class="col-lg-6">Detail Info</h4><h5 class="col-lg-6 text-danger text-right">Deadline : {{$job->deadline}}</h5>
                </div>
                <div class="card-body">
                    <p>{!! $job->detail_info !!}</p>
                </div>
                <div class="card-footer bg-whitesmoke">
                    Kunjungi situs : <a href="{{$job->link_info}}" target="_blank">{{$job->link_info}}</a>
                </div>
            </div>
        </div>
    </x-slot>

</x-app-layout>
