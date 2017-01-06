<?php

namespace bestelServer\Http\Controllers;

use Auth;
use bestelServer\bestellingen;
use bestelServer\winkel;
use Illuminate\Http\Request;

class bestellingenController extends Controller
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
    public function show($id)
    {
        $bestelling = bestellingen::find($id);
        $winkel = winkel::findOrFail($bestelling->winkel_id);
        if($winkel->user_id == Auth::user()->id)
        {
            return view('bestellingen.show', compact('bestelling'));
        }
        else
        {
            return back();
        }
    }
}
