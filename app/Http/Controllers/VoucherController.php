<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Models\User;
use App\Helpers\LogActivity;
use DataTables;

class VoucherController extends Controller
{
    public function index()
    {
        LogActivity::addToLog('Admin : Access Voucher Index');
        if(auth()->user()->roles->name=='Admin') return view('admin.vouchers.index');
    }

    public function create()
    {
        LogActivity::addToLog('Admin : Use form to create voucher');
        $model = new Voucher();
        $users = User::where('roles_id', 3)->get();
        return view('admin.vouchers.form', ['model' => $model, 'users' => $users]);
    }

    public function store(Request $request)
    {
        LogActivity::addToLog('Admin : Store data to make voucher');
        $this->validate($request, [
            'name' => ['required'],
            'desc' => ['required'],
            'points' => ['required'],
            'user' => ['required'],
        ]);
        $model = Voucher::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'points' => $request->points,
            'users_id' => $request->user,
        ]);
        return response()->json($model);
    }

    public function edit($id)
    {
        LogActivity::addToLog('Admin : Use form to edit voucher');
        $model = Voucher::find($id);
        $users = User::where('roles_id', 3)->get();
        return view('admin.vouchers.form', ['model' => $model, 'users' => $users]);
    }

    public function update(Request $request, $id)
    {
        LogActivity::addToLog('Admin : Update voucher');
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
        LogActivity::addToLog('Admin : Delete voucher');
        $model = Event::findOrFail($id)->delete();
        return response()->json($model);
    }

    public function data()
    {
        LogActivity::addToLog('Admin : Access data voucher');
        $model = Voucher::with('users')->get();
        return DataTables::of($model)
            ->addColumn('action', function($model){
            return '<div class="btn-group" role="group">
                        <button type="button" href="'.route('voucher.edit', $model->id).'" class="btn btn-primary btn-sm modal-show edit" name="Edit '.$model->name.'" data-toggle="modal" data-target="#modal">Edit</button>
                        <button type="button" href="'.route('voucher.delete', $model->id).'" class="btn btn-danger btn-sm delete" name="Delete '.$model->name.'">Delete</button>
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
