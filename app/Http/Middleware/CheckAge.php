<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
{
    public function handle(Request $request, Closure $next)
    {
        $age = $request->session()->get('age');
        if (!is_numeric($age) || $age < 18) {
            return response('Không được phép truy cập', 403);
        }
        return $next($request);
    }
}
