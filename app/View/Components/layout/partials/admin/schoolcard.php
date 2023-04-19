<?php

namespace App\View\Components\layout\partials\admin;

use App\Models\School;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class schoolcard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public School $school
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.partials.admin.schoolcard');
    }
}