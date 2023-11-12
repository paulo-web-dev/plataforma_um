<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DescricaoFoto;

class DescricaoFotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formDescricaoFoto($id_subsetor){

        return view('form-descricao-foto',[
            'id_subsetor' => $id_subsetor,
    ]);
    } 

    public function cadDescricaoFoto(Request $request){

        $descricao = new DescricaoFoto();
        $descricao->descricao = $request->descricao;
        $descricao->id_subsetor = $request->id_subsetor;
        $descricao->save();
        
        return redirect()->route('info-subsetor', ['id' => $descricao->id_subsetor])->with('secao', 'legenda-fotos'); 
    } 

    public function infoDescricaoFoto($id){
        
        $descricao = DescricaoFoto::where('id', $id)->first();
        return view('info-descricao-foto',[ 
            'descricao' => $descricao,
        ]);

    }

    
    public function updDescricaoFoto(Request $request){

        $descricao =  DescricaoFoto::where('id', $request->id)->first();
        $descricao->descricao = $request->descricao;
        $descricao->save();
        
        return redirect()->route('info-subsetor', ['id' => $descricao->id_subsetor])->with('secao', 'legenda-fotos'); 
    } 

    public function delete($id){
        DescricaoFoto::destroy($id);
        return back();
    }
}
