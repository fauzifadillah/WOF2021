<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Level;
use App\Helpers\LogActivity;
use DataTables;

class LeaderboardController extends Controller
{
    public function index()
    {
        LogActivity::addToLog('User : Access Leaderboard Index');
        $users = User::get()->reject(function($user){
            if($user->roles->name=='Admin' || $user->roles->name=='Merchant') return true;
        });
        return view('leaderboards.index', ['users' => $users]);
    }

    public function data()
    {
        // LogActivity::addToLog('User : Access data Leaderboard');
        $model = User::with('leaderboard')->get()->reject(function($user){
            if($user->roles->name=='Admin' || $user->roles->name=='Merchant' ) return true;
        });
        return DataTables::of($model)
            ->addColumn('rank', function($model){
                $point = $model->leaderboard->total_point;
                $levels = Level::get();
                $rank = null;
                foreach($levels as $level){
                    if($point<$level->points){
                        $rank = $level->name;
                        break;
                    }
                }
                if($rank == null){
                    $rank = $level->name;
                }
                return $rank;
            })
            ->addIndexColumn()
            ->removeColumn([])
            ->rawColumns([])
            ->make(true);
    }
}
