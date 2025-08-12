<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $all_teks = DB::table('yayasan')
            ->select('id_yayasan', 'image_login')
            ->get();

        return view('auth.login', compact('all_teks'), ['title' => 'Login']);
    }
    public function editLoginImage()
    {
        // Ambil data image_login dari tabel yayasan (asumsi cuma satu record)
        $all_teks = DB::table('yayasan')->select('id_yayasan', 'image_login')->first();

        return view('superAdmin.pengaturanwebhome', compact('data'), ['title' => 'Edit Yayasan']);
    }


    public function updateLoginImage(Request $request)
    {
        $request->validate([
            'image_login' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'id_yayasan' => 'required|integer',
        ]);

        if ($request->hasFile('image_login')) {
            $file = $request->file('image_login');
            $filename = 'image_login_' . time() . '.' . $file->getClientOriginalExtension();

            // Pindahkan file ke folder public/storage
            $file->move(public_path('storage'), $filename);

            // Update database
            DB::table('yayasan')
                ->where('id_yayasan', $request->id_yayasan)
                ->update(['image_login' => $filename]);

            return redirect()->back()->with('success', 'Gambar login berhasil diperbarui!');
        }

        return redirect()->route('pengaturanhome-edit')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('biodata'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
