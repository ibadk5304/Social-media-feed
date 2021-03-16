<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkAdmin
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
        $istrue= Auth::user()->hasRole('User Administrator');
        if($istrue == false)
//        dd($request);
        {
            session()->flash('status','Denied-You do not have permissions to access User Management');
            return redirect('/home');
        }
        return $next($request);
    }
}
