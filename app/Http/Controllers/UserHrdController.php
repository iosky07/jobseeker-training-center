<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserHrdController extends Controller
{
    public function index ()
    {
        return view('pages.user.hrd.index', [
            'user' => User::class
        ]);
    }
    public function create(){
        return view("pages.user.hrd.create");
    }
    public function edit($id){
        return view('pages.user.hrd.edit');
    }
    public function show($id){
        $users = DB::table('users')
            ->where('id', '=', $id)
            ->get();
        return view('pages.user.hrd.show', ['users' => $users]);
    }
}
