<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    //
    public function marca(){
    	return $this->belongsTo('App\Marca');
    }
    public function cor(){
    	return $this->belongsTo('App\Cor');
    }
    public function vendas(){
    	return $this->hasMany('App\Venda');
    }
    public function modelo(){
        return $this->belongsTo('App\Modelo');
    }
}
