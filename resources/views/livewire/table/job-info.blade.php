<div>
    <x-data-table :data="$data" :model="$jobs">
        <x-slot name="head">
            <tr>
{{--                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">--}}
{{--                    ID--}}
{{--                    @include('components.sort-icon', ['field' => 'id'])--}}
{{--                </a></th>--}}
                <th><a wire:click.prevent="sortBy('company')" role="button" href="#">
                    Nama Perusahaan
                    @include('components.sort-icon', ['field' => 'company'])
                </a></th>
                <th><a wire:click.prevent="sortBy('deadline')" role="button" href="#">
                    Deadline
                    @include('components.sort-icon', ['field' => 'deadline'])
                </a></th>
                <th><a wire:click.prevent="sortBy('link_info')" role="button" href="#">
                    Info Loker(link)
                    @include('components.sort-icon', ['field' => 'link_info'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($jobs as $job)
                <tr x-data="window.__controller.dataTableController({{ $job->id }})">
{{--                    <td>{{ $job->id }}</td>--}}
                    <td>{{ $job->company }}</td>
                    <td>{{ $job->deadline }}</td>
                    <td>{{ $job->link_info }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a href="{{ route('admin.job-info.show', $job->id) }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-eye"></i> Lihat</a>
                        @if(Auth::user()->role==1)
                        <a href="{{ route('admin.job-info.edit', $job->id) }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-edit"></i> Edit</a>
                        <a href="#" x-on:click.prevent="deleteItem" class="btn btn-icon icon-left btn-danger"><i class="fa fa-16px fa-trash"></i> Hapus</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
