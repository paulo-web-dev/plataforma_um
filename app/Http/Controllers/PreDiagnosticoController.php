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

                     
        $titulos = $request->input('titulo', []);
        $descricoes = $request->input('descricao', []);
        $id_subsetor = $request->input('id_subsetor');
        $atributos = count($titulos);
     
        for ($i=0; $i < $atributos ; $i++) {   
            $prediagnostico = new PreDiagnostico();
            $prediagnostico->titulo = $titulos[$i];
            $prediagnostico->descricao = $descricoes[$i];
            $prediagnostico->id_subsetor = $id_subsetor;
            $prediagnostico->save();
        }
        
        return redirect()->route('info-subsetor', ['id' => $id_subsetor])->with('secao', 'pre-diagnosticos'); 
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
        
        
        return redirect()->route('info-pre-diagnosticos', ['id' => $prediagnostico->id])->with('secao', 'pre-diagnosticos');  
    } 

    public function delete($id){
        PreDiagnostico::destroy($id);
        return back();
    }
}
