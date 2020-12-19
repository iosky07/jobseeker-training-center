<div>
    <x-data-table :data="$data" :model="$score">
        <x-slot name="head">
            <tr>
{{--                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">--}}
{{--                    ID--}}
{{--                    @include('components.sort-icon', ['field' => 'id'])--}}
{{--                </a></th>--}}
                <th><a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                    ID User
                    @include('components.sort-icon', ['field' => 'user_id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('category')" role="button" href="#">
                    Kategori Soal
                    @include('components.sort-icon', ['field' => 'category'])
                </a></th>
                <th><a wire:click.prevent="sortBy('score')" role="button" href="#">
                    Nilai Ujian
                    @include('components.sort-icon', ['field' => 'score'])
                </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Tanggal Pengerjaan
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>
                <th><a wire:click.prevent="sortBy('status')" role="button" href="#">
                    Status
                    @include('components.sort-icon', ['field' => 'status'])
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($score as $s)
                <tr x-data="window.__controller.dataTableController({{ $s->id }})">
{{--                    <td>{{ $s->id }}</td>--}}
                    <td>{{ $s->user_id }}</td>
                    <td>{{ $s->category }}</td>
                    <td>{{ $s->score }}</td>
                    <td>{{ $s->created_at->format('d M Y H:i') }}</td>
                    @if($s->status == "Lulus")
                        <td class="bg-success text-light">{{ $s->status }}</td>
                    @endif
                    @if($s->status == "Tidak Lulus")
                        <td class="bg-danger text-light">{{ $s->status }}</td>
                    @endif
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
