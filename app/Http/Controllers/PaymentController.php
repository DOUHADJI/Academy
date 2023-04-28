<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function see()
    {
        return view('user.see-payment');
    }
    
}