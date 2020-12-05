<div>
    <x-data-table :data="$data" :model="$jobs">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
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
                    <td>{{ $job->id }}</td>
                    <td>{{ $job->company }}</td>
                    <td>{{ $job->deadline }}</td>
                    <td>{{ $job->link_info }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.job-info.show', $job->id) }}" class="mr-3"><i class="fa fa-16px fa-eye"></i></a>
                        @if(Auth::user()->role==1)
                        <a role="button" href="{{ route('admin.job-info.edit', $job->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
