<x-app-layout>
<x-slot name="header_content">
        <h1>{{ __('Buat Soal Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Jadwal Tes</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.test.index') }}">Soal</a></div>
        </div>
    </x-slot>

    <div>
        @if(Auth::user()->role==1)
        <a role="button" class="btn btn-primary" href="{{route('admin.test.create-question', $test->id)}}" style="margin-bottom: 15px">Tambah Soal</a>
        {{--        <livewire:table.main name="region-terrace" :model="$map" />--}}
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Quest</th>
                <th scope="col">a</th>
                <th scope="col">b</th>
                <th scope="col">c</th>
                <th scope="col">d</th>
                <th scope="col">e</th>
                <th scope="col">Jawaban Benar</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($test->questionDetails as $t)
                <tr>
                    <td>{{$t->id}}</td>
                    <td>{!!$t->quest!!}</td>
                    <td>{!!$t->a!!}</td>
                    <td>{!!$t->b!!}</td>
                    <td>{!!$t->c!!}</td>
                    <td>{!!$t->d!!}</td>
                    <td>{!!$t->e!!}</td>
                    <td>{!!$t->value!!}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.question-detail.edit', $t->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
{{--                        <a role="button" href="{{ route('admin.test.show', $test->id) }}" class="mr-3"><i class="fa fa-16px fa-eye"></i></a>--}}
                        <a role="button" href="{{ route('admin.test.delete-question', $t->id) }}"><i class="fa fa-16px fa-trash text-red-500"></i></a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endif
{{--        <div id="table_pagination" class="py-3">--}}
{{--            {{($test->onEachSide(1)->links())}}--}}
{{--        </div>--}}
{{--            {{$id}}--}}
{{--            <livewire:question-test-form action="update" :dataId="$id" />--}}

    </div>

</x-app-layout>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                @foreach($test->questionDetails as $t)
                <a type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
                <a type="button" class="btn btn-danger" href="{{ route('admin.test.delete-question', $t->id) }}">Hapus</a>
                @endforeach
{{--                @php--}}
{{--                    $data = \App\Models\QuestionDetail::findOrFail($this->test);--}}

{{--                    $this->data = [--}}
{{--                        "id" => $data->id,--}}
{{--                    ];--}}
{{--                @endphp--}}
{{--                <a type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>--}}
{{--                <a type="button" class="btn btn-danger" href="{{ route('admin.test.delete-question', $this->data) }}">Hapus</a>--}}
            </div>
        </div>
    </div>
</div>


