<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas; 
use App\Models\Setores;
use App\Models\SubSetores;
use App\Models\Cargos;
use App\Models\DadosOrganizacionais;
use App\Models\Caracteristicas;
use App\Models\PreDiagnostico;
use App\Models\MooreGarg;
use App\Models\Owas;
use App\Models\SueRodgers;
use App\Models\Niosh;

class NioshController extends Controller
{
    public function formNiosh($idsubsetor){
        
        return view('form-niosh',[
            'id_subsetor' => $idsubsetor,
    ]);
    }

    public function cadNiosh(Request $request){

       
        $niosh = new Niosh();
        $niosh->id_subsetor = $request->id_subsetor;
        $niosh->fdh = $request->fdh;
        $niosh->fav = $request->fav;
        $niosh->fdc = $request->fdc;
        $niosh->frlt = $request->frlt;
        $niosh->ffl = $request->ffl;
        $niosh->fqpc = $request->fqpc;
        $niosh->peso = $request->peso;
        $niosh->atividade = $request->atividade;
        $niosh->save();

        return redirect()->route('info-subsetor', ['id' => $niosh->id_subsetor]); 
    } 

    public function infoNiosh($id){
        
        $niosh = Niosh::where('id', $id)->first();
       
        return view('info-niosh',[
            'niosh' => $niosh,
        ]);

    }

    
    public function updNiosh(Request $request){

        $niosh =  Niosh::where('id', $request->id)->first();
        $niosh->fdh = $request->fdh;
        $niosh->fav = $request->fav;
        $niosh->fdc = $request->fdc;
        $niosh->frlt = $request->frlt;
        $niosh->ffl = $request->ffl;
        $niosh->fqpc = $request->fqpc;
        $niosh->peso = $request->peso;
        $niosh->atividade = $request->atividade;
        $niosh->save();
        
        
        return redirect()->route('info-subsetor', ['id' => $niosh->id_subsetor]); 
    } 
}
