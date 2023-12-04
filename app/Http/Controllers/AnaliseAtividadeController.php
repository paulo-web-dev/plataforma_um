<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Setores;
use App\Models\AnaliseAtividade;

class AnaliseAtividadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formAnaliseAtividade($id_subsetor){

        return view('form-analise-atividade',[
            'id_subsetor' => $id_subsetor,
    ]);
    } 

    public function cadAnaliseAtividade(Request $request){

        $analise = new AnaliseAtividade();
        $analise->analise = $request->analise;
        $analise->id_subsetor = $request->id_subsetor;
        $analise->save();
        
        return redirect()->route('info-subsetor', ['id' => $analise->id_subsetor])->with('secao', 'analise-atividade'); 
    } 

    public function infoAnaliseAtividade($id){
        
        $analise = AnaliseAtividade::where('id', $id)->first();
        return view('info-analise-atividade',[
            'analise' => $analise,
        ]);

    }

    
    public function updAnaliseAtividade(Request $request){

        $analise =  AnaliseAtividade::where('id', $request->id)->first();
        $analise->analise = $request->analise;
        $analise->save();
        
        return redirect()->route('info-subsetor', ['id' => $analise->id_subsetor])->with('secao', 'analise-atividade'); 
    } 

    public function delete($id){
        AnaliseAtividade::destroy($id);
        return back()->with('secao', 'analise-atividade');
    }
}
