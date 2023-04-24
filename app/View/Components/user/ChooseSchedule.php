<?php

namespace App\View\Components\user;

use App\Models\Admission;
use App\Models\Offer;
use App\Models\StudentSchedule;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class ChooseSchedule extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function studentChooseSchedule()
    {
        $choice = StudentSchedule::where("user_id", Auth::id()) -> exists();
        dd($choice);
        return $choice;
        
       /*  if($choice)
        {
            return true;
        }

        return false; */
    }

    public function admissions()
    {
        $admissions = Admission::where("treated", 1)->where("status", "accepted")->where("user_id", Auth::id()) ->get(); 

        return $admissions;
    } 

    public function inscription()
    {
        $inscription = StudentSchedule::where('user_id', Auth::id())->first();
    
        return $inscription;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.choose-schedule');
    }
}