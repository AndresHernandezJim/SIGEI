<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;

class LoginController extends Controller
{

    public function obtener(){
            return User::all();
        }


    public function login(Request $request){
        //dd($request->all());

         if (Auth::attempt(['nick' => $request->usuario, 'password' => $request->password])){
             //dd("nms si entro!!!");
             $usuario = Auth::user();
            
                //dd($usuario->all());
                if($usuario->idprivilegio == 1){
                    $request->session()->put('Admin', $usuario);
                    return redirect('/admin');
                }
                if($usuario->idprivilegio == 2){
                    //dd("el tipo es 2");
                    $request->session()->put('Policia', $usuario);
                    //dd(session()->get('Policia')->nombre);
                    return redirect('/poli');
                }
                if($usuario->idprivilegio == 3){
                    //dd("si entro a 3");
                    $request->session()->put('Psicologo', $usuario);
                    //dd(session()->get('Psicologo')->nombre);
                    return redirect('/predel');
                }
        return back()->with('error', true); 
        }
         return back()->with('error', true);

    }
    
    
}
