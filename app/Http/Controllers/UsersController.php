<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function admin(){
       
        $data = User::all();

        return view('user.users',['data'=>$data]);

    }
}
