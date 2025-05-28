<?php

namespace App\Http\Controllers;

use App\Models\PengaturanKontak;
use App\Models\KontakAdmin;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $settings = PengaturanKontak::first();
        $contactPersons = KontakAdmin::all();
        
        $title = 'Contact Us';
        
        return view('frontpage.kontak', compact('settings', 'contactPersons', 'title'));
    }
}