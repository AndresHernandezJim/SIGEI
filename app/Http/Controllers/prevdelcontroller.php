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

    public function regInst(){
		return view('visPsico.new_inst');
	}

	 public function visIns(){
        return view('visPsico.show_inst');
    }

    public function regPer(){
    	return view('visPsico.new_persona');
    }
    
     public function mostrarPac(){ 
        return view('visPsico.show_pac');
    }

}
