<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class SessionMonitoring
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
        if (Session::has('apiId')) {
            return $next($request);
        } else {
            Session::flush();
            Session::flash('message', 'Access Denied!');
            return redirect('/');
        }
    }
}
