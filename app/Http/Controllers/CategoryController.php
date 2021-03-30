<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;

class CategoryController extends Controller
{
    public function create()
    {
        $model = new Category();
        return view('admin.category.form', ['model' => $model]);
    }

    public function store(Request $request)
    {
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
        $model = Category::find($id);
        return view('admin.category.form', ['model' => $model]);
    }

    public function update(Request $request, $id)
    {
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
        $model = Category::findOrFail($id)->delete();
        return response()->json($model);
    }

    public function data()
    {
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
