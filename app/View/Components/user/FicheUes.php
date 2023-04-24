<?php

namespace App\View\Components\user;

use App\Models\Inscription;
use App\Models\Payment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class FicheUes extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function payment()
    {
        return Payment::where('user_id', Auth::id())->orderby('school_year_id', "desc")->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.fiche-ues');
    }

}