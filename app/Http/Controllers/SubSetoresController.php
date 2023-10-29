<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Setores;
use App\Models\SubSetores;


class SubSetoresController extends Controller
{
    public function formSubSetores($idsetor){

        return view('form-subsetores',[
            'idsetor' => $idsetor,
    ]);
    }

    public function cadSubSetor(Request $request){

        $subsetor = new SubSetores();
        $subsetor->nome = $request->nome;
        $subsetor->descricao = $request->descricao;
        $subsetor->id_setor = $request->id_setor;
        $subsetor->save();
        
        return redirect()->route('info-setor', ['id' => $subsetor->id_setor]); 
    } 

    public function infoSubSetores($id){

       
       
        $subsetor = SubSetores::where('id', $id)
        ->with('dadosOrganizacionais')
        ->with('cargos')
        ->with('moore')
        ->with('caracteristicas')
        ->with('preDiagnostico')
        ->with('rula')
        ->with('owas')
        ->with('suerodgers')
        ->with('niosh')
        ->with('recomendacao')
        ->with('fotosatividade')
        ->with('populacaosubsetor')
        ->with('dadossaude')
        ->with('analiseAtividade')
        ->with('tarefa')
        ->with('funcao')
        ->first();  
  
        return view('info-subsetores',[
            'subsetor' => $subsetor,
        ]);

    }

    
    public function updSubSetor(Request $request){

        $subsetor =  SubSetores::where('id', $request->id)->first();
        $subsetor->nome = $request->nome;
        $subsetor->descricao = $request->descricao;
        $subsetor->save();
        
        return redirect()->route('info-subsetor', ['id' => $subsetor->id]); 
    }

    public function delete($id){
        SubSetores::destroy($id);
        return back();
    }
}
