<?php

namespace App\Http\Controllers;

use App\Models\InterviewScore;
use Illuminate\Http\Request;

class InterviewScoreController extends Controller
{
    public function index ()
    {
        return view('pages.interview.score.index', [
            'interview' => InterviewScore::class
        ]);
    }
    public function edit($id){
        return view('pages.interview.score.edit', compact('id'));
    }

    public function show($id)
    {
        $interview = InterviewScore::find($id);

        return view('pages.interview.score.show', compact('interview'));
    }
}
