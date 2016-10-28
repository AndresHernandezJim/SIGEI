<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Requests;

use App\persona;
use App\lugar;
use App\ocupacion;
use App\institucion;
use App\sesionp;
use App\sesionIns;

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
                $instit->activo_pd=1;
                $instit->save();
                 return redirect()->action('prevdelcontroller@visIns');
            }else{
                //si ya existe solo regresamos a la vista  de listado de instituciones
               return redirect()->action('prevdelcontroller@visIns');
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
                return redirect()->action('prevdelcontroller@visIns');
            }else{
                return redirect()->action('prevdelcontroller@visIns');
            }
             
        }   
        
    }
	 public function visIns(){

         $data = \DB::table('institucion')
            ->select('id_institucion as id', 'nombre', 'telefono')
            ->orderBy('Nombre', 'asc')
            ->where('activo_pd', 1)
            ->paginate(3);
            //dd($data);
        $institucion = array('instituciones' => $data,); 
        return view('visPsico.show_inst', $institucion);
    }
//===========================================================================================================================
 //===========================================================================================================================
 //===========================================================================================================================
 //===========================================================================================================================
    public function mostrarPac(){ 
         $ordenado = \DB::table('persona')
                ->select('id_persona as id', 'apellido', 'nombre')
                ->orderBy('apellido', 'asc')
                ->where('activo_pd', 1)
                ->paginate(3); 

           $pasiente = array('pasientes' => $ordenado,);

        return view('visPsico.show_pac', $pasiente);
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
                $paciente->activo_pd=1;
                $paciente->activo_sp=0;
                $paciente->save();
                return redirect()->action('prevdelcontroller@mostrarPac');
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
                $paciente->activo_pd=1;
                $paciente->activo_sp=0;
                $paciente->save();
                return redirect()->action('prevdelcontroller@mostrarPac');
            } 

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
        //proceso para obtener los datos del paciente
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
        $consultado = array('pasiente' => $persona, );

        //proceso para obtener las sesiones de paciente
        $sesiones = \DB::table('sesion')->select('id_sesion as id','fecha')->where('id_persona', '=', $id )->paginate(5);
       
        $terapias = array('sesiones' => $sesiones, );
        return view('visPsico.show_info', $consultado, $terapias);
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
        $sesion->fecha = $request->fecha;
        $sesion->detalle = $request->observ;
        $sesion->save();
        //dd("se guardo");
        return redirect()->action('prevdelcontroller@mostrarSes', ['id' => $id]);
    }

     /*public function showSec($id){
        $sesiones = \DB::table('sesion')->select('id_sesion as id','fecha')->where('id_persona', '=', $id )->get();
        //dd($sesiones);
        return $sesiones;
    }*/

    public function ses_esp($id){
        //dd($id);
        $sesiones = \DB::table('sesion')->select('id_persona', 'detalle', 'fecha')->where('id_sesion', '=', $id)->first();
        //dd($sesiones->id_usuario);
        $persona = \DB::table('persona')->select('id_persona as id', 'apellido', 'nombre')->where('id_persona','=', $sesiones->id_persona)->first();
        //dd($persona);
        $data = array('sesion' => $sesiones,);
        //dd($data);
        $pasiente = array('PasNom' => $persona,);
        //dd($pasiente);
        return view('visPsico.show_sec_esp', $data, $pasiente);
    }

     
    public function deletePac(Request $request){
        //dd($request->all());
        //$sesiones = \DB::table('sesion')->where('id_persona', '=', $request->id_pas)->delete();
        //$pasiente = \DB::table('persona')->where('id_persona', '=', $request->id_pas)->delete();
        $pasiente = \DB::table('persona')->where('id_persona', '=', $request->id_pas)->update(['activo_pd' => 0]);
    }

    public function deleteIns(Request $request){
        //dd($request->all());
        $institucion = \DB::table('institucion')->where('id_institucion', '=', $request->id_ins)->update(['activo_pd' => 0]);
    }
/*==================================================================================================================================
====================================================================================================================================
====================================================================================================================================*/
    public function showInst(){
            $data = \DB::table('institucion')
            ->select('id_institucion as id', 'nombre', 'telefono')
            ->orderBy('Nombre', 'asc')->get();
           //->paginate(3); 
            //dd($data);
            return $data;
    }

//funcion de la vista de informacion de institucion
    public function mostrarInst($id){
        //obtencion de los datos de la institucion
        $ins = \DB::table('institucion')->where('id_institucion', '=', $id)->first();
         $localidad=\DB::table('localidad')
        ->join('lugar','localidad.id_localidad','=','lugar.id_localidad')
        ->join('institucion','institucion.id_lugar','=','lugar.id_lugar')
        ->select('localidad.nombre')
        ->where('institucion.id_lugar', '=', $ins->id_lugar )->first();
        $ins->id_lugar=$localidad->nombre;
        $institucion = array('instituto' => $ins,);

        //Obtencion de las visitas  registradas para esta institución
         $sesiones = \DB::table('sesioninstit')
         ->select('id_sesion as id','fecha')
         ->where('id_institucion', '=', $id )
         ->paginate(3);
        $visitas= array('visitas' => $sesiones,);

        return view('visPsico.show_infoinst', $institucion, $visitas);
    }    

    //funcion del avista de nueva visita para una institución
    public function newVis($id){
        $ins = \DB::table('institucion')->select('id_institucion as id', 'nombre')->where('id_institucion', '=', $id)->first();
        $institucion = array('ins' => $ins,);
        return view('visPsico.new_visita', $institucion);
    }

//fucion para registrar una visista en cierta institucion
    public function regVis($id, Request $request){
        //dd($request->all(), $id);
        $visita = new sesionIns;
        $visita->id_usuario = $request->psicologo;
        $visita->id_institucion = $id;
        $visita->fecha = $request->fecha;
        $visita->observaciones = $request->observ;
        $visita->save();
        return redirect()->action('prevdelcontroller@mostrarInst', ['id' => $id]);
    }


    /*public function showVis($id){
        $sesiones = \DB::table('sesioninstit')->select('id_sesion as id','fecha')->where('id_institucion', '=', $id )->get();
       
        return $sesiones;
    }*/

//funcion de la vista de una vista en especifico que se quiera consultar de una institucion en especifico
    public function vis_esp($id){
        //dd($id);
        $visita = \DB::table('sesioninstit')->select('id_institucion as id', 'fecha', 'observaciones')->where('id_sesion', '=', $id)->first();
        $nombre=  \DB::table('institucion')->select('nombre')->where('id_institucion', '=', $visita->id)->first();
        $visita->id_institucion=$nombre->nombre;
        //dd($visita);
        $data = array('visita' => $visita,);
        return view('visPsico.show_visita', $data);
        
    }
}
