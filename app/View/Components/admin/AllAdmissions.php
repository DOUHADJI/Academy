<?php

namespace App\View\Components\admin;

use App\Models\Admission;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AllAdmissions extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function admissions()
    {
      //  $admissions = DB::table('admissions') -> where("treated", 0) ->groupBy('cv') -> get();
        
        $admissions = Admission::all();
       // dd($admissions);
        return $admissions;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.all-admissions');
    }
}