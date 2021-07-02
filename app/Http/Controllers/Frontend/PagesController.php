<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('frontend.layouts.index');
    }


    public function about(){
        return view('frontend.layouts.pages.about');
    }


    public function contact(){
        return view('frontend.layouts.pages.contact');
    }
}
