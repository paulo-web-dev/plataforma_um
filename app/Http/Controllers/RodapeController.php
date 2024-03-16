<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas; 
use App\Models\Rodape;

class RodapeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formRodape($empresa){

        return view('form-rodape',[
            'empresa' => $empresa,
            ]);
    }

    public function cadRodape(Request $request){

        $rodape = new Rodape();
        if(isset($request->foto)){
            $photoname = $request->foto->getClientOriginalName();
            $rodape->foto = $photoname;
            $image = $request->file('foto');
            $destinationPath = public_path('fotos-empresa-rodape/');
            $image->move($destinationPath, $photoname);
        }

        
        $rodape->id_empresa = $request->empresa;
        $rodape->save();
        
        return redirect()->route('infoempresa', ['id' => $rodape->id_empresa]); 
    } 

    public function infoRodape($id){
        
        $rodape = Rodape::where('id', $id)->first();
       
        return view('info-rodape',[
            'rodape' => $rodape,
        ]);

    }

    
    public function updRodape(Request $request){

        $rodape = Rodape::where('id', $request->id)->first();
        if(isset($request->foto)){
            $photoname = $request->foto->getClientOriginalName();
            $rodape->foto = $photoname;
            $image = $request->file('foto');
            $destinationPath = public_path('fotos-empresa-rodape/');
            $image->move($destinationPath, $photoname);
        }

      
        $rodape->save(); 
        
        return redirect()->route('infoempresa', ['id' => $rodape->id_empresa]); 
    } 

    public function delete($id){
        Rodape::destroy($id);
        return back();
    }
}
