<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    public function index(){
        return view('admin.brand.index',
            ['brands' => Brand::latest()->get()]
        );
    }

    public function store(BrandRequest $request){
        $data = $request->validated();

        $file = $data['brand_image'];
        // @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/brands'), $filename);
        $data['brand_image'] = $filename;
        Brand::create($data);


        $notification = array(
            'message' => "New Brand added successfully",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
