<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Area;

class AreaController extends Controller
{
    public function formAreas($idempresa){

        return view('form-area',[
            'id_empresa' => $idempresa,
    ]);
    }

    public function cadAreas(Request $request){

        $area = new Area();
        $area->nome = $request->area;
        $area->id_empresa = $request->id_empresa;
        $area->save();
        
        return redirect()->route('infoempresa', ['id' => $area->id_empresa]); 
    } 

    public function infoAreas($id){
        
        $area = Area::where('id', $id)->with('setores')->first();
        return view('info-area',[
            'area' => $area,
        ]);

    }

    
    public function updAreas(Request $request){

        $area = Area::where('id', $request->id)->first();
        $area->nome = $request->area;
        $area->save();
        
        return redirect()->route('infoempresa', ['id' => $area->id_empresa]); 
    } 

    
    public function delete($id){
        Area::destroy($id);
        return back();
    }
    
}
