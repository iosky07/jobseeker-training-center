<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InterviewVerificationController extends Controller
{
    public function index ()
    {
        return view('pages.interview.verification.index', [
            'interview' => Interview::class
        ]);
    }
    public function create(){
        return view("pages.interview.verification.create");
    }
    public function edit($id){
        return view('pages.interview.verification.edit');
    }
    public function show($id){
        $interview = DB::table('interviews')
            ->where('id', '=', $id)
            ->get();
        return view('pages.interview.verification.show', ['interviews' => $interview]);
    }
}
