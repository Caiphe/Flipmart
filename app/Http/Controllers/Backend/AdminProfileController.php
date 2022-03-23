<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProfileController extends Controller
{
    public function profile(){
        $data = Admin::find(3);
        // dd($data);
        return view('admin.profile.profile',
            ['adminData' => $data]
        );
    }

    public function edit(){
        $data = Admin::find(3);
        return view('admin.profile.edit',
            ['adminData' => $data]
        );
    }

    public function update(Request $request){
        $data = Admin::find(3);
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
        return redirect()->route('admin.profile');

    }
}
