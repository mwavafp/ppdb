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
        $userLogin = Auth::user()->role;

        // if ($userLogin != "admin") {
        //     return redirect()->route('admin.login')->withErrors('You do not have permission to access this page.');
        // }

        // dd($userLogin);

        if (!$user || $user->role !== $checkrole) {
            return redirect()->route('admin.login')->withErrors('You do not have permission to access this page.');
        }
        return $next($request);
    }
}
