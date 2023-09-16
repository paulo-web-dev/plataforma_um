<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AudioController extends Controller
{
    public function uploadAudio(){
        
        return view('upload-audio');
    }
}
