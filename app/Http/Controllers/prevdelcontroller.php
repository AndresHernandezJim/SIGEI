<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\persona;
use App\lugar;
use App\ocupacion;
<<<<<<< HEAD
use App\institucion;
=======
use App\sesionp;
>>>>>>> 23fb59d4753ae98e8e87c75f2ce67502e59d67da


class prevdelcontroller extends Controller
{
   
	 public function index(){
       
        //cargamos los datos de las instituciones registradas, y las consultas dadas para el dashboard
        //$instituciones=array('instituciones'=>\DB::table('institucion')->select('nombre')->get() );
        //dd($instituciones);
        return view('visPsico.indexPsico'/*,$instituciones*/);
    }

    public function logout(){
        session()->forget('Psicologo');
        return redirect('/');
    }   

    public function regInst(){
          $datalocal=array(
            'localidades'=>\App\localidad::get(),
        );
		return view('visPsico.new_inst',$datalocal);
	}
    public function registroInst(Request $request){
       // dd($request->all());
        //verificamos si ya existe el domicilio registrado
        $existe=\DB::table('lugar')->where('direccion','=',$request->domicilio)->count();
        $existe2=\DB::table('institucion')->where('nombre','=',$request->nombre)->count();
        if($existe==0){
            //si no existe ,registramos el domicilio en la bd
            $dom=new lugar;
            $dom->id_localidad=$request->local;
            $dom->direccion=$request->domicilio;
            //dd($request->local);
            $dom->save();
            //verificamos si ya está almacenada la institución en la bd
            if($existe2==0){
                //si no existe la insertamos
                $instit=new institucion;
                //obtenemos el identificador del domicilio para registrarlo junto la demás información
                $lug=\DB::table('lugar')->select('id_lugar')->where('direccion','=',$request->domicilio)->first();
                $instit->id_lugar=$lug->id_lugar;
                $instit->nombre=$request->nombre;
                $instit->domicilio=$request->domicilio;
                $instit->telefono=$request->telefono;
                $instit->contacto=$request->contacto;
                $instit->save();
                return view('visPsico.show_inst');
            }else{
                //si ya existe solo regresamos a la vista  de listado de instituciones
                return view('visPsico.show_inst');
            }
            
        }else{
            //si existe el domicilio, solo obtenemos la informacion
            if($existe2==0){
                $instit=new institucion;
                //obtenemos el identificador del domicilio para registrarlo junto la demás información
                $lug=\DB::table('lugar')->select('id_lugar')->where('direccion','=',$request->domicilio)->first();
                $instit->id_lugar=$lug->id_lugar;
                $instit->nombre=$request->nombre;
                $instit->domicilio=$request->domicilio;
                $instit->telefono=$request->telefono;
                $instit->contacto=$request->contacto;
                $instit->save();
                return view('visPsico.show_inst');
            }else{
                return view('visPsico.show_inst');
            }

             
        }
        
        
        
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
       
        $muni=array(
            'muni'=>\App\municipio:: where('id_estado','=',1)-> get()
            );

         $datalocal=array(
            'localidades'=> \App\localidad::get(),
        );
       // dd($municipios);
    	return view('visPsico.new_persona', $data, $datalocal,$muni);
    }
    

    public function newPaciente(Request $request){
        //se crea una sola cadena con los dartos de domicilio para luego insertar
        $domicilio=$request->calle." #".$request->num_ext." colonia ".$request->colonia;
        //insertamos la direccion
        $idlugar= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $domicilio)->first();
        if ($idlugar==null) {
            //dd("no hay");
            $dom=new lugar;
            $dom->id_localidad=$request->local;
            $dom->direccion=$domicilio;
            $dom->save();
            $idlugar= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $domicilio)->first();
            //dd($idlugar->id_lugar);
        }
        //dd("si hay");
       //se verifica si es que la ocupacion existe
        $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $request->ocupacion)->first();
        //si no encuentra la ocupacion en la BD, inserta la nueva ocupación y luego se procede a inserat los demas datos en la tabla persona
        if($id_ocupacion==null){
            //dd($request->all());
            $ocupacion = new ocupacion;
            $ocupacion->nombre = $request->ocupacion;
            $ocupacion->save();
            //se hace denuebo la consulta para obtener el id de la nueva profecion
            $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $request->ocupacion)->first();
               //insercion enla tabla de personas
                $paciente = new persona;
                $paciente->id_lugar = $idlugar->id_lugar;
                $paciente->id_ocupacion = $id_ocupacion->id_ocupacion;
                $paciente->padre_tutor = $request->npadre;
                $paciente->madre = $request->nmadre;
                $paciente->apellido = $request->apellidos;
                $paciente->nombre = $request->nombre;
                $paciente->domicilio = $domicilio;
                $paciente->curp = $request->curp;
                $paciente->sexo = $request->sexo;
                $paciente->edad = $request->edad;
                $paciente->telefono = $request->telefono;
                $paciente->foto = "Null";
                $paciente->tipo=2;
                $paciente->save();
                return view('visPsico.show_pac');
        }else{
            //si es que existe la ocupacion en la tabla "ocupación" se procede a ingresar los datos a la tabla persona
                $paciente = new persona;
                $paciente->id_lugar = $idlugar->id_lugar;
                $paciente->id_ocupacion = $id_ocupacion->id_ocupacion;
                $paciente->padre_tutor = $request->npadre;
                $paciente->madre = $request->nmadre;
                $paciente->apellido = $request->apellidos;
                $paciente->nombre = $request->nombre;
                $paciente->domicilio = $domicilio;
                $paciente->curp = $request->curp;
                $paciente->sexo = $request->sexo;
                $paciente->edad = $request->edad;
                $paciente->telefono = $request->telefono;
                $paciente->foto = "Null";
                $paciente->tipo=2;
                $paciente->save();
                return view('visPsico.show_pac');
            } 
<<<<<<< HEAD
        }        
}
=======
        }

    public function showPas(){
       $ordenado = \DB::table('persona')
                ->select('id_persona as id', 'apellido', 'nombre')
                ->orderBy('apellido', 'asc')
                ->get();
                //dd($ordenado);
        return $ordenado;
    }        

    public function mostrarSes($id){
        //dd($id);
        $persona = \DB::table('persona')->where('id_persona','=', $id)->first();
        if ($persona->sexo == 1) {
            $persona->sexo= 'Masculino';
        }else{
            $persona->sexo = 'Femenino';
        }
        $ocupacion = \DB::table('ocupacion')->select('nombre')->where('id_ocupacion','=', $persona->id_ocupacion)->first();
        $persona->id_ocupacion=$ocupacion->nombre;
        
        $localidad=\DB::table('localidad')
        ->join('lugar','localidad.id_localidad','=','lugar.id_localidad')
        ->join('persona','persona.id_lugar','=','lugar.id_lugar')
        ->select('localidad.nombre')
        ->where('persona.id_lugar', '=', $persona->id_lugar )->first();

        $persona->id_lugar=$localidad->nombre;
        //dd($persona);
        $consultado = array('pasiente' => $persona, );
        return view('visPsico.show_info', $consultado);
    }

     public function newSes($id){
        $persona = \DB::table('persona')->select('id_persona as id','nombre', 'apellido')->where('id_persona','=', $id)->first();
        //dd($persona);
        $pasiente = array('PasNom' => $persona,);
        return view('visPsico.new_consulta', $pasiente);
    }

    public function insertSes($id, Request $request)
    {
        //dd($request->all(), $id);

        $sesion = new sesionp;
        $sesion->id_usuario = $request->psicologo; 
        $sesion->id_persona = $id;
        $sesion->id_institucion = null;
        $sesion->fecha = $request->fecha;
        $sesion->detalle = $request->observ;
        $sesion->save();
        dd("exito");
        //return view('visPsico.show_info', $consultado);
    }
}
>>>>>>> 23fb59d4753ae98e8e87c75f2ce67502e59d67da
