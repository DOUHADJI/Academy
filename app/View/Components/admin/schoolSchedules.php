<?php

namespace App\View\Components\admin;


use App\Models\School;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;


class schoolSchedules extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public School $school,
        public Collection $schedules,
        public int $selected,
        public Collection $offers 
        
    )
    {
        //
    }


    public function object()
    {
        return null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.school-schedules');
    }
}