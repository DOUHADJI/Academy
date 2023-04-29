<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function see()
    {
        return view('user.see-payment');
    }

    public function pay(Request $request)
    {
        $id = $request -> validate([
            "payement" => ["required"],
            "payment_code" => ["required", "numeric"]
        ]);

        $payment = Payment::whereId($id)->first();
        
        $payment->update([
            "status" => "payed" 
        ]);

        return redirect()->route('seePayment');
        
        
        
    }

    public function inscription()
    {
        return view('user.fiche-inscription');;
    }
    
}