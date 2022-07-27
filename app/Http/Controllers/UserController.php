<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // direct user list page
    public function userList()
    {
        $userData = User::get();
        return view('admin.user.user_list')->with(['user' => $userData]);
    }

    // redirect to update user page
    public function editUser($id)
    {
        $user = User::where('id' , $id)->first();
        return view('admin.user.update_user')->with('user', $user);
    }

    public function updateUser(Request $request)
    {
       $user = $this->getUserData($request);

       User::where('id', $request->id)->update($user);
       return redirect()->route('user#list')->with(['updateSuccess' => 'User Data Updated Successfully...']);
    }

    public function deleteUser($id)
    {
        User::where('id', $id)->delete();
        return back()->with(['deleteSuccess' => 'User Data Deleted Successfully...']);
    }

    private function getUserData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => $request->role
        ];
    }
}
