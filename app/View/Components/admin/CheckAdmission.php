<?php

namespace App\View\Components\admin;

use App\Models\Admission;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CheckAdmission extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Admission $admission
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.check-admission');
    }
}