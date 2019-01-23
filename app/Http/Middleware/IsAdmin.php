<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('user')) {
            if (Session::get('user') && Session::get('user')->is_admin === 1) {
                return redirect('/adminPanel');
            }
        }
        return $next($request);
    }
}
