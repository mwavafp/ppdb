<?php

namespace App\Http\Controllers;

use App\Mail\SendAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendAccountController extends Controller
{
    public function test()
    {

        $data = [
            "title" => "SP2",
            "body" => "kETERLAMBATAN PENGERJAAN PPDB. KERJA WOI"
        ];
        Mail::to("3130022022@student.unusa.ac.id")->send(new SendAccount($data));
    }
}
