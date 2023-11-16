<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Textos;
use Auth;
class TextosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){

        $textos = Textos::where('id_instituicao', Auth::user()->id_instituicao)->get();
        if(count($textos) == 0){
        return view('form-textos'); 
        }else{
            return redirect()->route('info-textos', ['id' => $textos[0]->id]);
        }
    }
    public function formTextos(){

        return view('form-textos',[
    ]);
    }

    public function cadTextos(Request $request){

        $textos = new Textos();
        $textos->id_instituicao = Auth::user()->id_instituicao;
        $textos->introducao = $request->introducao;
        $textos->equipe = $request->equipe;
        $textos->disposicao = $request->disposicao;
        $textos->metodologia = $request->metodologia;
        $textos->save();
        
        return redirect()->route('info-textos', ['id' => $textos->id]); 
    } 

    public function infoTextos($id){
        
        $texto = Textos::where('id', $id)->first();
        return view('info-textos',[
            'texto' => $texto,
        ]);

    }

    
    public function updTextos(Request $request){

        $textos =  Textos::where('id', $request->id)->first();
        $textos->introducao = $request->introducao;
        $textos->equipe = $request->equipe;
        $textos->disposicao = $request->disposicao;
        $textos->metodologia = $request->metodologia;
        $textos->save();
        return redirect()->route('info-textos', ['id' => $textos->id]); 
    } 

            
    public function delete($id){
        Textos::destroy($id);
        return back();
    }
}
