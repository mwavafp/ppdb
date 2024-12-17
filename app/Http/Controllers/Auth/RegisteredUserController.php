<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username_generate' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password_generate' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username_generate' => $request->username_generate,
            'email' => $request->email,
            'password_generate' => Hash::make($request->password_generate),
            'name' => $request->name,
            'alamat' => $request->alamat,
            'nisn' => $request->nisn,
            'tmpt_lahir' => $request->tmpt_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'asl_sekolah' => $request->asl_sekolah,
    
        ]);
        $user = User::latest()->first();
            $user->ortu()->create([
                'id_user' => $request->id_user,
                'nmr_kk'=>$request->nmr_kk,
                'nm_ayah'=>$request->nm_ayah,
                'nik_ayah'=>$request->nik_ayah,
                'tgl_lhr_ayah'=>$request->tgl_lhr_ayah,
                'tmpt_lhr_ayah'=>$request->tmpt_lhr_ayah,
                'almt_ayah'=>$request->almt_ayah,
                'pekerjaan_ayah'=>$request->pekerjaan_ayah,
                'nmr_ayah_wa'=>$request->nmr_ayah_wa,
                'nm_ibu'=>$request->nm_ibu,
                'nik_ibu'=>$request->nik_ibu,
                'tgl_lhr_ibu'=>$request->tgl_lhr_ibu,
                'tmpt_lhr_ibu'=>$request->tmpt_lhr_ibu,
                'almt_ibu'=>$request->almt_ibu,
                'pekerjaan_ibu'=>$request->pekerjaan_ibu,
                'nmr_ibu_wa'=>$request->nmr_ibu_wa,
               
    
            ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
