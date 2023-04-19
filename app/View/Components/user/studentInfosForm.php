<?php

namespace App\View\Components\user;

use App\Models\StudentInformation;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class studentInfosForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
       // public StudentInformation $student,
       public string $disabled,
    ) 
    {
        
    }

    public function object()
    {
        $user_id = Auth::id();
        $student = StudentInformation::where("user_id", $user_id)->first();

      //  dd(($student));

        return $student;
    }

    
    
    


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // $title = "super titre";
        return  view('components.user.student-infos-form', [
      //      'title' => "super title"
        ]);
    }
}