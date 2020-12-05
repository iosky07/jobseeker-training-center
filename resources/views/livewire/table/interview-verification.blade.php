<div>
    <x-data-table :data="$data" :model="$interviews">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('tester_name')" role="button" href="#">
                        Nama HRD
                        @include('components.sort-icon', ['field' => 'tester_name'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('date')" role="button" href="#">
                        Tanggal
                        @include('components.sort-icon', ['field' => 'date'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('time')" role="button" href="#">
                        Jam
                        @include('components.sort-icon', ['field' => 'time'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('quota')" role="button" href="#">
                        Kuota
                        @include('components.sort-icon', ['field' => 'quota'])
                    </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($interviews as $interview)
                <tr x-data="window.__controller.dataTableController({{ $interview->id }})">
                    <td>{{ $interview->id }}</td>
                    <td>{{ $interview->tester_name }}</td>
                    <td>{{ $interview->date }}</td>
                    <td>{{ $interview->time }}</td>
                    <td>{{ $interview->quota }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" x-on:click.prevent="verifySchedule" class="btn btn-warning">Verifikasi</a>
                        <a role="button" x-on:click.prevent="deleteItem" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
