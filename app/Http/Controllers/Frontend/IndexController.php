<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function userLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function userProfile($id){
        $user = User::find($id);
    }
}
