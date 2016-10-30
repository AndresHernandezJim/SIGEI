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
    	return view('visPoli.newBarandilla',$datalocal,$data);
    }
    public function showdet(){
        $data=\DB::table('persona')
            ->join('reporte_barandilla', 'persona.id_persona', '=', 'reporte_barandilla.id_persona')
            ->select('persona.*','reporte_barandilla.created_at')
            ->paginate(2);
        $detenido=array('detenidos'=>$data);
        return view('visPoli.viewdet',$detenido);
    }
    public function showdet2($id){

        $data=\DB::table('persona')->join('reporte_barandilla','persona.id_persona','=','reporte_barandilla.id_persona')
            ->join('ocupacion','ocupacion.id_ocupacion','=','persona.id_ocupacion')
            ->join('lugar','persona.id_lugar','=','lugar.id_lugar')->join('localidad','localidad.id_localidad','=','lugar.id_localidad')
            ->select(array('persona.nombre','persona.apellido','persona.domicilio','persona.curp','persona.sexo','persona.alias','ocupacion.nombre as ocupacion','persona.telefono','persona.edad','persona.foto','reporte_barandilla.causa','reporte_barandilla.pertenencias','reporte_barandilla.observaciones','localidad.nombre as localidad','reporte_barandilla.remite'))
            ->where('reporte_barandilla.id_reporte','=',$id)->first();
            if($data->sexo==1){
                $data->sexo="Masculino";
            }
            if($data->sexo==2){
                $data->sexo="Femenino";
            }
            $datos=array('info'=>$data);
        //dd($data);
        return view('visPoli.viewdet2',$datos);
    }
   
    public function guardabarandilla(Request $request){ 
        //subimos la foto
        $file = $request->file('files');
        $file = $file[0];
        //dd($file);
        if ($request->hasFile('files')) {
            //  mandamos subir el archivo con el upload   
            $subir=imagehelper::upload($file);
            //dd($subir);
        }
        //verificamos si existe la persona;
        $persona=\DB::table('persona')->select('id_persona')->where('curp','=',$request->curp)->first();
        if($persona==null){ //no existe la persona, hay que agregarla
            //verificamos datos del lugar
            $domicilio=$request->calle." #".$request->num_ext." colonia ".$request->colonia;
            $id_lugar= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $domicilio)->first();
            //dd($id_lugar);
            if($id_lugar==null){//no existe el lugar, hay que agregarlo
                $dom=new lugar;
                $dom->id_localidad=$request->local;
                $dom->direccion=$domicilio;
                $dom->save();
                $id_lugar= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $domicilio)->first(); //obtenemos el id de lugar ojo-*****
                //verificamos si existe  la ocupacion
                $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $request->ocupacion)->first();
                if($id_ocupacion==null){//la ocupación no existe tenemos que crearla
                    $ocupacion = new ocupacion;
                    $ocupacion->nombre = $request->ocupacion;
                    $ocupacion->save();
                    //se hace nuevamente la consulta para obtener el id de la nueva profesión
                    $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $request->ocupacion)->first();
                    //procedemos a registrar la persona con los campos obtenidos
                    $detenido = new persona;
                    $detenido->id_lugar = $id_lugar->id_lugar;$detenido->id_ocupacion = $id_ocupacion->id_ocupacion;
                    $detenido->apellido = $request->apellidos;$detenido->nombre = $request->nombre;
                    $detenido->domicilio = $domicilio;$detenido->curp = $request->curp;
                    $detenido->sexo = $request->sexo;$detenido->edad = $request->edad;
                    $detenido->telefono = $request->telefono;$detenido->foto = $subir;
                    $detenido->tipo=1;$detenido->activo_pd=0;$detenido->activo_sp=1;
                    $detenido->save();
                    $persona=\DB::table('persona')->select('id_persona')->where('curp','=',$request->curp)->first();
                    //obtenemos el id de la persona recien agregada
                }
                $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $request->ocupacion)->first();
                //procedemos a registrar la persona con los campos obtenidos
                $detenido = new persona;
                $detenido->id_lugar = $id_lugar->id_lugar;
                $detenido->id_ocupacion = $id_ocupacion->id_ocupacion;
                $detenido->apellido = $request->apellidos;
                $detenido->nombre = $request->nombre;
                $detenido->domicilio = $domicilio;
                $detenido->curp = $request->curp;
                $detenido->sexo = $request->sexo;
                $detenido->edad = $request->edad;
                $detenido->telefono = $request->telefono;
                $detenido->foto = $subir;
                $detenido->tipo=1;
                $detenido->activo_pd=0;
                $detenido->activo_sp=1;
                $detenido->save();
                $persona=\DB::table('persona')->select('id_persona')->where('curp','=',$request->curp)->first();//obtenemos el id de la persona 
            }
            //verificamos si existe  la ocupacion
            $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $request->ocupacion)->first();
            if($id_ocupacion==null){//la ocupación no existe tenemos que crearla
                $ocupacion = new ocupacion;
                $ocupacion->nombre = $request->ocupacion;
                $ocupacion->save();
                //se hace nuevamente la consulta para obtener el id de la nueva profesión
                $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $request->ocupacion)->first();
                //procedemos a registrar la persona con los campos obtenidos
                $detenido = new persona;
                $detenido->id_lugar = $id_lugar->id_lugar;
                $detenido->id_ocupacion = $id_ocupacion->id_ocupacion;
                $detenido->apellido = $request->apellidos;
                $detenido->nombre = $request->nombre;
                $detenido->domicilio = $domicilio;
                $detenido->curp = $request->curp;
                $detenido->sexo = $request->sexo;
                $detenido->edad = $request->edad;
                $detenido->telefono = $request->telefono;
                $detenido->foto = $subir;
                $detenido->tipo=1;
                $detenido->activo_pd=0;
                $detenido->activo_sp=1;
                $detenido->save();
                $persona=\DB::table('persona')->select('id_persona')->where('curp','=',$request->curp)->first();//obtenemos el id de la persona recien agregada
                }
                $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $request->ocupacion)->first();
                //dd($id_lugar);
                //procedemos a registrar la persona con los campos obtenidos
                $detenido = new persona;
                $detenido->id_lugar = $id_lugar->id_lugar;
                $detenido->id_ocupacion = $id_ocupacion->id_ocupacion;
                $detenido->apellido = $request->apellidos;
                $detenido->nombre = $request->nombre;
                $detenido->domicilio = $domicilio;
                $detenido->curp = $request->curp;
                $detenido->sexo = $request->sexo;
                $detenido->edad = $request->edad;
                $detenido->telefono = $request->telefono;
                $detenido->foto = $subir;
                $detenido->tipo=1;
                $detenido->activo_pd=0;
                $detenido->activo_sp=1;
                $detenido->save();
                $persona=\DB::table('persona')->select('id_persona')->where('curp','=',$request->curp)->first();//obtenemos el id de la persona 
        }
        else{ // la persona si existe hay que actualizar su foto
            $foto=\DB::table('persona')->where('id_persona',$persona->id_persona)->update(array('foto' => $subir,'activo_sp'=>1));
            $persona=\DB::table('persona')->where('curp','=',$request->curp)->first();
        }
        //creamos el reporte de tipo de barandilla
        $sesion=\DB::table('sys_sesion')->select('id_sesion')->orderby('id_sesion','desc')->first();
        $nuevo= \DB::table('reporte')->insert([
        'id_emergencia'=>1,
        'tipo_aviso'=>3,
        'id_lugar'=>1, //asegurarse que el primer lugar sea la misma DSPV
        'fecha'=>DATE('Y-m-d H:i:s'),
        'hora'=>Date('H:i:s'),
        'canalizacion'=>null,
        'detalles'=>"se remite ciudadano a los separos preventívos",
        'id_sesion'=>$sesion->id_sesion]);
        //obtenemos el id del reporte 
        $id=\DB::table('reporte')->select('id_reporte')->orderby('id_reporte','desc')->first();
         //dd($id);
        //verificamos si existe un reporte de barandilla donde la persona, el id_reportey el estatus esta activo.
        $reportebarandilla=\DB::table('reporte_barandilla')->where('id_reporte','=',$id->id_reporte)->where('id_persona','=',$persona->id_persona)->first();
        //
        if($reportebarandilla==null){//si no existe el reporte lo creamos
            //dd($request->observaciones);
            $baran=new reportebarandilla;
            $baran->id_reporte=$id->id_reporte;
            $baran->id_persona=$persona->id_persona;
            $baran->causa=$request->causa;
            $baran->pertenencias=$request->pertenencias;
            $baran->estatus=1;
            $baran->remite=$request->remite;
            $baran->observaciones=$request->observaciones;
            $baran->save();
            //return back()->with('exito',true);
            //$reportebarandilla=\DB::table('reporte_barandilla')->where('id_reporte','=',$id->id_reporte)->where('id_persona','=',$persona->id_persona)->first();
            //dd('insertó');
            return redirect('/consultadetenido');         }
         return back()->with('error',true);
         
        }
 }
    

