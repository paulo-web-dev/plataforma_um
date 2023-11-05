<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdentidadeVisual;
use Auth;
class IdentidadeVisualController extends Controller
{

 
    public function show(){

        $identidade = IdentidadeVisual::where('id_user', Auth::user()->id)->get();
        if(count($identidade) == 0){
        return view('form-identidade'); 
        }else{
            return redirect()->route('info-identidade', ['id' => $identidade[0]->id]);
        }
    }

    public function formIdentidade(){

        return view('form-identidade'); 
    }

    public function cadIdentidade(Request $request){
  

        $identidade = new IdentidadeVisual(); 
        $identidade->id_user = Auth::user()->id;
        $identidade->cor_principal = $request->cor_principal;
        $identidade->cor_secundaria = $request->cor_secundaria;
        if(isset($request->file)){
            $photoname = $request->file->getClientOriginalName();
            $identidade->foto_empresa = $photoname;
            $image = $request->file('file');
            $destinationPath = public_path('fotos-identidade/');
            $image->move($destinationPath, $photoname);
           }
           $identidade->save();
           return redirect()->route('info-identidade', ['id' => $identidade->id]);
    }


    public function infoIdentidade($id){
        

        
        $identidade = IdentidadeVisual::where('id', $id)->first();

        return view('info-identidade',
        [   
            'identidade' => $identidade
        ]); 
    }

    public function updIdentidade(Request $request){

        $identidade = IdentidadeVisual::where('id', $request->id)->first();
        $identidade->cor_principal = $request->cor_principal;
        $identidade->cor_secundaria = $request->cor_secundaria;
        if(isset($request->file)){
            $photoname = $request->file->getClientOriginalName();
            $identidade->foto_empresa = $photoname;
            $image = $request->file('file');
            $destinationPath = public_path('fotos-identidade/');
            $image->move($destinationPath, $photoname);
           }
           $identidade->save();

        return redirect()->route('info-identidade', ['id' => $identidade->id]);
    }
}
