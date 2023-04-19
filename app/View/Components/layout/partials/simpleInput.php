<?php

namespace App\View\Components\layout\partials;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class simpleInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label,
        public string $type,
        public string $name,
        public string $placeholder,
        public string $required
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.partials.simple-input');
    }
}