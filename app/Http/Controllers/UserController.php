<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    //
    public function show($id)
    {
    $user = User::find($id);
    return view('profile',['user'=> $user]);
    }

    public function show1($id)
    {
    $user = User::find($id);
    return view('menu',['user'=> $user]);
    }

    public function show2($id)
    {
    $user = User::find($id);
    return view('tobuy',['user'=> $user]);
    }
}
