<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\LogActivity;
use DataTables;

class LogController extends Controller
{
    public function index()
    {
        LogActivity::addToLog('Admin : Access Log Index');
        return view('admin.logs.index');
    }

    public function data()
    {
        $logs = LogActivity::logActivityLists();
        return DataTables::of($logs)
            ->addColumn('user', function($model){
                if($model->user_id){
                    return $model->users->name;
                }
            })
            ->addIndexColumn()
            ->removeColumn([])
            ->rawColumns([])
            ->make(true);
    }
}
