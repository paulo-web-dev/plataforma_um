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

class PreDiagnosticoController extends Controller
{
    public function formPreDiagnostico($idsubsetor){

        return view('form-pre-diagnostico',[
            'id_subsetor' => $idsubsetor,
    ]);
    }

    public function cadPreDiagnostico(Request $request){

        $prediagnostico = new PreDiagnostico();
        $prediagnostico->titulo = $request->titulo;
        $prediagnostico->descricao = $request->descricao;
        $prediagnostico->id_subsetor = $request->id_subsetor;
        $prediagnostico->save();
        
        return redirect()->route('info-subsetor', ['id' => $prediagnostico->id_subsetor]); 
    } 

    public function infoPreDiagnostico($id){
        
        $prediagnostico = PreDiagnostico::where('id', $id)->first();

        return view('info-pre-diagnostico',[
            'prediagnostico' => $prediagnostico,
        ]);

    }

    
    public function updPreDiagnostico(Request $request){

        $prediagnostico =  PreDiagnostico::where('id', $request->id)->first();
        $prediagnostico->titulo = $request->titulo;
        $prediagnostico->descricao = $request->descricao;
        $prediagnostico->save();
        
        
        return redirect()->route('info-pre-diagnosticos', ['id' => $prediagnostico->id]);  
    } 
}
