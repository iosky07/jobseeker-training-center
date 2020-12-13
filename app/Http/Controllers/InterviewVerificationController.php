<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InterviewVerificationController extends Controller
{
    public function index ()
    {
        return view('pages.interview.choosen.index', [
            'interview' => Interview::class
        ]);
    }
    public function create(){
        return view("pages.interview.choosen.create");
    }
    public function edit($id){
        return view('pages.interview.choosen.edit');
    }
    public function show($id){
        $interview = DB::table('interviews')
            ->where('id', '=', $id)
            ->get();
        return view('pages.interview.choosen.show', ['interviews' => $interview]);
    }
}
