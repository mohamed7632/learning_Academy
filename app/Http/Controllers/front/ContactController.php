<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
class ContactController extends Controller
{
    function index(){
    $data['settings']= Setting::first();
    return view('front.contact.index')->with($data);
    }
}
