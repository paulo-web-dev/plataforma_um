<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Setores;
use App\Models\Area;
use App\Models\Mapeamento;
use App\Models\PlanoDeAcao;
use Auth;
class SetoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formSetores($idempresa){

        $areas = Area::where('id_empresa', $idempresa)->get();
        return view('form-setores',[
            'id_empresa' => $idempresa,
            'areas' => $areas,
    ]);
    }

    public function cadSetor(Request $request){

        $setor = new Setores();
        $setor->nome = $request->nome;
        $setor->id_area = $request->area;
        $setor->descricao = $request->descricao;
        $setor->id_empresa = $request->id_empresa;
        $setor->save();
        
        return redirect()->route('infoempresa', ['id' => $setor->id_empresa]); 
    } 

    public function infoSetores($id){
        
        $setor = Setores::where('id', $id)->with('subsetores')->first();
        $areas = Area::where('id_empresa', $setor->id_empresa)->get();
        $area = Area::where('id', $setor->id_area)->first();
        return view('info-setor',[
            'setor' => $setor,
            'areas' => $areas,
            'area' => $area, 
        ]);

    }

    
    public function updSetor(Request $request){

        $setor =  Setores::where('id', $request->id)->first();
        $empresas = Empresas::where('id_user', Auth::user()->id_instituicao)->get();
        $idsEmpresas = $empresas->pluck('id');

        $mapeamentos = Mapeamento::whereIn('id_empresa', $idsEmpresas)
        ->where('setor', $setor->nome)
        ->get();
        $planos = PlanoDeAcao::whereIn('id_empresa', $idsEmpresas)
        ->where('setor', $setor->nome)
        ->get();
        foreach ($mapeamentos as $key => $mapeamento) {
            $mapeamento->setor = $request->nome;
            $mapeamento->save();
        }

        foreach ($planos as $key => $plano) {
            $plano->setor = $request->nome;
            $plano->save();
        }
        $setor->nome = $request->nome;
        $setor->id_area = $request->area;
        $setor->descricao = $request->descricao;
        $setor->save();
        
        return redirect()->route('info-setor', ['id' => $setor->id]); 
    } 
    
        
    public function delete($id){
        Setores::destroy($id);
        return back();
    }
}
