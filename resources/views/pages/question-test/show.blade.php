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

            <div class="card">
                <div class="card-body">
                    {!! $question_test->questionDetails->quest !!}
                </div>
            </div>
            <form action="{{route('admin.question-test.value-result',[$id,$question_test->number])}}" method="post" class="clearfix">
                @csrf
                @if($question_test->questionDetails)
                    @if($question_test->questionDetails->a!=null)
                        <label class="form-control text-left " style="height: 100%">
                            <div class="row">
                                <div class="col-md-1">
                                    <input type="radio" name="answer" value="1" class="">
                                </div>
                                <div class="col-md-11">
                                    {!! $question_test->questionDetails->a !!}
                                </div>
                            </div>
                        </label>
                    @endif
                    @if($question_test->questionDetails->b!=null)
                        <label class="form-control text-left " style="height: 100%">
                            <div class="row">
                                <div class="col-md-1">
                                    <input type="radio" name="answer" value="1" class="">
                                </div>
                                <div class="col-md-11">
                                    {!! $question_test->questionDetails->b !!}
                                </div>
                            </div>
                        </label>
                    @endif
                    @if($question_test->questionDetails->c!=null)
                        <label class="form-control text-left " style="height: 100%">
                            <div class="row">
                                <div class="col-md-1">
                                    <input type="radio" name="answer" value="1" class="">
                                </div>
                                <div class="col-md-11">
                                    {!! $question_test->questionDetails->c !!}
                                </div>
                            </div>
                        </label>
                    @endif
                    @if($question_test->questionDetails->d!=null)
                        <label class="form-control text-left " style="height: 100%">
                            <div class="row">
                                <div class="col-md-1">
                                    <input type="radio" name="answer" value="1" class="">
                                </div>
                                <div class="col-md-11">
                                    {!! $question_test->questionDetails->d !!}
                                </div>
                            </div>
                        </label>
                    @endif
                    @if($question_test->questionDetails->e!=null)
                        <label class="form-control text-left " style="height: 100%">
                            <div class="row">
                                <div class="col-md-1">
                                    <input type="radio" name="answer" value="1" class="">
                                </div>
                                <div class="col-md-11">
                                    {!! $question_test->questionDetails->e !!}
                                </div>
                            </div>
                        </label>
                    @endif
                @endif
                <div class="row">
                        <a href="{{route('admin.question-test.value-result',[$id,$question_test->number-1])}}" class="btn btn-success">Kembali</a>
                    @if(count($allMission)!=$question_test->number)
                        <a href="{{route('admin.question-test.value-result',[$id,$question_test->number+1])}}" class="btn btn-success">Lewati</a>
                    @endif
                    <a href="{{route('admin-test-index',[$id])}}" class="btn btn-danger">Selesai dan kembali</a>

                    <input type="submit" class="btn btn-success float-right" value="Simpan dan lanjut">
                </div>


            </form>


        </div>
        <div class="col-md-2 m-3 mt-5">
            <div class="row">
                @foreach($allMission as $aq)
                    <a href="{{route('admin.question-test.value-result',[$id,$aq->number])}}" class="btn {{($aq->answer!=null)?'btn-success':'border-dark'}}">{{$aq->number}}</a>
                @endforeach
            </div>
        </div>
    </div>


{{--    @foreach($id as $q)--}}
{{--        www--}}
{{--    @endforeach--}}
{{--        <p>{{$a->questionDetail->quest}}</p>--}}
{{--    <div>--}}
{{--        <livewire:question-test-form action="update" :dataId="$question_test" />--}}
{{--        @foreach($question_test as $q)--}}
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
