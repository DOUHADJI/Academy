<?php

namespace App\View\Components\layout\partials;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class login extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
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
        return view('components.layout.partials.login');
    }
}