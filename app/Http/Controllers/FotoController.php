<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubSetores;
use App\Models\foto;

class FotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formFoto($id_subsetor){

        
        return view('form-foto',[
            'id_subsetor' => $id_subsetor,
        ]);
    }
}
