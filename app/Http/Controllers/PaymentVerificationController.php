<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentVerificationController extends Controller
{
    public function index ()
    {
        return view('pages.payment.verification.index', [
            'payment' => Payment::class
        ]);
    }
    public function create(){
        return view("pages.payment.verification.create");
    }
    public function edit($id){
        return view('pages.payment.verification.edit');
    }
    public function show($id){
        $payment = DB::table('payments')
            ->where('id', '=', $id)
            ->get();
        return view('pages.payment.verification.show', ['payments' => $payment]);
    }
}
