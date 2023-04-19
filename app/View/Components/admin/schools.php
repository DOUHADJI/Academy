<?php

namespace App\View\Components\admin;

use App\Models\School;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class schools extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        
    )
    {
        //
    }

    
    public function object()
    {
        return null;
    }

    public function schools()
    {
        $schools = School::all();

        if(isset($schools))
        {
            return $schools;
        }

        return [];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.schools');
    }
}