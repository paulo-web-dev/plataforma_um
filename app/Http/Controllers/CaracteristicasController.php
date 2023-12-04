<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas; 
use App\Models\Setores;
use App\Models\SubSetores;
use App\Models\Cargos;
use App\Models\DadosOrganizacionais;
use App\Models\Caracteristicas;

class CaracteristicasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formCaracteristicas($idsubsetor){

        return view('form-caracteristicas',[
            'id_subsetor' => $idsubsetor,
    ]);
    }

    public function cadCaracteristicas(Request $request){

             
        $titulos = $request->input('titulo', []);
        $descricoes = $request->input('descricao', []);
        $id_subsetor = $request->input('id_subsetor');
        $atributos = count($titulos);

        for ($i=0; $i < $atributos ; $i++) {   
            $caracteristicas = new Caracteristicas();
            $caracteristicas->titulo = $titulos[$i];
            $caracteristicas->descricao = $descricoes[$i];
            $caracteristicas->id_subsetor = $id_subsetor;
            $caracteristicas->save();
        }
        return redirect()->route('info-subsetor', ['id' => $id_subsetor])->with('secao', 'caracteristicas-do-ambiente'); 
    } 

    public function infoCaracteristicas($id){
        
        $caracteristica = Caracteristicas::where('id', $id)->first();
        return view('info-caracteristica',[
            'caracteristica' => $caracteristica,
        ]);

    }

    
    public function updCaracteristicas(Request $request){

        $caracteristicas =  Caracteristicas::where('id', $request->id)->first();
        $caracteristicas->titulo = $request->titulo;
        $caracteristicas->descricao = $request->descricao;
        $caracteristicas->save();
        
        
        return redirect()->route('info-caracteristicas', ['id' => $caracteristicas->id])->with('secao', 'caracteristicas-do-ambiente');
    }
    
    public function delete($id){
        Caracteristicas::destroy($id);
        return back()->with('secao', 'caracteristicas-do-ambiente'); ;
    }

    public function alteraordem(Request $request){

        foreach ($request->data as $key => $data) {
            $id = $data['id'];
            $ordenacao = $data['ordenacao'];
            $caracteristica =  Caracteristicas::where('id', $id)->first();
            $caracteristica->ordenacao = $ordenacao;
            $caracteristica->save();
        }
        return "salvo com sucesso";
    }
}
