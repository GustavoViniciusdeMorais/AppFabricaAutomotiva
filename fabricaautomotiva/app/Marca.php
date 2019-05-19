<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Marca extends Model
{
    //
    public function carro(){
    	return $this->hasMany('App\Carro');
    }
    public function cors(){
    	return $this->belongsToMany('App\Cor');
    }
    public function modelos(){
    	return $this->hasMany('App\Modelo');
    }
}
