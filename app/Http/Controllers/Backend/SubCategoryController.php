<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Subsubcategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;

class SubCategoryController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:sanctum,admin', 'verified']);
    }

    public function index(){
        return view('admin.subcategory.index',
        [
            'subcategories' => Subcategory::latest()->get(),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(SubCategoryRequest $request){
        $data = $request->validated();

        if(!Subcategory::where('name', $data['name'])->exists()){
            $data['slug'] = Str::slug($data['name']);
            Subcategory::create($data);

            $notification = array(
                'message' => "New sub-Category created successfully",
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => "Sub-Category exists successfully",
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function edit(Subcategory $subcategory){
        return view('admin.subcategory.edit',
            ['subcategory' => $subcategory, 'categories' => Category::all(),]
        );
    }

    public function update(Subcategory $subcategory, SubCategoryRequest $request){
        $data = $request->validated();

        if(!Subcategory::where('name', $data['name'])->exists()){
            $data['slug'] = Str::slug($data['name']);
            $subcategory->update($data);

            $notification = array(
                'message' => "Sub-Category updated successfully",
                'alert-type' => 'success'
            );
            return redirect()->route('all.subcategory')->with($notification);
        }else{
            $notification = array(
                'message' => "Sub-Category exists successfully",
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function destroy(Subcategory $subcategory){
        $subcategory->delete();

        $notification = array(
            'message' => "Sub-Category deleted successfully",
            'alert-type' => "info"
        );
        return redirect()->back()->with($notification);

    }

    // This is to make the dependency dropdown list from category to sub category
    public function getsubcategory($category_id){
        $subcat = Subcategory::where('category_id', $category_id)->orderBy('name', 'ASC')->get();
        return json_encode($subcat);
    }

    // this is to make the dependency dropdown list from subcategory to subsubcategory
    public function getsubsubcategory($subcategory_id){
        $subsubcat = Subsubcategory::where('sub_category_id', $subcategory_id)->orderBy('name', 'ASC')->get();
        return json_encode($subsubcat);
    }
}
