<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd('Redircet Route Link/');
        if (Session::has('redirect_route')) {
            $link = Session::get('redirect_route');
            session('redirect_route', null);
            return redirect()->route($link);
        } else {
            // dd('Home');
            return redirect('/');
        }
    }
}
