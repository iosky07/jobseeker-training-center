<?php

namespace App\Http\Controllers;

use App\Models\QuestionDetail;
use App\Models\QuestionSubmit;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('pages.test.index', [
            'test' => Test::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('pages.test.create');
    }

    public function createQuestion($id) {
        return view('pages.question-detail.create', compact('id'));
    }

    public function editQuestion($id) {
        return view('pages.question-detail.edit', compact('id'));
    }

    public function deleteQuestion($id) {
        $data = QuestionDetail::find($id);
        $data->delete();
        return back()->withInput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::findOrFail($id);
        $check=QuestionSubmit::whereUserId(Auth::id())->whereHas('questionDetail',function ($q) use ($id) {
            $q->whereTestId($id);
        })->get();
//        dd());
        if (!count($check)){
            $quest=QuestionDetail::whereTestId($id)->get();
            foreach ($quest as $q){
                QuestionSubmit::create([
                    'user_id'=>Auth::id(),
                    'question_detail_id'=>$q->id
                ]);
            }
        }
        return view('pages.test.show', compact('test','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('pages.test.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = QuestionDetail::find($id);
        dd($data);
        $data->delete();

        $redirect = QuestionDetail::find();
        return view('pages.test.show', compact('redirect'));
    }
}
