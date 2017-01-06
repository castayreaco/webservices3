<?php

namespace bestelServer\Http\Controllers;

use bestelServer\WinkelItem;
use bestelServer\Winkel;
use Illuminate\Http\Request;

class winkelItemController extends Controller
{
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'naam' => 'required',
            'prijs' => 'numeric',
        ]);

    	$item = new winkelItem;

    	$item->winkel_id = $id;
    	$item->prijs = $request->prijs;
    	$item->naam = $request->naam;
    	$item->save();

    	return back();
    }

    public function remove(Request $request)
    {
		$item = winkelItem::find($request -> id);

		if($item != NULL)
		{
			$item->delete();
		}
		return back();
    }
}
