<?php

namespace bestelServer;

use Illuminate\Database\Eloquent\Model;

class bestellingen extends Model
{
    public function items()
    {
    	return $this->hasMany(bestelItems::class);
    }
}
