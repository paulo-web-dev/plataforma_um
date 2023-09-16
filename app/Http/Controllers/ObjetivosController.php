<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Objetivos;

class ObjetivosController extends Controller
{
    public function formObjetivo($idempresa){

        return view('form-objetivo',[
            'id_empresa' => $idempresa,
    ]);
    } 

    public function cadObjetivo(Request $request){

        $objetivo = new Objetivos();
        $objetivo->objetivo = $request->objetivo;
        $objetivo->id_empresa = $request->id_empresa;
        $objetivo->save();
        
        return redirect()->route('infoempresa', ['id' => $objetivo->id_empresa]); 
    } 

    public function infoObjetivo($id){
        
        $objetivo = Objetivos::where('id', $id)->first();
        return view('info-objetivo',[
            'objetivo' => $objetivo,
        ]);

    }

    
    public function updObjetivo(Request $request){

        $objetivo =  Objetivos::where('id', $request->id)->first();
        $objetivo->objetivo = $request->objetivo;
        $objetivo->save();
        
        return redirect()->route('infoempresa', ['id' => $objetivo->id_empresa]); 
    } 
}
