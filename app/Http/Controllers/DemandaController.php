<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Demanda;

class DemandaController extends Controller
{
    public function formDemanda($idempresa){

        return view('form-demanda',[
            'id_empresa' => $idempresa,
    ]);
    }

    public function cadDemanda(Request $request){

        $demanda = new Demanda();
        $demanda->demanda = $request->demanda;
        $demanda->id_empresa = $request->id_empresa;
        $demanda->save();
        
        return redirect()->route('infoempresa', ['id' => $demanda->id_empresa]); 
    } 

    public function infoDemanda(Demanda $demanda){
        
     
        return view('info-demanda',[
            'demanda' => $demanda,
        ]);

    }

    
    public function updDemanda(Request $request){

        $demanda =  Demanda::where('id', $request->id)->first();
        $demanda->demanda = $request->demanda;
        $demanda->save();
        
        return redirect()->route('infoempresa', ['id' => $demanda->id_empresa]); 
    } 

            
    public function delete($id){
        Demanda::destroy($id);
        return back();
    }
}
