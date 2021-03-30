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
            if($user->roles->name=='Admin') return view('admin.events.index');
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
        return view('admin.events.form', ['model' => $model, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'desc' => ['required'],
            'category' => ['required'],
            'date' => ['required'],
            'start' => ['required'],
            'end' => ['required'],
        ]);
        if($request->file('image')!=null){
            $directory = '/upload/events/';
            $filename = $request->name.'.'.$request->image->getClientOriginalExtension();
            $image = $directory.$filename;
            $request->image->move(public_path($directory), $filename);
        }
        else{
            $image = null;
        }
        $model = Event::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'category_id' => $request->category,
            'date' => $request->date,
            'start' => $request->start,
            'end' => $request->end,
            'image' => $image
        ]);
        return response()->json($model);
    }

    public function edit($id)
    {
        $model = Event::find($id);
        $categories = Category::get();
        return view('admin.events.form', ['model' => $model, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required'],
            'desc' => ['required'],
            'category' => ['required'],
            'date' => ['required'],
            'start' => ['required'],
            'end' => ['required'],
        ]);
        if($request->file('image')!=null){
            $directory = '/upload/events/';
            $filename = $request->name.'.'.$request->image->getClientOriginalExtension();
            $image = $directory.$filename;
            $request->image->move(public_path($directory), $filename);
        }
        else{
            $image = null;
        }
        $model = Event::findOrFail($id)->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'category_id' => $request->category,
            'date' => $request->date,
            'start' => $request->start,
            'end' => $request->end,
            'image' => $image
        ]);
        return response()->json($model);
    }

    public function delete($id)
    {
        $model = Event::findOrFail($id)->delete();
        return response()->json($model);
    }

    public function data()
    {
        $model = Event::with('categories')->get();
        return DataTables::of($model)
            ->addColumn('action', function($model){
            return '<div class="btn-group" role="group">
                        <button type="button" href="'.route('event.edit', $model->id).'" class="btn btn-primary btn-sm modal-show edit" name="Edit '.$model->name.'" data-toggle="modal" data-target="#modal">Edit</button>
                        <button type="button" href="'.route('event.delete', $model->id).'" class="btn btn-danger btn-sm delete" name="Delete '.$model->name.'">Delete</button>
                    </div>';
            })
            ->addColumn('timeline', function($model){
                return date('d M Y', strtotime($model->date)).' '.date('H:i', strtotime($model->start)).' - '.date('H:i', strtotime($model->end));
            })
            ->addIndexColumn()
            ->removeColumn([])
            ->rawColumns([])
            ->make(true);
    }
}
