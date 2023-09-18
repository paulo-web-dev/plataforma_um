<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Responsaveis;

class ReponsaveisController extends Controller
{
    public function formResponsaveis($id_empresa){

        return view('form-responsaveis',[
            'id_empresa' => $id_empresa,
    ]);
    }

    public function cadResponsaveis(Request $request){

        $responsavel = new Responsaveis();
        $responsavel->nome = $request->nome;
        $responsavel->cargo = $request->cargo;
        $responsavel->identidade_trabalho = $request->identidade_trabalho;
        $responsavel->id_empresa = $request->id_empresa;
        $responsavel->save();
        
        return redirect()->route('infoempresa', ['id' => $responsavel->id_empresa]); 
    } 

    public function infoResponsaveis($id){
        
        $responsavel = Responsaveis::where('id', $id)->first();
        return view('info-responsaveis',[
            'responsavel' => $responsavel,
        ]);

    }

    
    public function updResponsaveis(Request $request){

        $responsavel =  Responsaveis::where('id', $request->id)->first();
        $responsavel->nome = $request->nome;
        $responsavel->cargo = $request->cargo;
        $responsavel->identidade_trabalho = $request->identidade_trabalho;
        $responsavel->save();
        
        return redirect()->route('infoempresa', ['id' => $responsavel->id_empresa]);
    } 
}
