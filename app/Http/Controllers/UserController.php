<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class UserController extends Controller
{
    public function addUser(Request $req){
        $user = DB::table('users')
        ->insert(
            [
                'email' => $req->email,
                'username' => $req->username,
                'password' => $req->password,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        if ($user) {
            return redirect()->route('index');
        }
    }
}
