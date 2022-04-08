<?php

namespace App\Http\Controllers\Backend;

use Image;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:sanctum,admin', 'verified']);
    }

    public function index(){
        return view('admin.brand.index',
            ['brands' => Brand::latest()->get()]
        );
    }

    public function store(BrandRequest $request){
        $data = $request->validated();

        $file = $data['brand_image'];
        $name_gen = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(300,300)->save('upload/brands/'.$name_gen);
        $save_url = 'upload/brands/'.$name_gen;
        $data['brand_image'] = $save_url;

        Brand::create($data);

        $notification = array(
            'message' => "New Brand added successfully",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(Brand $brand){
        return view('admin.brand.edit', ['brand' => $brand]);
    }

    public function update(BrandRequest $request,Brand $brand){
        $data = $request->validated();

        if($data['brand_image']){
            $old_image = $request->old_image;
            $file = $data['brand_image'];
            unlink($old_image);
            $name_gen = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(300,300)->save('upload/brands/'.$name_gen);
            $save_url = 'upload/brands/'.$name_gen;
            $data['brand_image'] = $save_url;

            $brand->update($data);
        }else{
            $brand->update([
                'name' => $data['name'],
                'brand_slug' => $data['brand_slug']
                ]
            );
        }

        $notification = array(
            'message' => "Brand updated successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('all.brand')->with($notification);
    }

    public function destroy(Brand $brand){
        $brand_image = $brand->brand_image;
        unlink($brand_image);
        $brand->delete();

        $notification = array(
            'message' => "Brand deleted successfully",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
