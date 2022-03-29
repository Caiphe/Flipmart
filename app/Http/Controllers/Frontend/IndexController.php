<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function userLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function userProfile(){
        return view('profile.profile');
    }

    public function update(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => "User profile updated successfully!",
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    }

    public function passwordChange(){
        return view('profile.password-change');
    }

    public function passwordUpdate(Request $request){        
        $validated = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check( $validated['old_password'], $hashedPassword)){
            $user = User::find($request->user_id);
            $user->password = Hash::make($validated['password']);
            $user->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
            $notification = array(
                'message' => "Something went wrong",
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }
}
