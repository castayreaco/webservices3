<?php

namespace bestelServer\Http\Controllers;

use bestelServer\winkel;
use bestelServer\winkelItem;
use bestelServer\bestellingen;
use bestelServer\bestelItems;
use Illuminate\Http\Request;

class klantenController extends Controller
{
    public function index()
    {
    	$winkels = Winkel::all();

        return view('klanten.index', compact('winkels'));
    }

    public function show($id)
    {
    	$winkel = Winkel::find($id);
    	return view('klanten.show', compact('winkel'));
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'naam' => 'required',
            'mail' => 'email',
            'tel' => 'required',
            'afhaalUur' => 'required',
            'afhaalDatum' => 'required'
        ]);

        $namen = $request->naamItem;
        $hoeveelheden = $request->hoeveel;
        $ids = $request->id;
        $totaalPrijs = 0;
        $teller = 0;

        $bestelling = new bestellingen;

        $bestelling->winkel_id = $id;
        $bestelling->naam = $request->naam;
        $bestelling->mail = $request->mail;
        $bestelling->tel = $request->tel;
        $bestelling->afhaalUur = $request->afhaalUur;
        $bestelling->afhaalDatum = $request->afhaalDatum;
        $bestelling->totaalPrijs = 0;
        $bestelling->save();

        foreach ($hoeveelheden as $hoeveelheid)
        {
            //Totaalprijs berekenen
            if($hoeveelheid != 0)
            {
                $totaalPrijs += winkelItem::find($ids[$teller])->prijs * $hoeveelheid;
                $bestelItem = new bestelItems;
                $bestelItem->bestellingen_id = $bestelling->id;
                $bestelItem->naam = $namen[$teller];
                $bestelItem->aantal = $hoeveelheid;
                $bestelItem->save();
            }

            $teller++;
        }

        $bestelling->totaalPrijs = $totaalPrijs;
        $bestelling->save();
        
        return view('klanten.einde');
        //$table->totaalPrijs
    }
}
