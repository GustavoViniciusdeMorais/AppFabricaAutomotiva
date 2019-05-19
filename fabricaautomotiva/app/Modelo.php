<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    //
    public function marca(){
    	return $this->belongsTo('App\Marca');
    }
    public function carro(){
    	return $this->hasMany('App\Carro');
    }
}
