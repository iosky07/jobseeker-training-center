<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Lihat Soal') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">User</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.question-detail.index') }}">Lihat Soal</a></div>
        </div>
        </div>
        <div class="section-body">
{{--            @foreach($datas as $data)--}}
{{--                <div class="form-group col-span-6 sm:col-span-5">--}}
{{--                    Pertanyaan : {{$data->question}}<br>--}}
{{--                    Kunci : {{$data->key}}--}}
{{--                </div>--}}
{{--            @endforeach--}}
            {{--        <livewire:create-user action="showUser" :userId="request()->user" />--}}
        </div>
    </x-slot>

</x-app-layout>
