<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkThemeManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //if(Auth::user()->hasRole('Theme Manager'))
        $istrue= Auth::user()->hasRole('Theme Manager');
        if($istrue == false)
        {
            session()->flash('status','Denied-You do not have permissions to access Theme Management');
            return redirect('/home');
        }

        return $next($request);
    }
}
