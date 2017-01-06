<?php

namespace bestelServer;

use Illuminate\Database\Eloquent\Model;

class Winkel extends Model
{
	protected $fillable = ['naam', 'adres', 'tel', 'mail'];

    public function winkelItems()
    {
    	return $this->hasMany(winkelItem::class);
    }

    public function bestellingen()
    {
    	return $this->hasMany(bestellingen::class);
    }
}
