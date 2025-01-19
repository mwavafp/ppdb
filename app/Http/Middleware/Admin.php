<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next, $checkrole): Response
    {

        $user = Auth::guard('admin')->user();

        if (!$user || $user->role !== $checkrole) {
            return redirect()->route('admin.login')->withErrors('You do not have permission to access this page.');
        }
        return $next($request);
    }
}
