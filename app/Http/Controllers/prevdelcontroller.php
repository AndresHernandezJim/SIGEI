<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class prevdelcontroller extends Controller
{
   
	 public function index(){
        //dd("policon");
        return view('visPsico.indexPsico');
    }

    public function logout(){
        session()->forget('Psicologo');
        return redirect('/');
    }   
}
