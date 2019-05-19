<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carro;
use App\Venda;
use Session;

class VendaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        // means that only authenticated users can access
        // and guest means only guests can access
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vendas = Venda::all()->sortByDesc("id");
        return view('vendas.index')->withVendas($vendas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function formulario($id){
        $carro = Carro::find($id);
        // Desconto de 7 % na marca Hyundai
        $valorSemDesconto = $carro->valor;
        $desconto = 0;
        if($carro->marca->nome == 'Hyundai' && $carro->cor->nome != 'Preto'){
            $carro->valor = $carro->valor - ($carro->valor * 7) / 100;
            $desconto = ($carro->valor * 7) / 100;
        }
        return view('vendas.formulario')->withCarro($carro)->withValorSemDesconto($valorSemDesconto)->withDesconto($desconto);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $this->validate($request, array(
            'carro_id' => 'required|integer',
            'user_id' => 'required|integer',
            'valor' => 'required|max:255',
            'desconto' => 'required|max:255',
            'RodaLigaLeve' => 'sometimes|max:255'
        ));

        $venda = new Venda;
        $venda->carro_id = $request->carro_id;
        $venda->user_id = $request->user_id;
        $venda->valor = strval(substr(str_replace(['.',','],'',$request->valor),0,5));
        $venda->RodaLigaLeve = ($request->RodaLigaLeve == 'sim') ? true : false;
        $venda->desconto = strval(substr(str_replace(['.',','],'',$request->desconto),0,-2));

        $venda->save();

        Session::flash('success', 'Venda realizada com sucesso!!');

        $vendas = Venda::all()->sortByDesc("id");
        return view('vendas.index')->withVendas($vendas);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
