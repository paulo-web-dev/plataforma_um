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
use App\Models\Rula;
class RulaController extends Controller
{
    public function formRula($idsubsetor){
        
        return view('form-rula',[
            'id_subsetor' => $idsubsetor,
    ]);
    }

    
    public function cadRula(Request $request){

        function ison($switch){
           if($switch == 'on'){
            return 1;
           }else{
            return 0;
           }
        }
        $rula = new Rula();
        $rula->id_subsetor = $request->id_subsetor;
        $rula->braco = $request->braco;
        $rula->braco_desvio = ison($request->braco_desvio);
        $rula->antebraco = $request->antebraco;
        $rula->antebraco_desvio = ison($request->antebraco_desvio);
        $rula->punho = $request->punho;
        $rula->punho_desvio = ison($request->punho_desvio);
        $rula->pescoco = $request->pescoco;
        $rula->pescoco_desvio = ison($request->pescoco_desvio);
        $rula->tronco = $request->tronco;
        $rula->tronco_desvio = ison($request->tronco_desvio);
        $rula->perna = $request->pernas;
        $rula->atividade = $request->atividade;

        $rula->save();
             
        
        return redirect()->route('info-subsetor', ['id' => $rula->id_subsetor])->with('secao', 'rula'); 
    } 

    public function infoRula($id){
        
        $rula = Rula::where('id', $id)->first();
   
        return view('info-rula',[
            'rula' => $rula,
        ]);

    }

    

    
    public function updRula(Request $request){

        function ison($switch){
            if($switch == 'on'){
             return 1;
            }else{
             return 0;
            }
         }
     
        $rula =  Rula::where('id', $request->id)->first();
       
        $rula->braco = $request->braco;
        $rula->braco_desvio = ison($request->braco_desvio);
        $rula->antebraco = $request->antebraco;
        $rula->antebraco_desvio = ison($request->antebraco_desvio);
        $rula->punho = $request->punho;
        $rula->punho_desvio = ison($request->punho_desvio);
        $rula->pescoco = $request->pescoco;
        $rula->pescoco_desvio = ison($request->pescoco_desvio);
        $rula->tronco = $request->tronco;
        $rula->tronco_desvio = ison($request->tronco_desvio);
        $rula->perna = $request->pernas;
        $rula->atividade = $request->atividade;
        $rula->save();
        
        
        return redirect()->route('info-subsetor', ['id' => $rula->id_subsetor])->with('secao', 'rula');  
    } 
    
    
    public function delete($id){
        Rula::destroy($id);
        return back();
    }
} 
