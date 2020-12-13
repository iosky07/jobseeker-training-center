<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionDetail;
use App\Models\QuestionScore;
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
//        $question_test = QuestionDetail::whereTestId($id)->get();
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
                    'user_id' => Auth::id(),
                    'number'=> $i+1
                );
                QuestionSubmit::create($answer);
            }
            return redirect(route('admin.question-test.show-question',[$id,1]));
        }
//        dd($category_test[0]->category);
        return redirect(route('admin.question-test.show-question',[$id,1]));
    }

    public function showDetailMission($id, $no){
//        dd("as");
        $mission=QuestionSubmit::whereHas('questionDetail',function ($q) use ($id) {
            $q->whereTestId($id);
        })->whereUserId(Auth::id())->whereNumber($no)->firstOrFail();
//        dd($mission);
        $allMission=QuestionSubmit::whereHas('questionDetail',function ($q) use ($id) {
            $q->whereTestId($id);
        })->whereUserId(Auth::id())->orderBy('number')->get();

        return view('pages.question-test.show',compact('id','mission','allMission'));
    }
    public function storeDetailMission(Request $request,$id,$number){
//        dd($request->all());
        $data=$request->all();
        unset($data['_token']);
        $question_test=QuestionSubmit::whereHas('questionDetail',function ($q) use ($id) {
            $q->whereTestId($id);
        })->whereUserId(Auth::id())->whereNumber($number)->update($data);

        if (count(QuestionDetail::whereTestId($id)->get())==$number){
            $real_answer = QuestionDetail::whereTestId($id)->get('value');
            $user_answer = QuestionSubmit::whereHas('questionDetail',function ($q) use ($id) {
                $q->whereTestId($id);
            })->whereUserId(Auth::id())->get('answer');
            $category_test = Test::whereId($id)->get('category');

//            dd($category_test[0]->category);
            $point = 0;
            for ($i=0; $i < $number; $i++) {
                if ($real_answer[$i]->value == $user_answer[$i]->answer) {
                    $point = $point + 10;
                }
            }
//            dd($point);
            if ($point >= 70) {
                $status = "Lulus";
            }else{
                $status = "Tidak Lulus";
            }

            $score = array(
                'user_id' => Auth::user()->id,
                'test_id' => $id,
                'score' => $point,
                'category' => $category_test[0]->category,
                'status' => $status
            );
//            dd($score);
            QuestionScore::create($score);
            return redirect(route('admin.question-score.index'));
        }
//        return redirect(route('admin.test.show',[$id,$number+1]));

        return redirect(route('admin.question-test.show-question',[$id,$number+1]));
    }
}
