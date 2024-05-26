<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConclusaoSubsetor;

class ConclusaoSubsetorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function formConclusaoSubsetores($subsetor){

        return view('form-conclusao-subsetor',[
            'subsetor' => $subsetor,
    ]);
    } 

    
    public function infoConclusaoSubsetores($conclusao){
        $conclusao = ConclusaoSubsetor::where('id', $conclusao)->first();
        return view('info-conclusao-subsetor',[
            'conclusao' => $conclusao,
    ]);
    } 


    public function cadConclusaoSubSetor(Request $request){
        
        $conclusaosubsetor = new ConclusaoSubsetor();
        $conclusaosubsetor->id_subsetor = $request->subsetor;
        $conclusaosubsetor->conclusao = $request->conclusao;
        $conclusaosubsetor->save();
        
        return redirect()->route('info-subsetor', ['id' => $conclusaosubsetor->id_subsetor]); 
    } 

    public function updConclusaoSubSetor(Request $request){
        
        $conclusaosubsetor = ConclusaoSubsetor::where('id', $request->id)->first();
   
        $conclusaosubsetor->conclusao = $request->conclusao;
        $conclusaosubsetor->save();
        
        return redirect()->route('info-subsetor', ['id' => $conclusaosubsetor->id_subsetor]); 
    } 
    public function delete($id){
        ConclusaoSubsetor::destroy($id);
        return back();
    }
}
