<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preco extends Model
{
    //
    public function cor(){
    	return $this->belongsTo('App\Cor');
    }
}
