<?php

namespace bestelServer;

use Illuminate\Database\Eloquent\Model;

class WinkelItem extends Model
{
	protected $fillable = ['naam', 'prijs'];
    public function winkel()
    {
    	return $this->belongsTo(Winkel::class);
    }
}
