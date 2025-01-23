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

        // Mendapatkan peran pengguna yang sedang login dari guard 'admin'
        $user = Auth::guard('admin')->user();

        // Pastikan pengguna sudah login sebelum memeriksa perannya
        if (!$user) {
            return redirect()->route('admin.login')->withErrors('You must be logged in to access this page.');
        }

        $userRole = $user->role;

        // Perbandingan harus menggunakan "==" atau "===" bukan "&"
        if ($userRole === "admin" && $checkrole !== "admin") {
            return redirect()->route('admin.dashboard-admin')->withErrors('You do not have permission to access this page.');
        } elseif ($userRole === "superAdmin" && $checkrole !== "superAdmin") {
            return redirect()->route('admin.dashboardSuperAdmin')->withErrors('You do not have permission to access this page.');
        }
        // if (!$user || $user->role !== $checkrole) {
        //     return redirect()->route('admin.login')->withErrors('You do not have permission to access this page.');
        // }
        return $next($request);
    }
}
