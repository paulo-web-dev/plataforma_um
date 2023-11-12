<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Equipe;
class EquipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formEquipe($idempresa){

        return view('form-equipe',[
            'id_empresa' => $idempresa,
    ]);
    } 

    public function cadEquipe(Request $request){

        $equipe = new Equipe();
        $equipe->equipe = $request->equipe;
        $equipe->id_empresa = $request->id_empresa;
        $equipe->save();
        
        return redirect()->route('infoempresa', ['id' => $equipe->id_empresa]); 
    } 

    public function infoEquipe($id){
        
        $equipe = Equipe::where('id', $id)->first();
        return view('info-equipe',[
            'equipe' => $equipe,
        ]);

    }

    
    public function updEquipe(Request $request){

        $equipe =  Equipe::where('id', $request->id)->first();
        $equipe->equipe = $request->equipe;
        $equipe->save();
        
        return redirect()->route('infoempresa', ['id' => $equipe->id_empresa]); 
    } 

    public function delete($id){
        Equipe::destroy($id);
        return back();
    }
}
