<?php

namespace App\View\Components\layout\partials\admin;

use App\Models\Offer;
use App\Models\Schedule;
use App\Models\School;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class updateOffer extends Component
{
    public Offer $offer;
   
    /**
     * Create a new component instance.
     */
    public function __construct(
        public School $school,
        public Schedule $schedule,
         Offer $offer
    )
    {
        $this -> offer = $offer;
    }

    public function object()
    {
        return $this -> offer;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.partials.admin.update-offer');
    }
}