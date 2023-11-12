<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas; 
use App\Models\AnaliseGlobal;

class AnaliseGlobalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formAnaliseGlobal($idempresa){

        return view('form-analise',[
            'id_empresa' => $idempresa,
    ]);
    }

    public function cadAnaliseGlobal(Request $request){

        $analise = new AnaliseGlobal();
        $analise->analise = $request->analise;
        $analise->id_empresa = $request->id_empresa;
        $analise->save();
        
        return redirect()->route('infoempresa', ['id' => $analise->id_empresa]); 
    } 

    public function infoAnaliseGlobal(AnaliseGlobal $analise){
        
     
        return view('info-analise',[
            'analise' => $analise,
        ]);

    }

    
    public function updAnaliseGlobal(Request $request){

        $analise =  AnaliseGlobal::where('id', $request->id)->first();
        $analise->analise = $request->analise;
        $analise->save();
        
        return redirect()->route('infoempresa', ['id' => $analise->id_empresa]); 
    }
    
    public function delete($id){
        AnaliseGlobal::destroy($id);
        return back();
    }
}
