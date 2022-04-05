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
use App\Http\Requests\MultipleImageRequest;
use App\Http\Requests\ProductRequest;
use App\Models\MultiImage;
use Image;

class ProductController extends Controller
{

    public function __construct(){
        $this->middleware(['auth:sanctum,admin', 'verified']);
    }

    // Display the product form to create a product
    public function index(){
        return view('admin.product.index',
        [
            'brands' => Brand::orderBy('name', 'ASC')->get(),
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'subcategories' => Subcategory::orderBy('name', 'ASC')->get(),
            'subsubcategory' => Subsubcategory::orderBy('name', 'ASC')->get(),
            'products' => Product::orderBy('created_at','DESC')->get()
        ]);
    }

    public function store(ProductRequest $request){
        $data = $request->validated();

        $file = $data['thumbanail'];
        $nameGenerated = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(400,400)->save('upload/products/thumbnail/'.$nameGenerated);
        $Imageurl = 'upload/products/thumbnail/'.$nameGenerated;
        $data['thumbanail'] = $Imageurl;
        $data['slug'] = Str::slug($data['name']);

        $newProduct = Product::create($data);

        //Store Product Multiple Image
        if($request->file('multi_images')){
            $images = $request->file('multi_images');
            foreach ($images as $img){
                $imgName = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($file)->resize(400,400)->save('upload/products/multi-image/'.$imgName);
                $uploadPath = 'upload/products/multi-image/'.$imgName;

                MultiImage::create([
                    'product_id' => $newProduct->id,
                    'photo_name' => $uploadPath
                ]);
            }
        }

        $notification = array(
            'message' => "New Product added successfully",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(Product $product){

    }

    public function update(){

    }

    public function destroy(Product $product){


    }
}
