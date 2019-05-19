<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carro;

class PagesController extends Controller
{
    //

	public function getIndex(){
		$carros = Carro::all();
		return view('pages.welcome')->withCarros($carros);
	}

}
