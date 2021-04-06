<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class LeaderboardController extends Controller
{
    public function index()
    {
        return view('leaderboards.index');
    }

    public function data()
    {
        $model = User::with('leaderboard')->get()->reject(function($user){
            if($user->roles->name=='Admin' || $user->roles->name=='Merchant' ) return true;
        });

        return DataTables::of($model)
            ->addIndexColumn()
            ->removeColumn([])
            ->rawColumns([])
            ->make(true);
    }
}
