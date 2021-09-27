<?php

namespace App\Http\Middleware;

use App\Http\Requests\DoctorRequest;
use Closure;
use Auth;


class IsDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(DoctorRequest $request, Closure $next, $guard = 'doctor')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/');
        }
        return $next($request);
    }
}
