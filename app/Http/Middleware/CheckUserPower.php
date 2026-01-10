<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserPower
{
    public function handle(Request $request, Closure $next, $power)
    {
        if (!auth()->check() || auth()->user()->power != $power) {
            abort(403, 'Acesso não autorizado.');
        }

        return $next($request);
    }
}
