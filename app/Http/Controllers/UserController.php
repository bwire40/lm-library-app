<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use App\Http\Controllers\User;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view("users.index", ["users" => $users]);
    }


    // create new user
    public function create()
    {
        return view("users.create");
    }

    // edit user
    public function edit(Request $request, User $user)
    {

        return view("users.edit", ["user" => $user]);
    }
    public function destroy(User $user)
    {
        //delete this user
    }
}
