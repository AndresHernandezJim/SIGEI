<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class website extends Controller
{
    public function nusu(){
    	$data=array(
            'privilegios'=> \App\privilegios::get(),
        );
        return view('/website/nusu',$data);
        //return view('welcome',$data);
    }

    public function Newusr(Request $request){
    	//dd($request->all());
    	$contrasena = \Hash::make($request->contrasena);
    	$usuario = new User;
    	$usuario->nombre = $request->nombre;
    	$usuario->password = $contrasena;
    	$usuario->idprivilegio = $request->privilegio;
    	$usuario->telefono = $request->telefono;
    	$usuario->nick = $request->nick;
    	$usuario->updated_at = DATE('Y-m-d H:i:s');
    	$usuario->created_at = DATE('Y-m-d H:i:s');
    	$usuario->save();

    	return view('website.index');
    }
    
}
