<?php

namespace App\View\Components\user;

use App\Models\Admission;
use App\Models\Offer;
use App\Models\Schedule;
use Closure;
use Dompdf\Adapter\PDFLib;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class SeeAdmissionInfos extends Component
{
   
    /**
     * Create a new component instance.
     */
    public function __construct(
        
    )
    {
        
    }

    public function admissions()
    {
        $admissions = Admission::where("user_id", Auth::id()) -> get();
        foreach($admissions as $admission)
        {
            $admission["schedule"] = $admission -> schedule;
           
        }
        return $admissions;
    }

    


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.see-admission-infos');
    }
}