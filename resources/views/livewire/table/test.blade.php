<div>
    <x-data-table :data="$data" :model="$tests">
        <x-slot name="head">
            <tr>
{{--                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">--}}
{{--                    ID--}}
{{--                    @include('components.sort-icon', ['field' => 'id'])--}}
{{--                </a></th>--}}
                <th><a wire:click.prevent="sortBy('title')" role="button" href="#">
                    Nama Tes
                    @include('components.sort-icon', ['field' => 'title'])
                </a></th>
                <th><a wire:click.prevent="sortBy('category')" role="button" href="#">
                    Kategori
                    @include('components.sort-icon', ['field' => 'category'])
                </a></th>
                <th><a wire:click.prevent="sortBy('time_limit')" role="button" href="#">
                    Batas Waktu
                    @include('components.sort-icon', ['field' => 'time_limit'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($tests as $test)
                <tr x-data="window.__controller.dataTableController({{ $test->id }})">
{{--                    <td>{{ $test->id }}</td>--}}
                    <td>{{ $test->title }}</td>
                    <td>{{ $test->category }}</td>
                    <td>{{ $test->time_limit }}</td>

                    <td class="whitespace-no-wrap row-action--icon">
                        @if(Auth::user()->role==1)
                            <a href="{{ route('admin.test.show', $test->id) }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-eye"></i> Lihat</a>
                            <a href="{{ route('admin.test.edit', $test->id) }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-edit"></i> Edit</a>
                            <a href="#" x-on:click.prevent="deleteItem" class="btn btn-icon icon-left btn-danger"><i class="fa fa-16px fa-trash"></i> Hapus</a>
                        @endif
                        @if(Auth::user()->role==3 or Auth::user()->role==4)
{{--                            @if()--}}
                            <a href="{{ route('admin.question-test.show', $test->id) }}" class="btn btn-icon icon-left btn-success"><i class="fa fa-pen"></i> Kerjakan Tes</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
