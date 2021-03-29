<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;
use DataTables;

class EventController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if($user){
            return view($user->roles->name.'.events.index');
        }
        return view('events.index');
    }

    public function show(Request $request)
    {
        return view('events.show');
    }

    public function create()
    {
        $model = new Event();
        $categories = Category::get();
        return view(auth()->user()->roles->name.'.events.form', ['model' => $model, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:labs'],
            'desc' => ['required', 'string', 'unique:labs'],
            'date' => ['required'],
            'start' => ['required'],
            'end' => ['required'],
            'image' => ['required', 'string'],
            'category_id' => ['required', 'string'],
        ]);
        $model = Event::create($request->all());
        return response()->json($model);
    }

    public function data()
    {
        $model = Event::get();
        return DataTables::of($model)
            ->addColumn('action', function($model){
            return '<div class="btn-group" role="group">
                        <button type="button" href="#" class="btn btn-primary btn-sm modal-show edit" name="Edit Data ke-'.$model->id.'">Edit</button>
                        <button type="button" href="#" class="btn btn-danger btn-sm delete">Delete</button>
                    </div>';
            })
            ->addIndexColumn()
            ->removeColumn([])
            ->rawColumns([])
            ->make(true);
    }
}
