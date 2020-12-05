<?php

namespace App\Http\Controllers;

use App\Models\JobArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobInfoController extends Controller
{
    public function index ()
    {
        return view('pages.job-info.index', [
            'job' => JobArticle::class
        ]);
    }
    public function create(){
        return view("pages.job-info.create");
    }
    public function edit($id){
        return view('pages.job-info.edit', compact('id'));
    }
    public function show($id){
        $jobs = DB::table('job_articles')
            ->where('id', '=', $id)
            ->get();
        return view('pages.job-info.show', ['jobs' => $jobs]);
    }
}
