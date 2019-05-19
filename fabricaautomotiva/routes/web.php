<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@getIndex');
//Route::get('marcas', 'MarcasController@create');

// Marcas
Route::resource('marcas', 'MarcaController');

// Carros
Route::resource('carros','CarroController');
Route::get('carros/{id}/deletar', ['as' => 'carros.deletar', 'uses' => 'CarroController@deletar']);
//Route::post('carros/buscar', 'CarroController@buscar')->name('carros.buscar');
//Route::post('carros/setpreco', 'CarroController@setPreco')->name('carros.setpreco');

// Cores
Route::resource('cors','CorController');

// Venda
Route::get('vendas/{id}/formulario', ['as' => 'vendas.formulario', 'uses' => 'VendaController@formulario']);
Route::resource('vendas', 'VendaController');

// Regras
Route::post('regras/carregaropcoes', 'RegrasController@buscarCores')->name('regras.carregaropcoes');
Route::post('regras/setpreco', 'RegrasController@setPreco')->name('regras.setpreco');
Route::post('regras/compra', 'RegrasController@compra')->name('regras.compra');

// Autenticacao
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
