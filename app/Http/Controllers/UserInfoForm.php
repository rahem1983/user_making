<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserInfoForm extends Controller
{
    public function SetUserData(Request $req)
    {
        $req->validate([
            'username'=>'required',
            'password'=> 'required | min:8',
            'email'=> 'required'
        ]);
        $data = $req->input();

        $user = new User;
        $user->name = $req->username;
        $user->email = $req->email;
        $user->password = $req->password;
        $res=$user->save();
        $req->session()->put('username', $data['username']);
        // session(['username'=>$data['username']]);
        // if($res){
        //     return "Datasaved";
        // }
        // else {
        //     return "Notsaved";
        // }
        
        return redirect('api/profile');
        
    }
    public function Login(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
    }
}
