<div>
    <x-data-table :data="$data" :model="$questions">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
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
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->test_id }}</td>
                    <td>{{ $question->question }}</td>
                    <td>{{ $question->key }}</td>
                    <td>{{ $question->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.question-detail.edit', $question->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" href="{{ route('admin.question-detail.show', $question->id) }}" class="mr-3"><i class="fa fa-16px fa-eye"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
