<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tree;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;

class PagesController extends Controller
{
    public function index(){
        return view('frontend.layouts.index', [
            'trees' => Tree::where('status', 'approved')->paginate(10),
            'banners' => Banner::orderBy('id', 'desc')->limit(3)->get()
        ]);
    }


    public function about(){
        return view('frontend.layouts.pages.about');
    }


    public function contact(){
        return view('frontend.layouts.pages.contact');
    }


    public function category($slug){
        $category = Category::where('slug', $slug)->first();
        $trees = $category->trees()->paginate(1);
        return view('frontend.layouts.pages.category', compact('category', 'trees'));
    }


    public function profile($user_name){
        $profile = User::where('user_name', $user_name)->first();
        $trees = $profile->trees()->paginate(10);
        // dd($trees);
        // die();
        return view('frontend.layouts.pages.profle', compact('profile', 'trees'));
    }
}
