<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Pengerjaan Soal') }}</h1>
    </x-slot>

    <div class="row">
        <div class="m-5 container col-md-7">

            @if($errors->any())
                <div class="alert alert-success border border-success" role="alert">
                    {{$errors->first()}}
                </div>
            @endif
{{--            @foreach($mission as $q)--}}
{{--            @endforeach--}}
            <div class="card">
                <div class="card-body">

                    {!! $mission->questionDetail->quest !!}
                </div>
            </div>
            <form action="{{route('admin.question-test.value-result',[$id,$mission->number])}}" method="post" class="clearfix">
                @csrf
                    @if($mission->questionDetail->a!=null)
                        <label class="form-control text-left " style="height: 100%">
                            <div class="row">
                                <div class="col-md-1">
                                    <input type="radio" name="answer" value="a" class="" {{$mission->answer=='a'?'checked':''}}>
                                </div>
                                <div class="col-md-11">
                                    {!! $mission->questionDetail->a !!}
                                </div>
                            </div>
                        </label>
                    @endif
                    @if($mission->questionDetail->b!=null)
                        <label class="form-control text-left " style="height: 100%">
                            <div class="row">
                                <div class="col-md-1">
                                    <input type="radio" name="answer" value="b" class="" {{$mission->answer=='b'?'checked':''}}>
                                </div>
                                <div class="col-md-11">
                                    {!! $mission->questionDetail->b !!}
                                </div>
                            </div>
                        </label>
                    @endif
                    @if($mission->questionDetail->c!=null)
                        <label class="form-control text-left " style="height: 100%">
                            <div class="row">
                                <div class="col-md-1">
                                    <input type="radio" name="answer" value="c" class="" {{$mission->answer=='c'?'checked':''}}>
                                </div>
                                <div class="col-md-11">
                                    {!! $mission->questionDetail->c !!}
                                </div>
                            </div>
                        </label>
                    @endif
                    @if($mission->questionDetail->d!=null)
                        <label class="form-control text-left " style="height: 100%">
                            <div class="row">
                                <div class="col-md-1">
                                    <input type="radio" name="answer" value="d" class="" {{$mission->answer=='d'?'checked':''}}>
                                </div>
                                <div class="col-md-11">
                                    {!! $mission->questionDetail->d !!}
                                </div>
                            </div>
                        </label>
                    @endif
                    @if($mission->questionDetail->e!=null)
                        <label class="form-control text-left " style="height: 100%">
                            <div class="row">
                                <div class="col-md-1">
                                    <input type="radio" name="answer" value="e" class="" {{$mission->answer=='e'?'checked':''}}>
                                </div>
                                <div class="col-md-11">
                                    {!! $mission->questionDetail->e !!}
                                </div>
                            </div>
                        </label>
                    @endif
                <div class="row">
                    @if($mission->number!=1)
                        <a href="{{route('admin.question-test.show-question',[$id,$mission->number-1])}}" class="btn btn-success">Kembali</a>
                    @endif
                    @if(count($allMission)!=$mission->number)
                        <a href="{{route('admin.question-test.show-question',[$id,$mission->number+1])}}" class="btn btn-success">Lewati</a>
                    @endif
                    <a href="{{route('admin.test.index')}}" class="btn btn-danger">Selesai dan kembali</a>

                    <input type="submit" class="btn btn-success float-right" value="Simpan dan lanjut">
                </div>


            </form>


        </div>
        <div class="col-md-2 m-3 mt-5">
            <div class="row">
                @foreach($allMission as $aq)
                    <a href="{{route('admin.question-test.show-question',[$id,$aq->number])}}" class="btn {{($aq->answer!=null)?'btn-success':'border-dark'}}">{{$aq->number}}</a>
                @endforeach
            </div>
        </div>
    </div>


{{--    @foreach($id as $q)--}}
{{--        www--}}
{{--    @endforeach--}}
{{--        <p>{{$a->questionDetail->quest}}</p>--}}
{{--    <div>--}}
{{--        <livewire:question-test-form action="update" :dataId="$mission" />--}}
{{--        @foreach($mission as $q)--}}
{{--            <form id="question" action="#" method="post">--}}
{{--                @csrf--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header bg-whitesmoke" >--}}
{{--                        <h4> {{$q->quest}}</h4>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <input type="radio" value="a" name="answer" onclick="document.getElementById('question').submit();">--}}
{{--                        <label >a. {{$q->a}}</label><br>--}}
{{--                        <input type="radio" value="b" name="answer" onclick="document.getElementById('question').submit();">--}}
{{--                        <label >b. {{$q->b}}</label><br>--}}
{{--                        <input type="radio" value="c" name="answer" onclick="document.getElementById('question').submit();">--}}
{{--                        <label >c. {{$q->c}}</label><br>--}}
{{--                        <input type="radio" value="d" name="answer" onclick="document.getElementById('question').submit();">--}}
{{--                        <label >d. {{$q->d}}</label><br>--}}
{{--                        <input type="radio" value="e" name="answer" onclick="document.getElementById('question').submit();">--}}
{{--                        <label >e. {{$q->e}}</label><br>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        @endforeach--}}
{{--    </div>--}}
</x-app-layout>
