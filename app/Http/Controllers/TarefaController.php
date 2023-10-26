<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Setores;
use App\Models\Tarefa;
class TarefaController extends Controller
{
    public function formTarefa($id_subsetor){

        return view('form-tarefa',[
            'id_subsetor' => $id_subsetor,
    ]);
    } 

    public function cadTarefa(Request $request){

        $tarefa = new Tarefa();
        $tarefa->tarefa = $request->tarefa;
        $tarefa->id_subsetor = $request->id_subsetor;
        $tarefa->save();
        
        return redirect()->route('info-subsetor', ['id' => $tarefa->id_subsetor]); 
    } 

    public function infoTarefa($id){
        
        $tarefa = Tarefa::where('id', $id)->first();
        return view('info-tarefa',[
            'tarefa' => $tarefa,
        ]);

    }

    
    public function updTarefa(Request $request){

        $tarefa =  Tarefa::where('id', $request->id)->first();
        $tarefa->tarefa = $request->tarefa;
        $tarefa->save();
        
        return redirect()->route('info-subsetor', ['id' => $tarefa->id_subsetor]); 
    } 
}
