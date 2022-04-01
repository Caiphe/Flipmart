<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Subsubcategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubsubcategoryRequest;

class SubSubCategoryController extends Controller
{
    // index store show edit update destroy
    public function index(){
        return view('admin.subsubcategory.index',
        [
            'subsubcategories' => Subsubcategory::orderBy('name', 'ASC')->get(),
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'subcategories' => Subcategory::orderBy('name', 'ASC')->get(),
        ]);
    }

    public function store(SubsubcategoryRequest $request){
        $data = $request->validated();

        if(!Subsubcategory::where('name', $data['name'])->exists()){
            $data['slug'] = Str::slug($data['name']);

            Subsubcategory::create($data);

            $notification = array(
                'message' => "Sub sub-category added successfully",
                'alert-type' => 'success'
            );
            return redirect()->route('all.subsubcategory')->with($notification);

        }else{

            $notification = array(
                'message' => "Sub-sub-category exists already!",
                'alert-type' => 'warning'
            );
            return redirect()->route('all.subsubcategory')->with($notification);
        }

    }

    public function edit(Subsubcategory $subsubcategory){
        return view('admin.subsubcategory.edit',[
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'subcategories' => Subcategory::orderBy('name', 'ASC')->get(),
            'subsubcategory' => $subsubcategory

        ]);
    }

    public function update(Subsubcategory $subsubcategory, SubsubcategoryRequest $request){
        $data = $request->validated();

        if(!Subsubcategory::where('name', $data['name'])->exists()){
            $data['slug'] = Str::slug($data['name']);

            $subsubcategory->update($data);

            $notification = array(
                'message' => "Sub sub-category updated successfully",
                'alert-type' => 'info'
            );
            return redirect()->route('all.subsubcategory')->with($notification);

        }else{

            $notification = array(
                'message' => "Sub-sub-category exists already!",
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function destroy(Subsubcategory $subsubcategory){
        $subsubcategory->delete();

        $notification = array(
            'message' => "Sub-sub-category exists already!",
            'alert-type' => 'warning'
        );
        return redirect()->route('all.subsubcategory')->with($notification);
    }
}
