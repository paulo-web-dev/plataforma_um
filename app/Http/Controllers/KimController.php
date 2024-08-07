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


class KimController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formKim($idsubsetor){
        
        return view('form-kim',[
            'id_subsetor' => $idsubsetor,
    ]);
    }

    public function cadOwas(Request $request){

    
        $owas = new Owas();
        $owas->id_subsetor = $request->id_subsetor;
        $owas->dorso = $request->dorso;
        $owas->braco = $request->braco;
        $owas->pernas = $request->pernas;
        $owas->carga = $request->carga;
        $owas->atividade = $request->atividade;
        $owas->save();
    
        
        return redirect()->route('info-subsetor', ['id' => $owas->id_subsetor])->with('secao', 'owas'); 
    } 

    public function infoOwas($id){
        
        $owas = Owas::where('id', $id)->first();
   
        return view('info-owas',[
            'owas' => $owas,
        ]);

    }

    
    public function updOwas(Request $request){

        $owas =  Owas::where('id', $request->id)->first();
        $owas->dorso = $request->dorso;
        $owas->braco = $request->braco;
        $owas->pernas = $request->pernas;
        $owas->carga = $request->carga;
        $owas->atividade = $request->atividade;
        $owas->save();
        
        
        return redirect()->route('info-subsetor', ['id' => $owas->id_subsetor])->with('secao', 'owas');  
    } 

        
    public function delete($id){
        Owas::destroy($id);
        return back();
    }
}
