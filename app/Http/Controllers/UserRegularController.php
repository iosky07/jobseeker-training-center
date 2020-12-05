<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRegularController extends Controller
{
    public function index ()
    {
        return view('pages.user.jobseeker.regular.index', [
            'user' => User::class
        ]);
    }
    public function create(){
        return view("pages.user.jobseeker.regular.create");
    }
    public function edit($id){
        return view('pages.user.jobseeker.regular.edit');
    }
    public function show($id){
        $users = DB::table('users')
            ->where('id', '=', $id)
            ->get();
        return view('pages.user.jobseeker.regular.show', ['users' => $users]);
    }
}
