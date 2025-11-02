<?php

namespace App\Http\Controllers\AdminSuper;

use App\Http\Controllers\Controller;
use App\Models\PengaturanKontak;
use App\Models\KontakAdmin;
use Illuminate\Http\Request;

class ContactSettingsController extends Controller
{
    public function index()
    {
        $settings = PengaturanKontak::first();
        $contactPersons = KontakAdmin::all();
        
        return view('superAdmin.pengaturankontak', compact('settings', 'contactPersons'));
    }
    
    public function updateGeneral(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'address' => 'required',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'whatsapp_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'building_image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);
        
        $settings = PengaturanKontak::firstOrNew();
        
        $settings->email = $request->email;
        $settings->address = $request->address;
        $settings->facebook_url = $request->facebook_url;
        $settings->instagram_url = $request->instagram_url;
        $settings->whatsapp_url = $request->whatsapp_url;
        $settings->youtube_url = $request->youtube_url;
        
        if ($request->hasFile('building_image')) {
            $settings->building_image = file_get_contents($request->file('building_image')->getPathname());
        }
        
        $settings->save();
        
        return redirect()->route('contact-settings')->with('success', 'General contact settings updated successfully!');
    }
    
    public function storeContactPerson(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'whatsapp_message' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $contactPerson = new KontakAdmin();
        $contactPerson->name = $request->name;
        $contactPerson->description = $request->description;
        $contactPerson->phone = $request->phone;
        $contactPerson->whatsapp_message = $request->whatsapp_message;
        
        if ($request->hasFile('photo')) {
            $contactPerson->photo = file_get_contents($request->file('photo')->getPathname());
        }
        
        $contactPerson->save();
        
        return redirect()->route('contact-settings')->with('success', 'Contact person added successfully!');
    }
    
    public function updateContactPerson(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'whatsapp_message' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $contactPerson = KontakAdmin::findOrFail($id);
        $contactPerson->name = $request->name;
        $contactPerson->description = $request->description;
        $contactPerson->phone = $request->phone;
        $contactPerson->whatsapp_message = $request->whatsapp_message;
        
        if ($request->hasFile('photo')) {
            $contactPerson->photo = file_get_contents($request->file('photo')->getPathname());
        }
        
        $contactPerson->save();
        
        return redirect()->route('contact-settings')->with('success', 'Contact person updated successfully!');
    }
    
    public function deleteContactPerson($id)
    {
        $contactPerson = KontakAdmin::findOrFail($id);
        $contactPerson->delete();
        
        return redirect()->route('contact-settings')->with('success', 'Contact person deleted successfully!');
    }
}