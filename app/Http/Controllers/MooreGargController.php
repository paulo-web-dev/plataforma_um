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
use App\Models\Conclusoes;


class MooreGargController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formMoore($idsubsetor){
        
        return view('form-moore',[
            'id_subsetor' => $idsubsetor,
    ]);
    }

    public function formMooreSimplificado($idsubsetor){
        
        return view('form-moore-simplificado',[
            'id_subsetor' => $idsubsetor,
    ]);
    }

    public function cadMoore(Request $request){

    
        $moore = new MooreGarg();
        $moore->id_subsetor = $request->id_subsetor;
        $moore->fit = $request->fit;
        $moore->fde = $request->fde;
        $moore->ffe	 = $request->ffe;
        $moore->fpmp = $request->fpmp;
        $moore->fri = $request->frt;
        $moore->fdt	 = $request->fdt;
        $moore->atividade = $request->atividade;
        $moore->save();
        
        
        return redirect()->route('info-subsetor', ['id' => $moore->id_subsetor])->with('secao', 'moore'); 
    } 



    public function infoMoore($id){
        
        $moore = MooreGarg::where('id', $id)->first();
       
        return view('info-moore',[
            'moore' => $moore,
        ]);

    }

    
    public function updMoore(Request $request){

        $moore =  MooreGarg::where('id', $request->id)->first();
        $moore->fit = $request->fit;
        $moore->fde = $request->fde;
        $moore->ffe	 = $request->ffe;
        $moore->fpmp = $request->fpmp;
        $moore->fri = $request->frt;
        $moore->fdt	 = $request->fdt;
        $moore->atividade = $request->atividade;
        $moore->save();
        
        
        return redirect()->route('info-subsetor', ['id' => $moore->id_subsetor])->with('secao', 'moore');  
    } 

    public function delete($id){
        MooreGarg::destroy($id);
        return back()->with('secao', 'moore'); 
    }
}

