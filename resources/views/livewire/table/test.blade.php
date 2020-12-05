<div>
    <x-data-table :data="$data" :model="$tests">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
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
                    <td>{{ $test->id }}</td>
                    <td>{{ $test->title }}</td>
                    <td>{{ $test->category }}</td>
                    <td>{{ $test->time_limit }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        @if(Auth::user()->role==1)
                        <a role="button" href="{{ route('admin.test.edit', $test->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" href="{{ route('admin.test.show', $test->id) }}" class="mr-3"><i class="fa fa-16px fa-eye"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
