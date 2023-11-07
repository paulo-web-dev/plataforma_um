<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DadosSaude;
use App\Models\SegmentoCorporal;


class DadosSaudeController extends Controller
{
    public function formDadosDeSaude($idsubsetor){

        return view('form-dados-de-saude',[
            'idsubsetor' => $idsubsetor,
    ]);
    }

    public function cadDadosDeSaude(Request $request){

        $dado = new DadosSaude();
        $dado->id_subsetor = $request->idsubsetor;
        $dado->titulo = $request->titulo;
        $dado->sim = $request->sim;
        $dado->nao = $request->nao;
        $dado->save();
        
        $segmento = new SegmentoCorporal();
        $segmento->id_dados_saude = $dado->id;
        $segmento->coluna_cervical = $request->coluna_cervical;
        $segmento->coluna_toracica = $request->coluna_toracica;
        $segmento->coluna_lombar = $request->coluna_lombar;
        $segmento->ombro = $request->ombro;
        $segmento->cotovelo = $request->cotovelo;
        $segmento->punho_mao = $request->punho_mao;
        $segmento->quadril = $request->quadril;  
        $segmento->joelho = $request->joelho;
        $segmento->tornozelo = $request->tornozelo;
        $segmento->save();
        return redirect()->route('info-subsetor', ['id' => $dado->id_subsetor]);  
    }

    public function infoDadosDeSaude(DadosSaude $dado){

        $segmento = SegmentoCorporal::where('id_dados_saude', $dado->id)->first();
       
        return view('info-dados-de-saude',[
            'dado' => $dado,
            'segmento' => $segmento,
    ]);
    }

    public function updDadosDeSaude(Request $request){
        
        $dado = DadosSaude::where('id', $request->id)->first();
        $dado->sim = $request->sim;
        $dado->titulo = $request->titulo;
        $dado->nao = $request->nao;
        $dado->save();
        $segmento = SegmentoCorporal::where('id_dados_saude', $dado->id)->first();
        $segmento->coluna_cervical = $request->coluna_cervical;
        $segmento->coluna_toracica = $request->coluna_toracica;
        $segmento->coluna_lombar = $request->coluna_lombar;
        $segmento->ombro = $request->ombro;
        $segmento->cotovelo = $request->cotovelo;
        $segmento->punho_mao = $request->punho_mao;
        $segmento->quadril = $request->quadril;  
        $segmento->joelho = $request->joelho;
        $segmento->tornozelo = $request->tornozelo;
        $segmento->save();
        
        return redirect()->route('info-subsetor', ['id' => $dado->id_subsetor]);  
    }

    public function delete($id){
        DadosSaude::destroy($id);
        return back();
    }
}
