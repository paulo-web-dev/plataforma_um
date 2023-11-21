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
use App\Models\IdentidadeVisual;
use Auth;

class RelatorioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function gerarRelatorio($id){

        $identidade = IdentidadeVisual::where('id_user', $id)->first();
        $alert = 0;
        if(!isset($identidade)){
            $identidade = new IdentidadeVisual();
            $identidade->cor_principal = '#027dc3';
            $identidade->foto_empresa = 'logo_plataforma_um%20(1).jpeg';
            $alert = 1;
        }
       
        $empresa = Empresas::where('id', $id)
        ->with('setores')
        ->with('introducao')
        ->with('equipe')
        ->with('objetivos')
        ->with('disposicao')
        ->with('mapeamento')
        ->with('planodeacao')
        ->with('responsaveis')
        ->with('metodologia')
        ->with('demanda')
        ->with('analise')
        ->with('area')
        ->first();
        return view('relatorio',[
            'empresa' => $empresa,
            'identidade' => $identidade,
            'alert' => $alert,
        ]);

    }
}
