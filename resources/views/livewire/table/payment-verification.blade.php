<div>
    <x-data-table :data="$data" :model="$payments">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                    User ID
                   @include('components.sort-icon', ['field' => 'user_id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('user_name')" role="button" href="#">
                    Nama
                    @include('components.sort-icon', ['field' => 'user_name'])
                </a></th>
                <th><a wire:click.prevent="sortBy('bank')" role="button" href="#">
                    Bank
                    @include('components.sort-icon', ['field' => 'bank'])
                </a></th>
                <th><a wire:click.prevent="sortBy('thumbnail')" role="button" href="#">
                    Struk Bukti
                    @include('components.sort-icon', ['field' => 'thumbnail'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($payments as $payment)
                <tr x-data="window.__controller.dataTableController({{ $payment->id }})">
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->user_id }}</td>
                    <td>{{ $payment->user_name }}</td>
                    <td>{{ $payment->bank }}</td>
                    <td><img src="{{ asset('storage/payment/'.$payment->thumbnail) }}" alt="" style="max-height: 200px"></td>
{{--                    <td>{{ $payment->verification }}</td>--}}
                    {{--                    <td>{{ $payment->created_at->format('d M Y H:i') }}</td>--}}
                    <td class="whitespace-no-wrap row-action--icon">
{{--                        <a role="button" href="{{ route('admin.payment-verification.edit', $payment->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>--}}
                        <a role="button" x-on:click.prevent="verifyItem" class="btn btn-warning">Verifikasi</a>
                        <a role="button" x-on:click.prevent="deleteItem" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
