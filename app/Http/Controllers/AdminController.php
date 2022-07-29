<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $userData = User::where('id', $id)->first();
        // dd($userData);
        return view('admin.home')->with(['user' => $userData]);
    }
}
