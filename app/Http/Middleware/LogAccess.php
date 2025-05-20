<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LogAccess
{
    public function handle($request, Closure $next)
    {
        Log::info('User accessed: ' . $request->url(), [
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
            'ip' => $request->ip(),
        ]);

        return $next($request);
    }
}
