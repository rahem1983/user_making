<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Profile extends Controller
{
    public function profile(){
        if (session()->has('username')) {
            return view('profile');
        }
        return view('LoginForm');
    }
    
}
