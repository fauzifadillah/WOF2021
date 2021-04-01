<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profiles.index');
    }

    public function edit()
    {
        return view('profiles.edit');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => ['required']
        ]);
        if($request->file('file')!=null){
            $directory = '/upload/profiles/';
            $filename = $request->name.'.'.$request->file->getClientOriginalExtension();
            $image = $directory.$filename;
            $request->file->move(public_path($directory), $filename);
        }
        User::find(auth()->user()->id)->update([
            'name' => $request->name,
            'avatar' => $image
        ]);
        return redirect()->route('profile.index');
    }

    public function password()
    {
        return view('profiles.password');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $model = auth()->user();
        if(password_verify($request->current, $model->password)){
            User::find($model->id)->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('profile.index');
        }
        else{
            $returnData = array(
                'errors' => ['current'=>'The current password is wrong']
            );
            return response()->json($returnData, 422);
        }
    }

    public function voucher()
    {
        return view('profiles.voucher');
    }

    public function redeemVoucher(Request $request)
    {
        $this->validate($request, [
            'current' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $model = auth()->user();
        if(password_verify($request->current, $model->password)){
            User::find($model->id)->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('profile.index');
        }
        else{
            $returnData = array(
                'errors' => ['current'=>'The current password is wrong']
            );
            return response()->json($returnData, 422);
        }
    }

}
