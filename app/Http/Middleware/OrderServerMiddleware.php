<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class OrderServerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $user = auth()->user();
            if ($user instanceof User) {
                if ($user->hasAccess('platform.app.servers')) {
                    return $next($request);
                }
            }
        }

        return redirect()->route('platform.main');
    }
}
