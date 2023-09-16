<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas; 
use App\Models\Setores;
use App\Models\SubSetores;
use App\Models\Cargos;
use App\Models\DadosOrganizacionais;
use App\Models\Caracteristicas;

class CaracteristicasController extends Controller
{
    public function formCaracteristicas($idsubsetor){

        return view('form-caracteristicas',[
            'id_subsetor' => $idsubsetor,
    ]);
    }

    public function cadCaracteristicas(Request $request){

        $caracteristicas = new Caracteristicas();
        $caracteristicas->titulo = $request->titulo;
        $caracteristicas->descricao = $request->descricao;
        $caracteristicas->id_subsetor = $request->id_subsetor;
        $caracteristicas->save();
        
        return redirect()->route('info-subsetor', ['id' => $caracteristicas->id_subsetor]); 
    } 

    public function infoCaracteristicas($id){
        
        $caracteristica = Caracteristicas::where('id', $id)->first();
        return view('info-caracteristica',[
            'caracteristica' => $caracteristica,
        ]);

    }

    
    public function updCaracteristicas(Request $request){

        $caracteristicas =  Caracteristicas::where('id', $request->id)->first();
        $caracteristicas->titulo = $request->titulo;
        $caracteristicas->descricao = $request->descricao;
        $caracteristicas->save();
        
        
        return redirect()->route('info-caracteristicas', ['id' => $caracteristicas->id]);
    } 
}
