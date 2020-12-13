<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Pembayaran Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Pembayaran</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.payment.create') }}">Buat Pembayaran Baru</a></div>
        </div>
    </x-slot>

    <div>
        <div class="card">
            <div class="card-header bg-whitesmoke" >
                <h4 class="col-lg-6">List Nomer Rekening</h4>
            </div>
            <div class="card-body">
                <b>
                    <div class="row">
                        <div class="col-md-1">BRI</div>
                        <div class="">:</div>
                        <div class="col-md-2">034-101-000-XXX</div>
                        <div class="col-md-2">(A.n Yoski Tanjung)</div>
                        <div class="w-100" style="margin-bottom: 15px"></div>
                        <div class="col-md-1">BCA</div>
                        <div class="">:</div>
                        <div class="col-md-2">731-025-XXXX</div>
                        <div class="col-md-2">(A.n Yoski Tanjung)</div>
                        <div class="w-100" style="margin-bottom: 15px"></div>
                        <div class="col-md-1">MANDIRI</div>
                        <div class="">:</div>
                        <div class="col-md-2">0700-000-899-XXX</div>
                        <div class="col-md-2">(A.n Yoski Tanjung)</div>
                        <div class="w-100" style="margin-bottom: 15px"></div>
                    </div>
                </b>
            </div>
        </div>
        <livewire:payment-form action="create" />
    </div>
</x-app-layout>
