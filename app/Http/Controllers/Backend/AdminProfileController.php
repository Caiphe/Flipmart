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
}
