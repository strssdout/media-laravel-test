<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    public function index(Request $req){
        $users = User::all();
        return view('users', compact('users'));
    }

    public function sendForm(UserRequest $req){
        // $this->validate($req, [
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
        User::create($req->all());
        return redirect('/users');
    }
}
