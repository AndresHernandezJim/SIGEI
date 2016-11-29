<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use App\sesion;
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
                    //dd("op");
                    $request->session()->put('Admin', $usuario);
                    $sesion= new sesion;
                    $sesion->id_usuario=$usuario->id_usuario;
                    $sesion->ip=$request->ip();
                    $sesion->save();
                    return redirect('/director');

                }
                if($usuario->idprivilegio == 2){
                    //dd("el tipo es 2");
                    $request->session()->put('Policia', $usuario);
                    //dd(session()->get('Policia')->nombre);
                    $sesion= new sesion;
                    $sesion->id_usuario=$usuario->id_usuario;
                    $sesion->ip=$request->ip();
                    $sesion->save();
                    //$sesion=[$id_usuario,$fecha,$ip];
                    //dd($sesion);
                    return redirect('/poli');
                }
                if($usuario->idprivilegio == 3){
                    //dd("si entro a 3");
                    $request->session()->put('Psicologo', $usuario);
                    //dd(session()->get('Psicologo')->nombre);
                    $sesion= new sesion;
                    $sesion->id_usuario=$usuario->id_usuario;
                    $sesion->ip=$request->ip();
                    $sesion->save();
                    return redirect('/predel');
                }
                 if($usuario->idprivilegio == 4){
                    //dd("si entro a 3");
                    $request->session()->put('SuperAdm', $usuario);
                    //dd(session()->get('Psicologo')->nombre);
                    $sesion= new sesion;
                    $sesion->id_usuario=$usuario->id_usuario;
                    $sesion->ip=$request->ip();
                    $sesion->save();
                    return redirect('/');
                }
        return back()->with('error', true); 
        }
         return back()->with('error', true);

    }
    
    
}
