<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:sanctum,admin', 'verified']);
    }

    public function index(){
        return view('admin.category.index',
            ['categories' => Category::latest()->get()]
        );
    }

    public function store(CategoryRequest $request){
        $data = $request->validated();

        if(!Category::where('name', $data['name'])->exists()){
            $data['slug'] = Str::slug($data['name']);
            Category::create($data);

            $notification = array(
                'message' => "New Category added successfully",
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => "Category exists already!!",
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function destroy(Category $category){
        $category->delete();

        $notification = array(
            'message' => "Brand deleted successfully",
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(Category $category){
        return view('admin.category.edit',
            ['category' => $category]
        );
    }

    public function update(CategoryRequest $request, Category $category){
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $category->update($data);

        $notification = array(
            'message' => "Category updated successfully",
            'alert-type' => 'info'
        );
        return redirect()->route('all.category')->with($notification);

    }
}

