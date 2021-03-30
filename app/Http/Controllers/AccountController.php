<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use DataTables;

class AccountController extends Controller
{
    public function index()
    {
        if(auth()->user()->roles->name=='Admin') return view('admin.accounts.index');
    }

    public function create()
    {
        $model = new User();
        $roles = Role::get();
        return view('admin.accounts.form', ['model' => $model, 'roles' => $roles]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'role' => ['required']
        ]);
        $model = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles_id' => $request->role
        ]);
        return response()->json($model);
    }

    public function edit($id)
    {
        $model = User::find($id);
        $roles = Role::get();
        return view('admin.accounts.form', ['model' => $model, 'roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'role' => ['required']
        ]);
        $model = User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles_id' => $request->role
        ]);
        return response()->json($model);
    }

    public function delete($id)
    {
        $model = User::findOrFail($id)->delete();
        return response()->json($model);
    }

    public function data()
    {
        $model = User::with('roles')->get();
        return DataTables::of($model)
            ->addColumn('action', function($model){
            return '<div class="btn-group" role="group">
                        <button type="button" href="'.route('account.edit', $model->id).'" class="btn btn-primary btn-sm modal-show edit" name="Edit '.$model->name.'" data-toggle="modal" data-target="#modal">Edit</button>
                        <button type="button" href="'.route('account.delete', $model->id).'" class="btn btn-danger btn-sm delete" name="Delete '.$model->name.'">Delete</button>
                    </div>';
            })
            ->addIndexColumn()
            ->removeColumn([])
            ->rawColumns([])
            ->make(true);
    }
}
