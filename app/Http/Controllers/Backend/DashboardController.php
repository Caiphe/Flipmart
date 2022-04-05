<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.index',[
            'products' => Product::orderBy('created_at','DESC')->get()
        ]);
    }
}
