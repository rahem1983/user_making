<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class userinfo extends Controller
{
    public function UserCall(){
        // return DB::select("select * from users");
        $members = User::paginate(2);
        return $_COOKIE['userphonenumber'];
        // return view('members',['members'=>$members]);
    }
    public function delete($id){
        $member = User::find($id);
        $member->delete();
        return redirect('api/UserCall');
    }
    public function update(Request $req){
        $member = new User;
        $member = User::find($req->id);
        $member->name = $req->name;
        $member->email = $req->email;
        $member->password = $req->password;
        $res= $member->save();
        if ($res) {
            return "updated";
        }
        else
            return "not updated";
    }
    public function searchvalue(Request $req)
    {
        return redirect("api/search/".$req->name);
    }
    public function search(Request $name)
    {
        $members = User::where("name","like","%".$name->name."%")->get();
        // return $members;
        return view('searchresult',['members'=>$members]);
    }
}
