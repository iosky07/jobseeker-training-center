<?php

namespace App\Http\Controllers;

use App\Models\QuestionScore;
use Illuminate\Http\Request;

class QuestionScoreController extends Controller
{
    public function index()
    {
        return view('pages.question-score.index', [
            'score' => QuestionScore::class
        ]);
    }

    public function showScore($id, $point)
    {
        return view('pages.question-score.show', compact('id', 'point'));
    }
}
