<?php

namespace App\Http\Middleware;

use Auth;

use Closure;

class AdminAuth
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
        if (Auth::check()) {
            $user_id = Auth::user()->isAdmin;
            if ($user_id == "1") {
                return $next($request);
            }
        }
        return redirect('/login');
    }
}
