<?php

namespace App\View\Components\admin;

use App\Models\SchoolYear;
use Closure;
use DateTime;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CurrentSchoolYear extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function year()
    {
        return SchoolYear::orderBy('created_at', "desc") -> first();
    }

    public function remaning($start, $end)
    {
        $date = new DateTime();
        
        $start_date = new DateTime($start);
        $end_date = new DateTime($end);

        $total = $start_date ->diff($end_date);
        $remain = $date -> diff($end_date);
        
        //  dd($remain -> days / $total -> days);
        
        $remain_per =( ($remain -> days / $total -> days) * 100) - 100;

        return  number_format($remain_per, 0);
        

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.current-school-year');
    }
}