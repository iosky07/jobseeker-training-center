<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Lihat Jadwal Interview') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Interview</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.question-detail.index') }}">Lihat Interview</a></div>
        </div>
    </x-slot>
    <div class="section-body">
{{--        <h2 class="section-title"></h2>--}}
        <div class="card">
            <div class="card-header bg-whitesmoke" >
                 <h4 class="col-lg-6">Detail Hasil Interview</h4>
            </div>
            <div class="card-body">
                <b>
                    <div class="row">
                        <div class="col-md-2">ID User</div>
                        <div class="">:</div>
                        <div class="col-md-1">{{$interview->user_id}}</div>
                        <div class="w-100" style="margin-bottom: 15px"></div>
                        <div class="col-md-2">Nama</div>
                        <div class="">:</div>
                        <div class="col-md-1">{{$interview->name}}</div>
                        <div class="w-100" style="margin-bottom: 15px"></div>
                        <div class="col-md-2">Jam Tes</div>
                        <div class="">:</div>
                        <div class="col-md-1">{{$interview->time}}</div>
                        <div class="w-100" style="margin-bottom: 15px"></div>
                        <div class="col-md-2">Tanggal Tes</div>
                        <div class="">:</div>
                        <div class="col-md-2">{{$interview->date}}</div>
                        <div class="w-100" style="margin-bottom: 15px"></div>
                        <div class="col-md-2">Karakter</div>
                        <div class="">:</div>
                        <div class="col-md-8">{!!$interview->character!!}</div>
                        <div class="w-100" style="margin-bottom: 15px"></div>
                        <div class="col-md-2">Minat/Bakat</div>
                        <div class="">:</div>
                        <div class="col-md-8">{!!$interview->talent!!}</div>
                        <div class="w-100" style="margin-bottom: 15px"></div>
                        <div class="col-md-2">Kelebihan</div>
                        <div class="">:</div>
                        <div class="col-md-8">{!!$interview->advantage!!}</div>
                        <div class="w-100" style="margin-bottom: 15px"></div>
                        <div class="col-md-2">Kekurangan</div>
                        <div class="">:</div>
                        <div class="col-md-8">{!!$interview->weakness!!}</div>
                        <div class="w-100" style="margin-bottom: 15px"></div>
                        <div class="col-md-2">Saran</div>
                        <div class="">:</div>
                        <div class="col-md-8">{!!$interview->recommendation!!}</div>
                        <div class="w-100"></div>
                    </div>
                </b>
            </div>
            <div class="card-footer bg-whitesmoke">
                <div class="row">
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
