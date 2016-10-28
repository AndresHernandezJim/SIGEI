<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Helper\imagehelper;
use App\ocupacion;
use App\persona;
use App\lugar;
use App\Helper\reporte;
use App\Helper\barandilla;
use App\reportebarandilla;

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
        $datalocal=array(
            'localidades'=> \App\localidad::get(),
        );
         $data=array(
            'ocupaciones'=> \DB::table('ocupacion')
                ->select('id_ocupacion as id', 'nombre')
                ->get()
        );
    	return view('visPoli.newBarandilla',$datalocal);
    }
    public function showdet(){
        $data=array(
            'detenidos'=>\DB::table('persona')->where('activo_sp','=','1')->get()
            );
        return view('visPoli.viewdet',$data);
    }
   
    public function guardabarandilla(Request $request){
        //subimos la foto
        //$file = $request->file('files');
        //$file = $file[0];
        //dd($file);
        //if ($request->hasFile('files')) {
            //mandamos subir el archivo con el upload   
          // $subir=imagehelper::upload($file);
          // dd($subir);
       // }
        //creamos el reporte de tipo de barandilla
        $sesion=\DB::table('sys_sesion')->select('id_sesion')->orderby('id_sesion','desc')->first();
        /*$nuevo= \DB::table('reporte')->insert([
        'id_emergencia'=>1,
        'tipo_aviso'=>3,
        'id_lugar'=>1, //asegurarse que el primer lugar sea la misma DSPV
        'fecha'=>DATE('Y-m-d H:i:s'),
        'hora'=>Date('H:i:s'),
        'canalizacion'=>null,
        'detalles'=>"se remite ciudadano a los separos preventívos",
        'id_sesion'=>$sesion->id_sesion]);*/
        //obtenemos el id del reporte
        $id=\DB::table('reporte')->groupby('id_reporte')->first();
        //verificamos si ya existen los datos de la persona
        $domicilio=$request->calle." #".$request->num_ext." colonia ".$request->colonia;
        //insertamos la direccion
        //verificamos si ya existe la direccion registrada
         $lugar=\DB::table('lugar')->where('direccion','=',$domicilio);
         //si no existe hay que crearla
         /*if($lugar==null){
            $dom=new lugar;
            $dom->id_localidad=$request->local;
            $dom->direccion=$domicilio;
            $dom->save();
            $lugar= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $domicilio)->first();
         } */ //si existe verificamos la persona dado que ya tenemos el id del lugar
         $persona=\DB::table('persona')->where('curp','=',$request->curp)->first();
         if($persona==null){
           //si la persona no existe verificar si existe la ocupacion
            $$id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $request->ocupacion)->first();
            //si no encuentra la ocupacion en la BD, inserta la nueva ocupación y luego se procede a inserat los demas datos en la tabla persona
            if($id_ocupacion==null){
                //dd($request->all());
                $ocupacion = new ocupacion;
                $ocupacion->nombre = $request->ocupacion;
                $ocupacion->save();
                //se hace denuebo la consulta para obtener el id de la nueva profecion
                $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $request->ocupacion)->first();
                // y registramos a la persona
                //insercion enla tabla de personas
                $detenido = new persona;
                $detenido->id_lugar = $lugar->id_lugar;
                $detenido->id_ocupacion = $id_ocupacion->id_ocupacion;
                $detenido->padre_tutor = $request->npadre;
                $detenido->madre = $request->nmadre;
                $detenido->apellido = $request->apellidos;
                $detenido->nombre = $request->nombre;
                $detenido->domicilio = $domicilio;
                $detenido->curp = $request->curp;
                $detenido->sexo = $request->sexo;
                $detenido->edad = $request->edad;
                $detenido->telefono = $request->telefono;
                $detenido->foto = "Null";
                $detenido->tipo=2;
                $detenido->save();
            }else{//else ocupacion
                $detenido = new persona;
                $detenido->id_lugar = $lugar->id_lugar;
                $detenido->id_ocupacion = $id_ocupacion->id_ocupacion;
                $detenido->padre_tutor = $request->npadre;
                $detenido->madre = $request->nmadre;
                $detenido->apellido = $request->apellidos;
                $detenido->nombre = $request->nombre;
                $detenido->domicilio = $domicilio;
                $detenido->curp = $request->curp;
                $detenido->sexo = $request->sexo;
                $detenido->edad = $request->edad;
                $detenido->telefono = $request->telefono;
                $detenido->foto = "Null";
                $detenido->tipo=2;
                $detenido->save();
            }
        }
        //REGISTRAMOS los valores relacionados a la tabla reporte_barandilla
        
         dd($persona);
        }
    }
}
