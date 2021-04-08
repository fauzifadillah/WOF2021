<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Helpers\LogActivity;
use DataTables;

class PointController extends Controller
{
    public function index()
    {
        LogActivity::addToLog('Admin : Access Point Index');
        return view('admin.points.index');
    }

    public function create()
    {
        LogActivity::addToLog('Admin : Use form to create point');
        $model = new Level();
        return view('admin.points.form', ['model' => $model]);
    }

    public function store(Request $request)
    {
        LogActivity::addToLog('Admin : Store data to make point');
        $this->validate($request, [
            'name' => ['required'],
            'points' => ['required']
        ]);
        $model = Level::create([
            'name' => $request->name,
            'points' => $request->points
        ]);
        return response()->json($model);
    }

    public function edit($id)
    {
        LogActivity::addToLog('Admin : Use form to edit point');
        $model = Level::find($id);
        return view('admin.points.form', ['model' => $model]);
    }

    public function update(Request $request, $id)
    {
        LogActivity::addToLog('Admin : Update point');
        $this->validate($request, [
            'name' => ['required'],
            'points' => ['required']
        ]);
        $model = Level::findOrFail($id)->update([
            'name' => $request->name,
            'points' => $request->points
        ]);
        return response()->json($model);
    }

    public function delete($id)
    {
        LogActivity::addToLog('Admin : Delete point');
        $model = Level::findOrFail($id)->delete();
        return response()->json($model);
    }

    public function data()
    {
        // LogActivity::addToLog('Admin : Access data point');
        $model = Level::get();
        return DataTables::of($model)
            ->addColumn('action', function($model){
            return '<div class="btn-group" role="group">
                        <button type="button" href="'.route('point.edit', $model->id).'" class="btn btn-primary btn-sm modal-show edit" name="Edit '.$model->name.'" data-toggle="modal" data-target="#modal">Edit</button>
                        <button type="button" href="'.route('point.delete', $model->id).'" class="btn btn-danger btn-sm delete" name="Delete '.$model->name.'">Delete</button>
                    </div>';
            })
            ->addIndexColumn()
            ->removeColumn([])
            ->rawColumns([])
            ->make(true);
    }
}
