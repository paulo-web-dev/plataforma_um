<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empresas; 
use App\Models\Setores;
use App\Models\SubSetores;
use App\Models\Cargos;
use App\Models\DadosOrganizacionais;

class DadosOrganizacionaisController extends Controller
{
    public function formDadosOrganizacionais($idsubsetor){

        return view('form-dados-organizacionais',[
            'idsubsetor' => $idsubsetor,
        ]);

    }

    public function cadDadosOrganizacionais(Request $request){

        $dados = new DadosOrganizacionais();
        $dados->id_subsetor = $request->id_subsetor;
        $dados->dado = $request->dado;
        $dados->save();

        return redirect()->route('info-subsetor', ['id' => $dados->id_subsetor]); 
       

    }


    public function infoDadosOrganizacionais($id){

        $dado = DadosOrganizacionais::where('id', $id)->first();

        return view('info-dados-organizacionais',[
            'dado' => $dado,
        ]);
    }

    public function updDadosOrganizacionais(Request $request){

        $dados = DadosOrganizacionais::where('id', $request->id)->first();
        $dados->dado = $request->dado;
        $dados->save();

        return redirect()->route('info-dadosorganizacionais', ['id' => $dados->id]);
       

    }
}
