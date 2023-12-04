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
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formDadosOrganizacionais($idsubsetor){

        return view('form-dados-organizacionais',[
            'idsubsetor' => $idsubsetor,
        ]);

    }

    public function cadDadosOrganizacionais(Request $request){

        $dados = $request->input('dado', []);
        $id_subsetor = $request->input('id_subsetor');

        foreach ($dados as $dado) {
            $dados = new DadosOrganizacionais();
            $dados->id_subsetor = $id_subsetor;
            $dados->dado = $dado;
            $dados->save();
        }


        return redirect()->route('info-subsetor', ['id' => $id_subsetor])->with('secao', 'caracteristicas'); 
       

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

        return redirect()->route('info-dadosorganizacionais', ['id' => $dados->id])->with('secao', 'caracteristicas');
       

    }

    public function delete($id){
        DadosOrganizacionais::destroy($id);
        return back()->with('secao', 'caracteristicas');
    }
}
