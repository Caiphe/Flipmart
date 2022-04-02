<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Subsubcategory;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    // index store show edit update destroy
    public function index(){
        return view('admin.product.index',
        [
            'brands' => Brand::orderBy('name', 'ASC')->get(),
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'subcategories' => Subcategory::orderBy('name', 'ASC')->get(),
            'subsubcategory' => Subsubcategory::orderBy('name', 'ASC')->get(),
        ]);

    }

    public function store(){

    }

    public function edit(Product $product){

    }

    public function update(){

    }

    public function destroy(){

    }
}
