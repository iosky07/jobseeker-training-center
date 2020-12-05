<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index ()
    {
        return view('pages.user.admin.index', [
            'user' => User::class
        ]);
    }
    public function create(){
        return view("pages.user.admin.create");
    }
    public function edit($id){
        return view('pages.user.admin.edit');
    }
    public function show($id){
        $users = DB::table('users')
            ->where('id', '=', $id)
            ->get();
        return view('pages.user.admin.show', ['users' => $users]);
    }
}
