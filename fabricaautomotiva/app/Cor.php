<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cor extends Model
{
    //
    public function carro(){
    	return $this->hasMany('App\Carro');
    }
    public function marcas(){
    	return $this->belongsToMany('App\Marca', 'cor_marca');
    }
    public function preco(){
    	return $this->hasMany('App\Preco');
    }
}
