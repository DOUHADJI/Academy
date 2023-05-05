<?php

namespace App\View\Components\user;

use App\Models\Exam;
use App\Models\Inscription;
use App\Models\Payment;
use App\Models\SchoolYear;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class StudentExams extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function inscriptions()
    {
        $school_year = SchoolYear::where("is_current", 1)->first(); 
        $payment = Payment::where("user_id", Auth::id())->where("school_year_id", $school_year->id)->first();
        $inscriptions = Inscription::where("payment_id", $payment->id)->get();
        $school_year = SchoolYear::where("is_current", 1)->first();
        
        foreach($inscriptions as $inscription)
        {
            $inscription["exam"] = Exam::where('school_year_id', $school_year->id)->where("offer_id",$inscription->offer->id)->first();
        }
        
        return $inscriptions;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.student-exams');
    }
}