<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Subsubcategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Image;

class ProductController extends Controller
{
    // Display the product form to create a product
    public function index(){
        return view('admin.product.index',
        [
            'brands' => Brand::orderBy('name', 'ASC')->get(),
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'subcategories' => Subcategory::orderBy('name', 'ASC')->get(),
            'subsubcategory' => Subsubcategory::orderBy('name', 'ASC')->get(),
        ]);
    }

    public function store(ProductRequest $request){
        $data = $request->validate();
        if(!Product::where('name' === $data['name'] && 'brand_id' === $data['brand_id'] && 'category_id' === $data['category_id'] )->exists()){

            $file = $data['thumbanail'];
            $name_gen = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(400,400)->save('upload/products/'.$name_gen);
            $save_url = 'upload/products/'.$name_gen;
            $data['thumbanail'] = $save_url;
            $data['slug'] = Str::slug($data['name']);

            Product::create($data);

            $notification = array(
                'message' => "New Product added successfully",
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => "Produc exists already!",
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function edit(Product $product){

    }

    public function update(){

    }

    public function destroy(){

    }
}
