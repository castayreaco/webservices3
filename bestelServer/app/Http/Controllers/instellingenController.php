<?php

namespace bestelServer\Http\Controllers;

use DB;
use Auth;
use bestelServer\bestelItems;
use bestelServer\bestellingen;
use bestelServer\Winkel;
use bestelServer\WinkelItem;
use Illuminate\Http\Request;

class instellingenController extends Controller
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

        return view('instellingen.index', compact('winkels'));
    }

    public function show($id)
    {
        $winkel = Winkel::find($id);

        if($winkel->user_id==Auth::user()->id)
        {
            return view('instellingen.show', compact('winkel'));
        }
        else
        {
            return back();
        }
    }

    public function addWinkel(Request $request)
    {
        $this->validate($request, [
            'naam' => 'required',
            'adres' => 'required',
            'tel' => 'required',
            'mail' => 'email'
        ]);
        $winkel = new winkel;

        $winkel->user_id = Auth::user()->id;
        $winkel->naam = $request->naam;
        $winkel->adres = $request->adres;
        $winkel->tel = $request->tel;
        $winkel->mail = $request->mail;
        $winkel->save();

        return back();
    }

    public function removeWinkel(Request $request)
    {
        //Alle winkel items, bestel items en bestellingen ook verwijderen
        winkelItem::where('winkel_id', $request->id)->delete();
        $bestellingen = bestellingen::where('winkel_id', $request->id)->get();
        foreach($bestellingen as $bestelling)
        {
            bestelItems::where('bestellingen_id', $bestelling->id)->delete();
        }
        bestellingen::where('winkel_id', $request->id)->delete();

        //De winkel zelf verwijderen 

        $winkel = winkel::findOrFail($request -> id);

        if($winkel != NULL)
        {
            $winkel->delete();
        }
        return back();
    }

    public function editWinkel($id)
    {
        $winkel = winkel::findOrFail($id);
        if($winkel->user_id==Auth::user()->id)
        {
            return view('instellingen.winkelBewerken', compact('winkel'));
        }
        else
        {
            return back();
        }
    }

    public function updateWinkel(Request $request, $id)
    {
        $this->validate($request, [
            'naam' => 'required',
            'adres' => 'required',
            'tel' => 'required',
            'mail' => 'email'
        ]);

        $winkel = winkel::findOrFail($id);
        $winkel->update($request->all());
        return back();
    }

    public function editProduct($id)
    {
        $product = winkelItem::findOrFail($id);
        if($product->winkel->user_id == Auth::user()->id)
        {
            return view('instellingen.productBewerken', compact('product'));
        }
        else
        {
            return back();
        }
    }

    public function updateProduct(Request $request, $id)
    {
        $this->validate($request, [
            'naam' => 'required',
            'prijs' => 'numeric',
        ]);
        
        $product = winkelItem::findOrFail($id);
        $product->update($request->all());
        return back();
    }
}
