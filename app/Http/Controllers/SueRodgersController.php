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

class SueRodgersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formSueRodgers($idsubsetor){
        
        return view('form-suerodgers',[
            'id_subsetor' => $idsubsetor,
    ]);
    }

    public function cadSueRodgers(Request $request){

        function makearray($nivelesforco, $tempoesforco, $esfocominuto){
            return '['.$nivelesforco.', '.$tempoesforco.', '.$esfocominuto.']';
        }
       
        $sue = new SueRodgers();
        $sue->id_subsetor = $request->id_subsetor;
        $sue->pescoco = makearray($request->pescoco_ne, $request->pescoco_te, $request->pescoco_em);
        $sue->ombro = makearray($request->ombro_ne, $request->ombro_te, $request->ombro_em);
        $sue->tronco = makearray($request->tronco_ne, $request->tronco_te, $request->tronco_em);
        $sue->braco = makearray($request->braco_ne, $request->braco_te, $request->braco_em);
        $sue->mao_punho_dedo = makearray($request->mpd_ne, $request->mpd_te, $request->mpd_em);
        $sue->perna_pe_dedo = makearray($request->ppd_ne, $request->ppd_te, $request->ppd_em);
        $sue->atividade = $request->atividade;
        $sue->save();
            
        return redirect()->route('info-subsetor', ['id' => $sue->id_subsetor]); 
    } 

    public function infoSueRodgers($id){
        
        $sue = SueRodgers::where('id', $id)->first();
        $pescoco = json_decode($sue->pescoco);
        $ombro = json_decode($sue->ombro);
        $tronco = json_decode($sue->tronco);
        $braco = json_decode($sue->braco);
        $mao_punho_dedo = json_decode($sue->mao_punho_dedo);
        $perna_pe_dedo = json_decode($sue->perna_pe_dedo);
        return view('info-suerodgers',[
            'sue' => $sue,
            'pescoco' => $pescoco,
            'ombro' => $ombro,
            'tronco' => $tronco,
            'braco' => $braco,
            'mao_punho_dedo' => $mao_punho_dedo,
            'perna_pe_dedo' => $perna_pe_dedo,
        ]);

    }

    
    public function updSueRodgers(Request $request){

        function makearray($nivelesforco, $tempoesforco, $esfocominuto){
            return '['.$nivelesforco.', '.$tempoesforco.', '.$esfocominuto.']';
        }
        $sue =  SueRodgers::where('id', $request->id)->first();
        $sue->pescoco = makearray($request->pescoco_ne, $request->pescoco_te, $request->pescoco_em);
        $sue->ombro = makearray($request->ombro_ne, $request->ombro_te, $request->ombro_em);
        $sue->tronco = makearray($request->tronco_ne, $request->tronco_te, $request->tronco_em);
        $sue->braco = makearray($request->braco_ne, $request->braco_te, $request->braco_em);
        $sue->mao_punho_dedo = makearray($request->mpd_ne, $request->mpd_te, $request->mpd_em);
        $sue->perna_pe_dedo = makearray($request->ppd_ne, $request->ppd_te, $request->ppd_em);
        $sue->atividade = $request->atividade;
        $sue->save();
            
        return redirect()->route('info-subsetor', ['id' => $sue->id_subsetor]); 
         
    } 

            
    public function delete($id){
        SueRodgers::destroy($id);
        return back();
    }
}
