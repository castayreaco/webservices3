<?php

namespace bestelServer\Http\Controllers;

use Auth;
use bestelServer\Winkel;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $winkels = winkel::where('user_id', Auth::user()->id)->get();
        return view('home', compact('winkels'));
    }
}
