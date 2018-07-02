<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RegistrationComplete
{
    /**
     * Allow request to go through if the user has been verified by an admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->registration_complete){
            return $next($request);
        }

        return redirect(route('registration-not-complete'));

    }
}
