<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    //
    public function carro(){
    	return $this->belongsTo('App\Carro');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
