<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PostCheck extends Controller
{
    public function postcheck(Request $req)
    {
        $user = new User;
        $user->name = $req->username;
        $user->email = $req->email;
        $user->password = $req->password;
        $res=$user->save();
        if($res){
            return "Datasaved";
        }
        else {
            return "Notsaved";
        }
    }
}
