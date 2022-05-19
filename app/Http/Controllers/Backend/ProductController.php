<?php

namespace App\Http\Controllers\Backend;

use Image;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Subsubcategory;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\MultipleImageRequest;

class ProductController extends Controller
{

    public function __construct(){
        $this->middleware(['auth:sanctum,admin', 'verified']);
    }

    public function index(){
        return view('admin.product.index',
            ['products' => Product::orderBy('created_at','DESC')->get()]
        );
    }

    // Display the product form to create a product
    public function create(){
        return view('admin.product.create',
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
        return redirect()->route('manage.product')->with($notification);
    }

    public function show(Product $product){
        return view('admin.product.show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product){
        return view('admin.product.edit',
            [
                'brands' => Brand::orderBy('name', 'ASC')->get(),
                'categories' => Category::orderBy('name', 'ASC')->get(),
                'subcategories' => Subcategory::orderBy('name', 'ASC')->get(),
                'subsubcategory' => Subsubcategory::orderBy('name', 'ASC')->get(),
                'product' => $product,
                'multimages' => MultiImage::where('product_id', $product->id)->get(),
            ]);
    }

    public function update(ProductRequest $request, Product $product){
        $data = $request->validated();

        if($request->file){
            $file = $data['thumbanail'];
            unlink($request->old_image);
            $nameGenerated = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(400,450)->save('upload/products/thumbnail/'.$nameGenerated);
            $imagePath = 'upload/products/thumbnail/'.$nameGenerated;
            $data['thumbanail'] = $imagePath;
        }

        $product->update($data);

        $notification = array(
            'message' => "Product updated successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('manage.product')->with($notification);
    }

    public function destroy(Product $product){
        unlink($product->thumbanail);
        $product->delete();

        $notification = array(
            'message' => "Product deleted successfully",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function updateProductImage(MultiImage $multiImage, Request $request)
    {
        $imgs = $request->multi_img;
        foreach ($imgs as $id => $img){
            $imgDel = MultiImage::findOrFail($id);
            unlink($imgDel->photo_name);

            $makeName = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(400,450)->save('upload/products/multi-image/'.$makeName);
            $imageUrl = 'upload/products/multi-image/'.$makeName;

            MultiImage::where('id', $id)->update([
                'photo_name' =>  $imageUrl,
                'updated_at' => Carbon::now()
            ]);
        }

        $notification = array(
            'message' => "Product image updated successfully",
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function deleteProductImage(MultiImage $singleimage)
    {
        unlink($singleimage->photo_name);
        $singleimage->delete();

        $notification = array(
            'message' => "Image deleted successfully",
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function productActive(Product $product)
    {
        $product->update(['current_status' => 'active']);
        $notification = array(
            'message' => "Product is now active",
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function productInactive(Product $product)
    {
        $product->update(['current_status' => 'inactive']);
        $notification = array(
            'message' => "Product is now non-active",
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
