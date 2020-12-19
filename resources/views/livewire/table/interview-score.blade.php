<div>
    <x-data-table :data="$data" :model="$interviews">
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
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Nama User
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th><a wire:click.prevent="sortBy('date')" role="button" href="#">
                    Tanggal Tes
                    @include('components.sort-icon', ['field' => 'date'])
                </a></th>
                <th><a wire:click.prevent="sortBy('time')" role="button" href="#">
                    Jam
                    @include('components.sort-icon', ['field' => 'time'])
                </a></th>
                    <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($interviews as $interview)
                <tr x-data="window.__controller.dataTableController({{ $interview->id }})">
{{--                    <td>{{ $interview->id }}</td>--}}
                    <td>{{ $interview->user_id }}</td>
                    <td>{{ $interview->name }}</td>
                    <td>{{ $interview->date }}</td>
                    <td>{{ $interview->time }}</td>
                        <td class="whitespace-no-wrap row-action--icon">
                    @if(Auth::user()->role==2)
{{--                            <a href="{{ route('admin.question-detail.show', $question->id) }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-eye"></i> Lihat</a>--}}
                            <a href="{{ route('admin.interview-score.edit', $interview->id) }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-edit"></i> Edit</a>
                    @endif
                        <a href="{{ route('admin.interview-score.show', $interview->id) }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-eye"></i> Lihat</a>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
