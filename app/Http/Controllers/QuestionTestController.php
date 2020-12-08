<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionDetail;
use App\Models\QuestionSubmit;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionTestController extends Controller
{
    public function index ()
    {
        return view('pages.question-test.index', [
            'question_test' => QuestionDetail::class
        ]);
    }
    public function create(){
        return view("pages.question-test.create");
    }
    public function edit($id){
//        dd($id);
        return view('pages.question-test.edit', compact('id'));
    }
    public function show($id){
        $question_test = QuestionDetail::whereTestId($id)->get();
//        dd($question_test);
        $allMission=QuestionSubmit::whereHas('questionDetail',function ($q) use ($id) {
            $q->whereTestId($id);
        })->whereUserId(Auth::id())->get();
//        dd($a);
        if (count($allMission)==0){
            $count = QuestionDetail::whereTestId($id)->get();

            for ($i=0; $i < count($count); $i++) {
                $answer = array(
                    'question_detail_id' =>$count[$i]->id,
                    'user_id' => Auth::id()
                );
                QuestionSubmit::create($answer);
            }
        }
//        $question_test = Test::findOrFail($id);
        return view('pages.question-test.show', compact('question_test','id','allMission'));
    }

//    public function showDetailMission($id){
//        $mission=QuestionSubmit::whereHas('questionDetail',function ($q) use ($id) {
//            $q->whereTestId($id);
//        })->whereUserId(Auth::id())->firstOrFail();
//        $allMission=QuestionSubmit::whereHas('questionDetail',function ($q) use ($id) {
//            $q->whereTestId($id);
//        })->whereUserId(Auth::id())->get();
//
//        return view('admin.question-test.show',compact('id','mission','allMission'));
//    }
    public function storeDetailMission(Request $request,$course,$id,$number){
//        dd($request->all());
        $data=$request->all();
        unset($data['_token']);
        $question_test=QuestionSubmit::whereHas('questionDetail',function ($q) use ($id) {
            $q->whereTestId($id);
        })->whereUserId(Auth::id())->update($data);

        if (count(QuestionDetail::whereTestId($id)->get())==$number){
            return redirect(route('admin.test.index', $id));
        }
        return redirect(route('admin.test.show',[$id,$number+1]));

    }
}
