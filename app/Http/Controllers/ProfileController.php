<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Level;
use App\Helpers\LogActivity;

class ProfileController extends Controller
{
    public function index()
    {
        LogActivity::addToLog('User : Access Leaderboard Index');
        $point = auth()->user()->leaderboard->total_point;
        $levels = Level::get();
        $rank = null;
        foreach($levels as $level){
            if($point<$level->points){
                $rank = $level->name;
                break;
            }
        }
        if($rank == null){
            $rank = $level->name;
        }
        return view('profiles.index', ['rank' => $rank]);
    }

    public function edit()
    {
        LogActivity::addToLog('User : Use form to edit profile');
        return view('profiles.edit');
    }

    public function update(Request $request)
    {
        LogActivity::addToLog('User : Update profile');
        $this->validate($request, [
            'name' => ['required']
        ]);
        if($request->file('file')!=null){
            $directory = '/upload/profiles/';
            $filename = $request->name.'.'.$request->file->getClientOriginalExtension();
            $image = $directory.$filename;
            $request->file->move(public_path($directory), $filename);
        }
        else{
            $image = null;
        }
        User::find(auth()->user()->id)->update([
            'name' => $request->name,
            'avatar' => $image
        ]);
        return redirect()->route('profile.index');
    }

    public function password()
    {
        LogActivity::addToLog('User : Use form to edit password');
        return view('profiles.password');
    }

    public function updatePassword(Request $request)
    {
        LogActivity::addToLog('User : Update password');
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
        LogActivity::addToLog('User : View voucher');
        return view('profiles.voucher');
    }

    public function redeemVoucher(Request $request)
    {
        LogActivity::addToLog('User : Redeem voucher');
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
