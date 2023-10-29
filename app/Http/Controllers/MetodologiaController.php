<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metodologia;

class MetodologiaController extends Controller
{
    public function formMetodologia($idempresa){

        return view('form-metodologia',[
            'id_empresa' => $idempresa,
    ]);
    }

    public function cadMetodologia(Request $request){

        $metodologia = new Metodologia ();
        $metodologia->metodologia = $request->metodologia;
        $metodologia->id_empresa = $request->id_empresa;
        $metodologia->save();
        
        return redirect()->route('infoempresa', ['id' => $metodologia->id_empresa]); 
    } 

    public function infoMetodologia($id){
        
        $metodologia = Metodologia::where('id', $id)->first();
        return view('info-metodologia',[
            'metodologia' => $metodologia,
        ]);

    }

    
    public function updMetodologia(Request $request){

        $metodologia =  Metodologia::where('id', $request->id)->first();
        $metodologia->metodologia = $request->metodologia;
        $metodologia->save();
        
        return redirect()->route('infoempresa', ['id' => $metodologia->id_empresa]); 
    } 

    
    public function delete($id){
        Metodologia::destroy($id);
        return back();
    }
}
