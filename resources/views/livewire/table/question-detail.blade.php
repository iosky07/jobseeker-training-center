<div>
    <x-data-table :data="$data" :model="$questions">
        <x-slot name="head">
            <tr>
{{--                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">--}}
{{--                    ID--}}
{{--                    @include('components.sort-icon', ['field' => 'id'])--}}
{{--                </a></th>--}}
                <th><a wire:click.prevent="sortBy('test_id')" role="button" href="#">
                    ID Tes
                    @include('components.sort-icon', ['field' => 'test_id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('question')" role="button" href="#">
                    Pertanyaan
                    @include('components.sort-icon', ['field' => 'question-detail'])
                </a></th>
                <th><a wire:click.prevent="sortBy('key')" role="button" href="#">
                    Kunci
                    @include('components.sort-icon', ['field' => 'key'])
                </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Tanggal Dibuat
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($questions as $question)
                <tr x-data="window.__controller.dataTableController({{ $question->id }})">
{{--                    <td>{{ $question->id }}</td>--}}
                    <td>{{ $question->test_id }}</td>
                    <td>{{ $question->question }}</td>
                    <td>{{ $question->key }}</td>
                    <td>{{ $question->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a href="{{ route('admin.question-detail.show', $question->id) }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-eye"></i> Lihat</a>
                        <a href="{{ route('admin.question-detail.edit', $question->id) }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-edit"></i> Edit</a>
                        <a href="#" x-on:click.prevent="deleteItem" class="btn btn-icon icon-left btn-danger"><i class="fa fa-16px fa-trash"></i> Hapus</a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
