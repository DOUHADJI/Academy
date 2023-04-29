<?php

namespace App\View\Components\user;

use App\Models\SchoolYear as ModelsSchoolYear;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SchoolYear extends Component
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
        return ModelsSchoolYear::where('is_current', 1) -> first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.school-year');
    }
}