<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return view('users');
    }
    public function fetchUsers(){
        $users = User::all();
        return response()->json([
            'users'=>$users
        ]);
    }
}
