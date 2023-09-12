<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsMaster
{
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->user()->is_master == 1){
            return $next($request);
        }elseif(auth()->check() && auth()->user()->is_master_role == 1){
            return $next($request);
        }
        else {
            return redirect()->route('master-admin');
        }
    }
}
