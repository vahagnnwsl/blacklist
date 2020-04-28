<?php

namespace App\Http\Controllers;

use App\Arendator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = Arendator::count();
        return view('home',compact('count'));
    }
}
