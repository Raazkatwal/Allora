<?php

namespace App\Http\Controllers;

use App\Models\Userinfo;
use Illuminate\Http\Request;

class UserinfoController extends Controller
{
    public function test() {
        $stu = Userinfo::all();
        return $stu;
    }
}
