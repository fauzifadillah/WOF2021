<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if($user){
            if($user->roles->name=='Admin') return view('admin.home');
        }
        return view('welcome');
    }
}
