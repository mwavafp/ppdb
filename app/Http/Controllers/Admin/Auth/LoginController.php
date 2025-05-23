<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {

        return view('admin.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(AdminLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $admin = Auth::guard('admin')->check();


        // if ($admin && Auth::guard('admin')->user()->role == 'admin') {
        //     return redirect()->intended(route('admin.dashboard-admin'));
        // } elseif ($admin) {

        //     return redirect()->intended(route('admin.dashboardSuperAdmin'));
        // }
        if ($admin && Auth::guard('admin')->user()->role === 'admin') {
            return redirect()->intended(route('admin.dashboard-admin'));
        } elseif ($admin && Auth::guard('admin')->user()->role === 'superAdmin') {
            return redirect()->intended(route('admin.dashboardSuperAdmin'));
        } else {
            return redirect()->intended(route('admin.login'));
        }


        // if ($admin) {
        //     return redirect()->intended(route('admin.dashboard-admin'));
        // }


    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {

        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
