<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Carro;
use App\Cor;
use App\Marca;
use App\Venda;
use App\Modelo;
use Session;
use Image;
use Storage;

class CarroController extends Controller
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
        $carros = Carro::all()->sortByDesc("id");
        return view('carros.index')->withCarros($carros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cores = Cor::all();
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $years = array_combine(range(date("Y"), 1980), range(date("Y"), 1980));
        return view('carros.create')->withCores($cores)->withMarcas($marcas)->withModelos($modelos)->withYears($years);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        $this->validate($request, array(
            'modelo_id' => 'required|integer',
            'marca_id' => 'required|integer',
            'cor_id' => 'required|integer',
            'ano' => 'required|integer',
            'valor' => 'required|max:255',
            'imagem' => 'sometimes|image'
        ));
        $carro = new Carro;
        $carro->modelo_id = $request->modelo_id;
        $carro->valor = strval(substr(str_replace(['.',','],'',$request->valor),0,5));
        $carro->ano = $request->ano;
        $carro->marca_id = $request->marca_id;
        $carro->cor_id = $request->cor_id;

        // salvar imagem
        if($request->hasFile('imagem')){
            $image = $request->file('imagem');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            // $image->encode('png');
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(260, 160)->save($location);

            $carro->foto = $filename;
        }

        $carro->save();

        Session::flash('success', 'Carro cadastrado!');

        return view('carros.show')->withCarro($carro);
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
        $carro = Carro::find($id);
        //dd($carro);
        return view('carros.show')->withCarro($carro);
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
        $carro = Carro::find($id);

        $marcas = Marca::all();
        $marcas2 = [];
        foreach ($marcas as $marca) {
            $marcas2[$marca->id] = $marca->nome;
        }

        $cores = $carro->marca->cors;
        $cores2 = [];
        foreach ($cores as $cor) {
            $cores2[$cor->id] = $cor->nome;
        }

        $modelos = [];
        foreach($carro->marca->modelos as $modelo){
            $modelos[$modelo->id] = $modelo->nome;
        }

        $years = array_combine(range(date("Y"), 1980), range(date("Y"), 1980));

        return view('carros.edit')->withCarro($carro)->withMarcas($marcas2)->withCores($cores2)->withYears($years)->withModelos($modelos);
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
        $carro = Carro::find($id);
        $this->validate($request, array(
            'modelo_id' => 'required|integer',
            'marca_id' => 'required|integer',
            'cor_id' => 'required|integer',
            'ano' => 'required|integer',
            'valor' => 'required|max:255',
            'imagem' => 'sometimes|image'
        ));
        $carro->modelo_id = $request->modelo_id;
        $carro->marca_id = $request->marca_id;
        $carro->cor_id = $request->cor_id;
        $carro->ano = $request->ano;
        //$carro->valor = $request->valor;
        $carro->valor = strval(substr(str_replace(['.',','],'',$request->valor),0,5));

        // salvar imagem
        if($request->hasFile('imagem')){
            $image = $request->file('imagem');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            // $image->encode('png');
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(260, 160)->save($location);

            $imagemVelha = $carro->foto;

            $carro->foto = $filename;

            // deletar imagem antiga
            Storage::delete($imagemVelha);
        }

        $carro->save();

        Session::flash('success', 'Os dados do carro foram atualizados com sucesso!');
        return redirect()->route('carros.show', $carro->id);

    }

    public function deletar($id){
        $carro = Carro::find($id);
        return view('carros.deletar')->withCarro($carro);
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
        $carro = Carro::find($id);
        $carro->delete();
        Storage::delete($carro->foto);
        Session::flash('success', 'Carro deletado com sucesso!');

        $carros = Carro::all()->sortByDesc("id");
        return view('carros.index')->withCarros($carros);
    }

}
