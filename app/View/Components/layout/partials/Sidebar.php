<?php

namespace App\View\Components\layout\partials;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function has_admissions():bool
    {
        $admissions = User::whereId(Auth::id())->first() ->admissions;

        if(isset($admissions))
        {
            return true;
        }

        return false;
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.partials.sidebar');
    }
}