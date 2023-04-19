<?php

namespace App\Http\Middleware;

use App\Models\StudentInformation;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EnsureStudentInfosComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $informations = StudentInformation::where("user_id",Auth::id()) -> first();
        
        if(isset($informations) === false && Gate::allows("is-student"))
        {
             return redirect() -> route("updateStudent") -> withErrors ([   
                 "infos"  => "Complétez vos informations"   
             ]);
        }
        
        return $next($request);
    }
}