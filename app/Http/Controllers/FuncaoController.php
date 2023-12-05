<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Setores;
use App\Models\Funcao;
use App\Models\Mapeamento;
use App\Models\PlanoDeAcao;
use Auth;
class FuncaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formFuncao($id_subsetor){

        return view('form-funcao',[
            'id_subsetor' => $id_subsetor,
    ]);
    } 

    public function cadFuncao(Request $request){

        $funcao = new Funcao();
        $funcao->funcao = $request->funcao;
        $funcao->id_subsetor = $request->id_subsetor;
        $funcao->save();
        
        return redirect()->route('info-subsetor', ['id' => $funcao->id_subsetor])->with('secao', 'função'); 
    } 

    public function infoFuncao($id){
        
        $funcao = Funcao::where('id', $id)->first();
        return view('info-funcao',[
            'funcao' => $funcao,
        ]);

    }

    
    public function updFuncao(Request $request){

        $funcao =  Funcao::where('id', $request->id)->first();
        $empresas = Empresas::where('id_user', Auth::user()->id_instituicao)->get();
        $idsEmpresas = $empresas->pluck('id');
        $mapeamentos = Mapeamento::whereIn('id_empresa', $idsEmpresas)
        ->where('funcao', $funcao->funcao)
        ->get();
        $planos = PlanoDeAcao::whereIn('id_empresa', $idsEmpresas)
        ->where('funcao', $funcao->funcao)
        ->get();
        foreach ($mapeamentos as $key => $mapeamento) {
            $mapeamento->funcao = $request->funcao;
            $mapeamento->save();
        }

        foreach ($planos as $key => $plano) {
            $plano->funcao = $request->funcao;
            $plano->save();
        }
        $funcao->funcao = $request->funcao;
        $funcao->save();
        
        return redirect()->route('info-subsetor', ['id' => $funcao->id_subsetor])->with('secao', 'função'); 
    } 

    public function delete($id){
        Funcao::destroy($id);
        return back()->with('secao', 'função'); ;
    }
}
