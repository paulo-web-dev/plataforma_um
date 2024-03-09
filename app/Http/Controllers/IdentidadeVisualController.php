<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdentidadeVisual;
use App\Models\Empresas;
use Auth;
class IdentidadeVisualController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(){

        
        $empresas = Empresas::where('id_user', Auth::user()->id_instituicao)->with('identidade')->get();
    
        return view('info-identidade',
        [   
            'empresass' => $empresas
        ]); 
           

    }

    public function formIdentidade(){
        $empresas = Empresas::where('id_user', Auth::user()->id_instituicao)->with('identidade')->get();
        return view('form-identidade',['empresas' =>$empresas,]); 
    }

    public function duplicarIdentidade($id){
        $identidade = IdentidadeVisual::where('id', $id)->first();
        
        $empresas = Empresas::where('id_user', Auth::user()->id_instituicao)->with('identidade')->get();
        return view('duplicar-identidade',['empresas' =>$empresas, 'identidade' => $identidade]); 
    }

    public function cadIdentidade(Request $request){
  

        $identidade = new IdentidadeVisual(); 
        $identidade->id_user = $request->empresa;
        $identidade->cor_principal = $request->cor_principal;
        $identidade->cor_secundaria = $request->cor_secundaria;
        $identidade->tipo = $request->tipo;
        $identidade->cor_1 = $request->cor_1;
        $identidade->cor_2 = $request->cor_2;
        $identidade->cor_3 = $request->cor_3;
        if(isset($request->file)){
            $photoname = $request->file->getClientOriginalName();
            $identidade->foto_empresa = $photoname;
            $image = $request->file('file');
            $destinationPath = public_path('fotos-identidade/');
            $image->move($destinationPath, $photoname);
           }else{
            $identidade->foto_empresa = $request->foto;
           }

           if(isset($request->marca)){
            $photoname = $request->marca->getClientOriginalName();
            $identidade->marca_dagua = $photoname;
            $image = $request->file('marca');
            $destinationPath = public_path('marcadagua/');
            $image->move($destinationPath, $photoname);
           }

           if(isset($request->capa)){
            $photoname = $request->capa->getClientOriginalName();
            $identidade->foto_capa = $photoname;
            $image = $request->file('capa');
            $destinationPath = public_path('capa/');
            $image->move($destinationPath, $photoname);
           }
           $identidade->save();  
           return redirect()->route('info-identidade');
    }


    public function infoIdentidade(){
        

        
      
        $empresas = Empresas::where('id_user', Auth::user()->id_instituicao)->with('identidade')->get();
        return view('info-identidade',
        [   
            
            'empresass' => $empresas,
        ]); 
    }

    public function updIdentidade(Request $request){

        $identidade = IdentidadeVisual::where('id', $request->id)->first();
        $identidade->id_user = $request->empresa;
        $identidade->cor_principal = $request->cor_principal;
        $identidade->cor_secundaria = $request->cor_secundaria;
        if(isset($request->file)){
            $photoname = $request->file->getClientOriginalName();
            $identidade->foto_empresa = $photoname;
            $image = $request->file('file');
            $destinationPath = public_path('fotos-identidade/');
            $image->move($destinationPath, $photoname);
           }

           if(isset($request->capa)){
            $photoname = $request->capa->getClientOriginalName();
            $identidade->foto_capa = $photoname;
            $image = $request->file('capa');
            $destinationPath = public_path('capa/');
            $image->move($destinationPath, $photoname);
           }
           if(isset($request->marca)){
            $photoname = $request->marca->getClientOriginalName();
            $identidade->marca_dagua = $photoname;
            $image = $request->file('marca');
            $destinationPath = public_path('marcadagua/');
            $image->move($destinationPath, $photoname);
           }
           $identidade->save();

        return redirect()->route('info-identidade', ['id' => $identidade->id]);
    }
}
