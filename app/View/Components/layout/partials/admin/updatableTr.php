<?php

namespace App\View\Components\layout\partials\admin;

use App\Models\Offer;
use App\Models\Schedule;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class updatableTr extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Offer $offer,
        public bool $toUpdate,
        public Schedule $schedule
    )
    {
        $this -> toUpdate = $toUpdate;
    }

    public function wantUpdate()
    {
        return !$this -> toUpdate;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.partials.admin.updatable-tr');
    }
}