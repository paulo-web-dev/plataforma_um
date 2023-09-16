<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubSetores;
use App\Models\FotosAtividades;

class FotosAtividadesController extends Controller
{
    public function formFoto($id_subsetor){
       
        return view('form-foto',[
            'id_subsetor' => $id_subsetor,
        ]);
    }

    public function uploadFoto(Request $request){
        
        $arquivos = $request->file('file');

        foreach ($arquivos as $arquivo) {
            $photoname = $arquivo->getClientOriginalName();
            $destinationPath = public_path('fotos-atividades/');
            $foto =  new FotosAtividades ();
            $foto->id_subsetor = $request->id_subsetor;
            $foto->photo = $photoname;
            $arquivo->move($destinationPath, $photoname);
            $foto->save();  
        }
        return redirect()->route('info-subsetor', ['id' => $foto->id_subsetor]); 
    }

    public function deleteFoto($id){
        FotosAtividades::destroy($id);
        return back();
    }
}
 