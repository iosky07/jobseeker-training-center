<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserPremiumController extends Controller
{
    public function index ()
    {
        return view('pages.user.jobseeker.premium.index', [
            'user' => User::class
        ]);
    }
    public function create(){
        return view("pages.user.jobseeker.premium.create");
    }
    public function edit($id){
        return view('pages.user.jobseeker.premium.edit');
    }
    public function show($id){
        $users = DB::table('users')
            ->where('id', '=', $id)
            ->get();
        return view('pages.user.jobseeker.premium.show', ['users' => $users]);
    }
}
