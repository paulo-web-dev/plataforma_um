<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home(){
    $user = User::where('id', Auth::user()->id)->with('instituicao')->first();
    
        return view('home2',
        [   
            'user' => $user,
        ]);
    }

    public function logout()
    { 
        
        Auth::logout() ; 
        return redirect()->route('home');              
        
    }
 
}
