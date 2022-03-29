<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function profile(){
        $data = Admin::first();
        // dd($data);
        return view('admin.profile.profile',
            ['adminData' => $data]
        );
    }

    public function edit(){
        $data = Admin::first();
        return view('admin.profile.edit',
            ['adminData' => $data]
        );
    }

    public function update(Request $request){
        $data = Admin::first();
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();
        $notification = array(
            'message' => "Admin profile updated successfully!",
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);

    }

    public function changePassword(){
        return view('admin.profile.change-password');
    }

    public function passwordUpdate(Request $request){
        $validated = $request->validate([
            'old_password' => 'required',
            'current_password' => 'required|confirmed',
        ]);

        dd($validated);

        // $hashedPassword = Admin::first()->password;
        // if(Hash::check($request->old_password, $hashedPassword)){
        //     $admin = Admin::first();
        //     $admin->password = Hash::make($request->password);
        //     $admin->save();
        //     Auth::logout();
        //     return redirect()->route('admin.logout');
        // }else{
        //     return redirect()->back();
        // }
    }
}
