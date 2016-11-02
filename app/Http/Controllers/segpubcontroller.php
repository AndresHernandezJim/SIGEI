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
use App\emergencia;

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

    public function nueva_incidencia_sp(){
        $datalocal=array(
            'localidades'=> \App\localidad::get(),

        );
        $dataemergencia = array(
                'emergencias' => \App\emergencia::get(),
            );
        return view('visPoli.registroincidenciasp',$datalocal, $dataemergencia);
    }

    public function nueva_barandilla(){
         $data1 = \DB::table('persona')
        ->select('nombre', 'apellido', 'curp')
        ->get();
        //dd($data1);
        $data = array('personas' => $data1,
                      'localidades'=> \App\localidad::get(),
                      'ocupaciones'=> \DB::table('ocupacion')
                       ->select('id_ocupacion as id', 'nombre')
                       ->get()
                    );
    	return view('visPoli.newBarandilla',$data);
    }
    //====git status============================================================================================================
    //================================================================================================================
    //================================================================================================================
    public function showdet(){
       $data=\DB::table('persona')

            ->join('reporte_barandilla', 'persona.id_persona', '=', 'reporte_barandilla.id_persona')
            ->select('persona.nombre',
             'persona.apellido',
             'persona.foto',
             'persona.alias',
             'reporte_barandilla.id_reporte as id',
            'reporte_barandilla.created_at')
            ->where('reporte_barandilla.estatus', 1)
            ->paginate(2);
            //dd($data->all());

       ->join('reporte_barandilla','persona.id_persona','=','reporte_barandilla.id_persona')
       ->select('persona.nombre', 'persona.apellido','persona.foto','persona.alias','reporte_barandilla.id_reporte as id','reporte_barandilla.created_at')
       ->where('reporte_barandilla.estatus',1)
            ->paginate(3);
           // dd($data->all());

        $detenido=array('detenidos'=>$data);

        
        return view('visPoli.viewdet',$detenido);
    }
    
    public function guardabarandilla(Request $request){ 
         $guardado=\DB::table('reporte_barandilla as rb')->join('persona as p','rb.id_persona','=','p.id_persona')->where('p.curp','=',$request->curp)->where('rb.estatus','=',1)->count();
         //dd($guardado);
         if($guardado==0){

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
        //dd($persona);
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
                     $detenido->alias = $request->alias;
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
                $detenido->alias = $request->alias;
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
                 $detenido->alias = $request->alias;
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
                 $detenido->alias = $request->alias;
                $detenido->telefono = $request->telefono;
                $detenido->foto = $subir;
                $detenido->tipo=1;
                $detenido->activo_pd=0;
                $detenido->activo_sp=1;
                $detenido->save();
                $persona=\DB::table('persona')->select('id_persona')->where('curp','=',$request->curp)->first();//obtenemos el id de la persona 

             }
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
            $detenido->alias=$request->alias;
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
        //verificamos si no se encuentra en calidad de detenido


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
            $baran->lugar_arresto=$request->lugara;
            $baran->destino=$request->destino;
            $baran->pertenencias=$request->pertenencias;
            $baran->estatus=1;
            $baran->remite=$request->remite;
            $baran->observaciones=$request->observaciones;
            $baran->save();
            //return back()->with('exito',true);
            //$reportebarandilla=\DB::table('reporte_barandilla')->where('id_reporte','=',$id->id_reporte)->where('id_persona','=',$persona->id_persona)->first();
            //dd('insertó');
            return redirect('/consultadetenido');         
            }
        }
         return back()->with('error',true);
         
        }

        public function showdet2($id){

        $data=\DB::table('persona as p')->join('reporte_barandilla as rb','p.id_persona','=','rb.id_persona')
            ->join('ocupacion as o','o.id_ocupacion','=','p.id_ocupacion')
            ->join('lugar as l','p.id_lugar','=','l.id_lugar')->join('localidad as l2','l2.id_localidad','=','l.id_localidad')
            ->select(array('p.nombre','p.apellido','p.domicilio','p.curp','p.sexo','.alias','o.nombre as ocupacion','p.telefono','p.edad','p.foto','rb.causa','rb.pertenencias','rb.observaciones','l2.nombre as localidad','rb.remite','rb.destino','rb.lugar_arresto','rb.aseguramiento'))
            ->where('rb.id_reporte','=',$id)->first();
            if($data->sexo==1){
                $data->sexo="Masculino";
            }
            if($data->sexo==2){
                $data->sexo="Femenino";
            }
            if($data->destino==1){
                $data->destino="Remitído al Ministerio Público";
            }
            if($data->destino==2){
                $data->destino="Remitído a los Separos Preventivos";
            }

            $datos=array('info'=>$data);
        //dd($data);
        return view('visPoli.viewdet2',$datos);
    }

    public function liberar(Request $request){
         $reporte = \DB::table('reporte_barandilla')->where('id_reporte', '=', $request->id_rep)->update(['estatus' => 3]);
    }

    public function bus_per(){

        $data1 = \DB::table('persona')
        ->select('nombre', 'apellido', 'curp')
        ->get();
        //dd($data1);
        $persona = array('personas' => $data1,);
        return view('visPoli.historial', $persona);
    }

    public function detalleper_bara(Request $request){
        
        //dd($request->all());

        if (!empty($request->curp)) {
           $persona=\DB::table('persona')
            ->join('ocupacion','ocupacion.id_ocupacion','=','persona.id_ocupacion')
            ->join('lugar','persona.id_lugar','=','lugar.id_lugar')->join('localidad','localidad.id_localidad','=','lugar.id_localidad')
            ->select(array('persona.id_persona as id','persona.nombre','persona.tipo','persona.apellido','persona.domicilio','persona.curp','persona.sexo','ocupacion.nombre as ocupacion','persona.telefono','persona.foto','localidad.nombre as localidad'))
            ->where('persona.curp', $request->curp)
            ->first();
            //dd($persona->id);
             $numdet=\DB::table('persona as p')
            ->select(\DB::raw('COUNT(r.id_persona) as detenciones'), 'p.id_persona')
            ->join('reporte_barandilla as r', 'r.id_persona', '=', 'p.id_persona')
            ->where('r.id_persona', $persona->id)
            ->groupBY('r.id_persona')
            ->first();

            if($persona->sexo==1){
                    $persona->sexo="Masculino";
                }
            if($persona->sexo==2){
                    $persona->sexo="Femenino";
                }
            //se modificara el valor de tipo de la tabla persona por el numero de veses que esta, a sido encerrada
              $persona->tipo=$numdet->detenciones;
            //dd($persona);  
            $detencion=\DB::table('reporte_barandilla')
           ->select('id_reporte as id','created_at as fecha')
           ->where('id_persona', $persona->id)
           ->paginate(4);  
            //dd($detencion, $persona);

             $data= array('personax' => $persona,
                          'detenciones' => $detencion,
                        );

             return view('visPoli.hist_per', $data);
        }else{

            $fragmento = explode(", ", $request->nombre);
            //dd($fragmento[0]."----".$fragmento[1]);
             $persona=\DB::table('persona')
            ->join('ocupacion','ocupacion.id_ocupacion','=','persona.id_ocupacion')
            ->join('lugar','persona.id_lugar','=','lugar.id_lugar')->join('localidad','localidad.id_localidad','=','lugar.id_localidad')
            ->select(array('persona.id_persona as id','persona.nombre','persona.tipo','persona.apellido','persona.domicilio','persona.curp','persona.sexo','ocupacion.nombre as ocupacion','persona.telefono','persona.foto','localidad.nombre as localidad'))
            ->where('persona.nombre', $fragmento[0])
            ->where('persona.apellido', $fragmento[1])
            ->first();

             $numdet=\DB::table('reporte_barandilla')
            ->select(\DB::raw('COUNT(id_persona) as detenciones, id_persona'))
            ->where('id_persona', $persona->id)
            ->groupBY('id_persona')
            ->first();

             if($persona->sexo==1){
                    $persona->sexo="Masculino";
                }
                if($persona->sexo==2){
                    $persona->sexo="Femenino";
                }
            $persona->tipo=$numdet->detenciones;

           $detencion=\DB::table('reporte_barandilla')
           ->select('id_reporte as id','created_at as fecha')
           ->where('id_persona', $persona->id)
           ->paginate(4);  
            //dd($detencion, $persona);
            $data= array('personax' => $persona,
                          'detenciones' => $detencion,
                        );

             return view('visPoli.hist_per', $data);
   
        } 
    }


 }


    

