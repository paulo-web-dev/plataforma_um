<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Empresas; 
use App\Models\Setores;
use App\Models\SubSetores;
use App\Models\Cargos;
  
class CargosController extends Controller
{   
    public function formCargos($idsubsetor){

        return view('form-cargos',[
            'idsubsetor' => $idsubsetor,
    ]);
    }

    public function cadCargo(Request $request){

        $cargo = new Cargos();
        $cargo->nome = $request->nome;
        $cargo->descricao_tarefa = $request->descricao;
        $cargo->id_subsetor = $request->id_subsetor;
        $cargo->save();
        
        return redirect()->route('info-subsetor', ['id' => $cargo->id_subsetor]); 
    } 

    public function infoCargos($id){
        
        $cargo = Cargos::where('id', $id)->first();
        return view('info-cargo',[
            'cargo' => $cargo,
        ]);

    }

    
    public function updCargo(Request $request){

        $subsetor =  SubSetores::where('id', $request->id)->first();
        $subsetor->nome = $request->nome;
        $subsetor->save();
        
        return redirect()->route('info-cargo', ['id' => $subsetor->id]); 
    } 
}
