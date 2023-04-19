<?php

namespace App\View\Components\layout\partials;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use tidy;

class input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $icon,
        public string $type,
        public string $placeholder
        
    )
    {
        //
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.partials.input');
    }
}