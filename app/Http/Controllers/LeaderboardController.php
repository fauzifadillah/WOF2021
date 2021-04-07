<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\LogActivity;
use DataTables;

class LeaderboardController extends Controller
{
    public function index()
    {
        LogActivity::addToLog('User : Access Leaderboard Index');
        $users = User::get();
        return view('leaderboards.index', ['users' => $users]);
    }

    public function data()
    {
        LogActivity::addToLog('User : Access data Leaderboard');
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
