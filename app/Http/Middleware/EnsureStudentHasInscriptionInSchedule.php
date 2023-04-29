<?php

namespace App\Http\Middleware;

use App\Models\Payment;
use App\Models\School;
use App\Models\SchoolYear;
use App\Models\StudentSchedule;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureStudentHasInscriptionInSchedule
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $schedule_bool = StudentSchedule::where('user_id', Auth::id())->exists();
        $schedule = StudentSchedule::where('user_id', Auth::id())->first()->schedule;
        
        $school_year = SchoolYear::where("is_current", 1)->first();
        $payment_bool = Payment::where('school_year_id', $school_year->id)->where("user_id", Auth::id())->where('schedule_id', $schedule->id)->exists();

       // dd($schedule, $school_year,$schedule_bool, $payment_bool);
        

        if($schedule_bool && $payment_bool)
        {
            return $next($request);
        }

        return redirect()->route('showInscription');
        
    }
}