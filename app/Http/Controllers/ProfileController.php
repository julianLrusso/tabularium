<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $name = auth()->user()->name;
        return view('profile.index',["name" => $name]);
    }
}
