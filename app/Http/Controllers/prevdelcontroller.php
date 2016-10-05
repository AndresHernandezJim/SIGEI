<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\persona;
use App\lugar;
use App\ocupacion;

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

    public function mostrarPac(){ 
        return view('visPsico.show_pac');
    }

    public function regPer(){
        $data=array(
            'ocupaciones'=> \DB::table('ocupacion')
                ->select('id_ocupacion as id', 'nombre')
                ->get()
        );

        $data2=array(
            'personas'=> \DB::table('persona')
                ->select('id_persona as id', 'apellido', 'nombre', 'curp', 'domicilio')
                ->get()
        );

         $datalocal=array(
            'localidades'=> \App\localidad::get(),
        );
        //dd($datalocal);
    	return view('visPsico.new_persona', $data, $datalocal);
    }
    

    public function newPaciente(Request $request){
        //se crea una sola cadena con los dartos de domicilio para luego insertar
        $domicilio=$request->calle." #".$request->num_ext." colonia ".$request->colonia;
       //se verifica si es que la ocupacion existe
        $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $request->ocupacion)->first();
        //si los valores de padre y madre se mandan vacias, se le asigna valor de 0
        if(empty($request->npadre)){
            $request->npadre = 0;
        }
        if(empty($request->nmadre)){
            $request->nmadre = 0;
        }
        //si no encuentra la ocupacion en la BD, inserta la nueva ocupación y luego se procede a inserat los demas datos en la tabla persona
        if($id_ocupacion==null){
            $ocupacion = new ocupacion;
            $ocupacion->nombre = $request->ocupacion;
            $ocupacion->save();
            //se hace denuebo la consulta para obtener el id de la nueva profecion
            $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $request->ocupacion)->first();
               //insercion enla tabla de personas
                $paciente = new persona;
                $paciente->id_lugar = 1;
                $paciente->id_ocupacion = $id_ocupacion->id_ocupacion;
                $paciente->padre_tutor = $request->npadre;
                $paciente->madre = $request->nmadre;
                $paciente->apellido = $request->apellidos;
                $paciente->nombre = $request->nombre;
                $paciente->domicilio = $domicilio;
                $paciente->curp = $request->curp;
                $paciente->sexo = $request->sexo;
                $paciente->edad = $request->edad;
                $paciente->telefono = $request->tel;
                $paciente->foto = "Null";
                $paciente->save();
                return view('visPsico.show_pac');
        }else{
            //si es que existe la ocupacion en la tabla "ocupación" se procede a ingresar los datos a la tabla persona
                $paciente = new persona;
                $paciente->id_lugar = 1;
                $paciente->id_ocupacion = $id_ocupacion->id_ocupacion;
                $paciente->padre_tutor = $request->npadre;
                $paciente->madre = $request->nmadre;
                $paciente->apellido = $request->apellidos;
                $paciente->nombre = $request->nombre;
                $paciente->domicilio = $domicilio;
                $paciente->curp = $request->curp;
                $paciente->sexo = $request->sexo;
                $paciente->edad = $request->edad;
                $paciente->telefono = $request->tel;
                $paciente->foto = "Null";
                $paciente->save();
                return view('visPsico.show_pac');
            } 
        }        
}
