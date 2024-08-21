<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Userinfo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addUser(Request $req){
        $req->validate([
            'email' => 'required|email|unique:App\Models\User,email',
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
        $user = User::create([
            'email' => $req->email,
            'password' => $req->password,
            'username' => $req->username,
        ]);
        $user->userinfo()->create([
            'usertype' => 'Customer',
            'address' => '',
            'phone' => '',
            'photo' => ''
        ]);
        if ($user) {
            return redirect()->route('index');
        }
    }
    public function test() {
        $info = Userinfo::with('user')->find(1);
        return $info;
        // $stu = User::with('userinfo')->find(1);
        // echo $stu->email . "<br>" . $stu->password . "<br>" . $stu->userinfo->address;
    }
}
