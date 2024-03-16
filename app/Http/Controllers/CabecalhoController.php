<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas; 
use App\Models\Cabecalho;

class CabecalhoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formCabecalho($empresa){

        return view('form-cabecalho',[
            'empresa' => $empresa,
            ]);
    }

    public function cadCabecalho(Request $request){

        $cabecalho = new Cabecalho();
        if(isset($request->foto_empresa)){
            $photoname = $request->foto_empresa->getClientOriginalName();
            $cabecalho->foto_empresa = $photoname;
            $image = $request->file('foto_empresa');
            $destinationPath = public_path('fotos-empresa-cabecalho/');
            $image->move($destinationPath, $photoname);
        }

        if(isset($request->foto_produtor)){
            $photoname = $request->foto_produtor->getClientOriginalName();
            $cabecalho->foto_produtor = $photoname;
            $image = $request->file('foto_produtor');
            $destinationPath = public_path('fotos-empresa-produtor/');
            $image->move($destinationPath, $photoname);
        }
        $cabecalho->id_empresa = $request->empresa;
        $cabecalho->save();
        
        return redirect()->route('infoempresa', ['id' => $cabecalho->id_empresa]); 
    } 

    public function infoCabecalho($id){
        
        $cabecalho = Cabecalho::where('id', $id)->first();
       
        return view('info-cabecalho',[
            'cabecalho' => $cabecalho,
        ]);

    }

    
    public function updCabecalho(Request $request){

        $cabecalho = Cabecalho::where('id', $request->id)->first(   );
        if(isset($request->foto_empresa)){
            $photoname = $request->foto_empresa->getClientOriginalName();
            $cabecalho->foto_empresa = $photoname;
            $image = $request->file('foto_empresa');
            $destinationPath = public_path('fotos-empresa-cabecalho/');
            $image->move($destinationPath, $photoname);
        }

        if(isset($request->foto_produtor)){
        
            $photoname = $request->foto_produtor->getClientOriginalName();
            $cabecalho->foto_produtor = $photoname;
            $image = $request->file('foto_produtor');
            $destinationPath = public_path('fotos-empresa-produtor/');
            $image->move($destinationPath, $photoname);
        }
        $cabecalho->save(); 
        
        return redirect()->route('infoempresa', ['id' => $cabecalho->id_empresa]); 
    } 

    
        
    public function delete($id){
        Cabecalho::destroy($id);
        return back();
    }
}
