<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Helpers\LogActivity;
use DataTables;

class CategoryController extends Controller
{
    public function create()
    {
        LogActivity::addToLog('Admin : Use Form to create category');
        $model = new Category();
        return view('admin.category.form', ['model' => $model]);
    }

    public function store(Request $request)
    {
        LogActivity::addToLog('Admin : Store data to make category');
        $this->validate($request, [
            'name' => ['required'],
        ]);
        $model = Category::create([
            'name' => $request->name,
        ]);
        return response()->json($model);
    }

    public function edit($id)
    {
        LogActivity::addToLog('Admin : Use form to edit category');
        $model = Category::find($id);
        return view('admin.category.form', ['model' => $model]);
    }

    public function update(Request $request, $id)
    {
        LogActivity::addToLog('Admin : Update category');
        $this->validate($request, [
            'name' => ['required'],
        ]);
        $model = Category::findOrFail($id)->update([
            'name' => $request->name,
        ]);
        return response()->json($model);
    }

    public function delete($id)
    {
        LogActivity::addToLog('Admin : Delete category');
        $model = Category::findOrFail($id)->delete();
        return response()->json($model);
    }

    public function data()
    {
        LogActivity::addToLog('Admin : Access data category');
        $model = Category::get();
        return DataTables::of($model)
            ->addColumn('action', function($model){
            return '<div class="btn-group" role="group">
                        <button type="button" href="'.route('category.edit', $model->id).'" class="btn btn-primary btn-sm modal-show edit" name="Edit '.$model->name.'" data-toggle="modal" data-target="#modal">Edit</button>
                        <button type="button" href="'.route('category.delete', $model->id).'" class="btn btn-danger btn-sm delete" name="Delete '.$model->name.'">Delete</button>
                    </div>';
            })
            ->addIndexColumn()
            ->removeColumn([])
            ->rawColumns([])
            ->make(true);
    }
}
