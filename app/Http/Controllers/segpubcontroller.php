<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class segpubcontroller extends Controller
{
     public function index(){
        //dd("policon");
        return view('visPoli.indexPoli');
    }
    
    public function logout(){
        session()->forget('Policia');
        return redirect('/');
    }
    public function nueva_barandilla(){
    	return view('visPoli.newBarandilla');
    }
}
