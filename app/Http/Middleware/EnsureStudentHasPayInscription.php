<?php

namespace App\Http\Middleware;

use App\Models\Payment;
use App\Models\SchoolYear;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureStudentHasPayInscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $school_year = SchoolYear::orderBy("created_at", "desc")->first();

        $payment_bool = Payment::where('school_year_id', $school_year->id)->where("user_id", Auth::id())->where('status', 'payed')->exists();

        if($payment_bool)
        {
            return $next($request);
        }

        return redirect()->route('seePayment');
    }
}