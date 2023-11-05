<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DadosSaude;


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

        return redirect()->route('info-subsetor', ['id' => $dado->id_subsetor]);  
    }

    public function infoDadosDeSaude(DadosSaude $dado){

        return view('info-dados-de-saude',[
            'dado' => $dado,
    ]);
    }

    public function updDadosDeSaude(Request $request){
        
        $dado = DadosSaude::where('id', $request->id)->first();
        $dado->sim = $request->sim;
        $dado->titulo = $request->titulo;
        $dado->nao = $request->nao;
        $dado->save();

        return redirect()->route('info-subsetor', ['id' => $dado->id_subsetor]);  
    }

    public function delete($id){
        DadosSaude::destroy($id);
        return back();
    }
}
