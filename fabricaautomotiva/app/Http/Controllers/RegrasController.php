<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carro;
use App\Cor;
use App\Marca;
use Session;

class RegrasController extends Controller
{
    public function buscarCores(Request $request){

        $marca = Marca::find($request->marcaid);

        $output = '<option value="" selected="true" disabled="disabled">Selecione uma cor da marca '.$marca->nome.'</option>';

        $modelos = '<option value="" selected="true" disabled="disabled">Selecione um modelo da marca '.$marca->nome.'</option>';

        foreach($marca->cors as $cor){
            $output .= '<option value="'.$cor->id.'">'.$cor->nome.'</option>';
        }
        
        foreach($marca->modelos as $modelo){
            $modelos .= '<option value="'.$modelo->id.'">'.$modelo->nome.'</option>';
        }

        return response()->json(['html' => $output, 'modelos' => $modelos]);
        //return response()->json(['success'=>'Marca id: '.$request->marcaid]);
    }

    public function setPreco(Request $request){
        $cor = Cor::find($request->corid);
        //$preco = print_r($cor->preco[0]->valor,true);
        //$preco = print_r($cor,true);
        $preco = number_format($cor->preco[0]->valor, 2, ',', '.');
        //$output = '<input type="text" value="'.$preco.'">';
        return response()->json(['preco' => $preco]);
    }

    public function compra(Request $request){

        $carro = Carro::find($request->carroid);
        $valor = $carro->valor;

        // Cobrar o valor das Rodas Liga Leve
        if($request->rodaLigaLeve == 'sim' && $request->marca == 'Fiat'){
            $valor = $carro->valor + 2400;
        }elseif ($request->rodaLigaLeve == 'nao' && $request->marca == 'Fiat') {
            $valor = $carro->valor;
        }

        // Desconto de 7 % na marca Hyundai
        if($request->marca == 'Hyundai' && $request->cor != 'Preto'){
            $valor = $carro->valor - ($carro->valor * 7) / 100;
        }
        $valor = number_format($valor, 2, ',', '.');
        //return response()->json(['valorFinal' => $request->marca . ' '. $request->cor . ' ' . $request->rodaLigaLeve . ' ' . $request->carroid]);
        return response()->json(['valorFinal' => $valor]);
    }

}
