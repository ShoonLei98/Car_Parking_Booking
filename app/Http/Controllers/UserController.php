<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userList()
    {
        $userData = User::get();
        return view('admin.user.user_list')->with(['user' => $userData]);
    }
}
