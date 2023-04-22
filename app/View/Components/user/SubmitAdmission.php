<?php

namespace App\View\Components\user;

use App\Models\Schedule;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubmitAdmission extends Component
{
    
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
         // $this -> firstChoice;
    }

    public function schedules()
    {
        return Schedule::all();
    }

    public function has_admissions()
    {
        
         
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.submit-admission');
    }
}