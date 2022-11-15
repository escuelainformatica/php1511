<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MiMiddleware extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     */
    public function handle($request, Closure $next, ...$guards)
    {
        //$grupo=$request->session()->get('grupo','');
        var_dump(Auth::user());
        $grupo=Auth::user()->grupo;
        if($grupo!=='') {
            return $next($request);
        }
        //var_dump('el usuario no esta logeado o no tiene grupo');
        return redirect('login');
    }

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
