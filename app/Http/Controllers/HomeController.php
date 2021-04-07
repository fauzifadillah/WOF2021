<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\LogActivity;
use DataTables;

class HomeController extends Controller
{
    public function index()
    {
        LogActivity::addToLog('Guest : Access Home');
        $user = auth()->user();
        if($user){
            if($user->roles->name=='Admin') return view('admin.home');
        }
        return view('welcome');
    }
    public function tes()
    {
        $logs = LogActivity::logActivityLists();
        return DataTables::of($logs)
            ->addIndexColumn()
            ->removeColumn([])
            ->rawColumns([])
            ->make(true);
    }
}
