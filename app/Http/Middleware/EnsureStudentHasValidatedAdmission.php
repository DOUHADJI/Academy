<?php

namespace App\Http\Middleware;

use App\Models\Admission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureStudentHasValidatedAdmission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $bool = Admission::where('user_id', Auth::id())->where('status', 'accepted')->exists();
        
        if($bool)
        {
            return $next($request);
        }

        return redirect()->route('seeAdmission');
        
    }
}