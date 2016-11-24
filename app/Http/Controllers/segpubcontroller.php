<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Helper\imagehelper;
use App\ocupacion;
use App\persona;
use App\lugar;
use App\localidad;
use App\Helper\reporte;
use App\Helper\barandilla;
use App\reportebarandilla;
use App\emergencia;
use App\reportesp;
use App\repsp_per;
use App\marca;
use App\modelo_vehiculo;
use App\tipo_vehiculo;
use App\vehiculo;
use App\reporte_vehiculo;
use App\heridos;
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
      
        $data1 = \DB::table('persona')
        ->select('nombre', 'curp')
        ->get();
        //dd($data1);
        $persona = array('personas' => $data1,
                        'emergencias' => \App\emergencia::get()->where('tipo','<>',2)->where('tipo','<>',3)->where('id','<>',1),
                        'localidades'=> \App\localidad::get(),
                        'ocupaciones'=>\App\ocupacion::get(),
                        );
        return view('visPoli.registroincidenciasp',$persona);
    }
    public function nueva_barandilla(){
        $data1 = \DB::table('persona')
            ->select('nombre', 'id_persona as id', 'curp')
            ->get();
            //dd($data1);
        $data = array('personas' => $data1,
                      'localidades'=> \App\localidad::get(),
                      'ocupaciones'=> \DB::table('ocupacion')->select('id_ocupacion as id', 'nombre')->get(),
                      'emergencias' => \App\emergencia::get()->where('tipo','<>',2)->where('tipo','<>',3)->where('id','<>',1),
                    );
    	return view('visPoli.newBarandilla',$data);
    }
    public function showdet(){
       $data=\DB::table('persona')
            ->join('reporte_barandilla', 'persona.id_persona', '=', 'reporte_barandilla.id_persona')
            ->select('persona.nombre',
             'reporte_barandilla.foto',
             'persona.alias',
             'reporte_barandilla.id_reporte as id',
            'reporte_barandilla.created_at')
            ->where('reporte_barandilla.estatus', 1)
            ->paginate(3);
            //dd($data->all());

        $detenido=array('detenidos'=>$data);

        
        return view('visPoli.viewdet',$detenido);
    } 
    public function guardabarandilla(Request $request){ 
            //dd($request->all());
            if($request->existente == 0){
                //dd("no existe la persona");
                 $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $request->ocupacion)->first();
                    if($id_ocupacion==null){//la ocupación no existe tenemos que crearla
                        $ocupacion = new ocupacion;
                        $ocupacion->nombre = $request->ocupacion;
                        $ocupacion->save();
                        $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $request->ocupacion)->first();
                    }
                       $idlugar= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $request->domicilio)->first();
                        if ($idlugar==null) {
                                //dd("no hay");
                            $dom=new lugar;
                            $dom->id_localidad=$request->local;
                            $dom->direccion=$request->domicilio;
                            $dom->save();
                            $idlugar= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $request->domicilio)->first();
                                //dd($idlugar->id_lugar);
                        }
                        //dd("todo bien");
                         //procedemos a registrar la persona con los campos obtenidos
                    $detenido = new persona;
                    $detenido->id_lugar = $idlugar->id_lugar;
                    $detenido->id_ocupacion = $id_ocupacion->id_ocupacion;
                    $detenido->nombre = $request->nombre;
                    $detenido->domicilio = $request->domicilio;
                    $detenido->curp = $request->curp;
                    $detenido->sexo = $request->sexo;
                    $detenido->edad = $request->edad;
                    $detenido->alias = $request->alias;
                    $detenido->telefono = $request->telefono;
                    $detenido->tipo=1;
                    $detenido->activo_sp=1;
                    $detenido->save();
                     //obtenemos el id de la persona 
                     $persona=\DB::table('persona')->select('id_persona')->orderby('id_persona','desc')->first();
                     //dd($persona);
                     //obtenemos el id del usuario quien esta creando el registro
                     $sesion=\DB::table('sys_sesion')->select('id_sesion')->orderby('id_sesion','desc')->first();
                     //creamos el reporte de barandilla

                        $nuevo= \DB::table('reporte')->insert([
                            'id_emergencia'=>1,
                            'tipo_aviso'=>3,
                            'id_lugar'=>1, //asegurarse que el primer lugar sea la misma DSPV
                            'fecha'=>DATE('Y-m-d H:i:s'),
                            'hora'=>Date('H:i:s'),
                            'canalizacion'=>null,
                            'detalles'=>"se remite ciudadano a los separos preventívos",
                            'id_sesion'=>$sesion->id_sesion
                        ]);
                        //obtenemos el id del reporte 
                        $id=\DB::table('reporte')->select('id_reporte')->orderby('id_reporte','desc')->first();
                         //subimos la foto
                        $file = $request->file('files');
                        $file = $file[0];
                        //dd($file);
                        if ($request->hasFile('files')) {
                            //  mandamos subir el archivo con el upload   
                            $subir=imagehelper::upload($file);
                            //dd($subir);
                        }
                       $persona=\DB::table('persona')->select('id_persona')->orderby('id_persona','desc')->first();
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
                            $baran->foto=$subir;
                            $baran->save();
                            //return back()->with('exito',true);
                            //$reportebarandilla=\DB::table('reporte_barandilla')->where('id_reporte','=',$id->id_reporte)->where('id_persona','=',$persona->id_persona)->first();
                            //dd('actuali');
                            return redirect('/consultadetenido');    
            }else{
                //verificamos si la persona ya registrada se encuentra con el tipo 1 que indica que esta en barandilla
                $encerrado = \DB::table('persona')
                ->select('tipo')
                ->where('id_persona', $request->id)
                ->first();  
                
                if($encerrado->tipo == 1){
                    return back()->with('error',true);
                }else{

                    $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $request->ocupacion)->first();
                    if($id_ocupacion==null){//la ocupación no existe tenemos que crearla
                        $ocupacion = new ocupacion;
                        $ocupacion->nombre = $request->ocupacion;
                        $ocupacion->save();
                        $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $request->ocupacion)->first();
                    }
                       $idlugar= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $request->domicilio)->first();
                        if ($idlugar==null) {
                                //dd("no hay");
                            $dom=new lugar;
                            $dom->id_localidad=$request->local;
                            $dom->direccion=$request->domicilio;
                            $dom->save();
                            $idlugar= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $request->domicilio)->first();
                                //dd($idlugar->id_lugar);
                        }
                   $actualido = \DB::table('persona')
                        ->where('id_persona', $request->id)
                        ->update([
                            'id_lugar' => $idlugar->id_lugar,
                            'id_ocupacion' => $id_ocupacion->id_ocupacion,
                            'alias' => $request->alias,
                            'domicilio' => $request->domicilio,
                            'edad' => $request->edad,
                            'telefono' => $request->telefono,
                            'activo_sp' => 1,
                            'tipo' => 1,
                            ]);
                        //dd("pues se actualizo esto");

                        $sesion=\DB::table('sys_sesion')->select('id_sesion')->orderby('id_sesion','desc')->first();
                        $nuevo= \DB::table('reporte')->insert([
                            'id_emergencia'=>1,
                            'tipo_aviso'=>3,
                            'id_lugar'=>1, //asegurarse que el primer lugar sea la misma DSPV
                            'fecha'=>DATE('Y-m-d H:i:s'),
                            'hora'=>Date('H:i:s'),
                            'canalizacion'=>null,
                            'detalles'=>"se remite ciudadano a los separos preventívos",
                            'id_sesion'=>$sesion->id_sesion
                        ]);
                        //obtenemos el id del reporte 
                        $id=\DB::table('reporte')->select('id_reporte')->orderby('id_reporte','desc')->first();
                         //subimos la foto
                        $file = $request->file('files');
                        $file = $file[0];
                        //dd($file);
                        if ($request->hasFile('files')) {
                            //  mandamos subir el archivo con el upload   
                            $subir=imagehelper::upload($file);
                            //dd($subir);
                        }
                       
                            $baran=new reportebarandilla;
                            $baran->id_reporte=$id->id_reporte;
                            $baran->id_persona=$request->$request->id;
                            $baran->causa=$request->causa;
                            $baran->lugar_arresto=$request->lugara;
                            $baran->destino=$request->destino;
                            $baran->pertenencias=$request->pertenencias;
                            $baran->estatus=1;
                            $baran->remite=$request->remite;
                            $baran->observaciones=$request->observaciones;
                            $baran->foto=$subir;
                            $baran->save();
                            //return back()->with('exito',true);
                            //$reportebarandilla=\DB::table('reporte_barandilla')->where('id_reporte','=',$id->id_reporte)->where('id_persona','=',$persona->id_persona)->first();
                            //dd('actuali');
                            return redirect('/consultadetenido');         
                }   
            }
    }
    public function showdet2($id){
        $data=\DB::table('persona as p')->join('reporte_barandilla as rb','p.id_persona','=','rb.id_persona')
            ->join('ocupacion as o','o.id_ocupacion','=','p.id_ocupacion')
            ->join('lugar as l','p.id_lugar','=','l.id_lugar')->join('localidad as l2','l2.id_localidad','=','l.id_localidad')
            ->join('emergencia as e','e.id','=','rb.causa')
            ->select(array('p.id_persona as id','p.nombre','p.domicilio','p.curp','p.sexo','.alias','o.nombre as ocupacion','p.telefono','p.edad','rb.foto','e.nombre as causa','rb.pertenencias','rb.observaciones','l2.nombre as localidad','rb.remite','rb.destino','rb.lugar_arresto','rb.aseguramiento'))
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
    public function showdet3($id){
        $data=\DB::table('persona as p')->join('reporte_barandilla as rb','p.id_persona','=','rb.id_persona')
            ->join('ocupacion as o','o.id_ocupacion','=','p.id_ocupacion')
            ->join('lugar as l','p.id_lugar','=','l.id_lugar')->join('localidad as l2','l2.id_localidad','=','l.id_localidad')
             ->join('emergencia as e','e.id','=','rb.causa')
            ->select(array('p.id_persona as id','p.nombre','p.domicilio','p.curp','p.sexo','.alias','o.nombre as ocupacion','p.telefono','p.edad','rb.foto','e.nombre as causa','rb.pertenencias','rb.observaciones','l2.nombre as localidad','rb.remite','rb.destino','rb.lugar_arresto','rb.aseguramiento'))
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
        return view('visPoli.viewdet3',$datos);
    }
    public function liberar(Request $request){
        $reporte = \DB::table('reporte_barandilla')
         ->where('id_reporte', '=', $request->id_rep)
         ->update(['estatus' => 3,
                   'updated_at' => DATE('Y-m-d H:i:s') 
                  ]);
    }
    public function bus_per(){

        $data1 = \DB::table('persona')
        ->select('nombre', 'curp')
        ->get();
        //dd($data1);
        $persona = array('personas' => $data1,);
        return view('visPoli.historial', $persona);
    }
    public function detalleper_bara(Request $request){
        
        //dd($request->all());

        if (!empty($request->curp)) {
            $persona=\DB::table('persona')
            ->select('id_persona as id')
            ->where('curp', $request->curp)
            ->first();
            return redirect('/segpub/barandilla/detperx/'.$persona->id);
          
        }else{

            $fragmento = explode(", ", $request->nombre);
            //dd($fragmento[0]."----".$fragmento[1]);
             $persona=\DB::table('persona')
            ->select('id_persona as id')
            ->where('persona.nombre', $fragmento[0])
            ->first();
            return redirect('/segpub/barandilla/detperx/'.$persona->id);
        } 
    }
    public function newrepvial(){
        $data1 = \DB::table('persona')
        ->select('nombre', 'curp')
        ->get();
        $dataecho=array(
            'personas'=>$data1,
            'emergencias'=>\DB::table('emergencia')->select(array('id','nombre'))->where('tipo',2)->get(),
            'localidades'=> \App\localidad::get(),
            'localidad'=> \App\localidad::get(),
            'estado'=>\App\estado::get(),
            'ocupaciones'=> \DB::table('ocupacion')->select('id_ocupacion as id', 'nombre')->get(),
            'modelo'=>\DB::table('modelo_vehiculo')->get(),
            'marca'=>\DB::table('marca_vehiculo')->get(),
            'tipo'=>\DB::table('tipo_vehiculo')->get(),
            );
       // dd($data);
       // dd($dataecho);
        return view('visPoli.newrepvial',$dataecho);
    }
    public function detalleper_bara2($id){
        $persona=\DB::table('persona')
            ->join('ocupacion','ocupacion.id_ocupacion','=','persona.id_ocupacion')
            ->join('lugar','persona.id_lugar','=','lugar.id_lugar')->join('localidad','localidad.id_localidad','=','lugar.id_localidad')
            ->select(array('persona.id_persona as id','persona.nombre','persona.tipo','persona.domicilio','persona.curp','persona.sexo','ocupacion.nombre as ocupacion','persona.telefono','localidad.nombre as localidad'))
            ->where('persona.id_persona', $id)
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
    public function storepersona(Request $request){
        $domicilio=$request->dom;
        $id_lugar= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $domicilio)->first();
       //dd($id_lugar);
                if($id_lugar==null){//no existe el lugar, hay que agregarlo
                    $dom=new lugar;
                    $dom->id_localidad=$request->local;
                    $dom->direccion=$domicilio;
                    $dom->save();
                    $id_lugar= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $domicilio)->first(); //obtenemos el id de lugar ojo-*****
                }
              //dd($id_lugar);  
        $sesion=\DB::table('sys_sesion')->select('id_sesion')->orderby('id_sesion','desc')->first();
        $nuevo= \DB::table('reporte')->insert([
            'id_emergencia'=>$request->emergencia,
            'tipo_aviso'=>$request->atencion,
            'id_lugar'=>$id_lugar->id_lugar, //asegurarse que el primer lugar sea la misma DSPV
            'fecha'=>DATE('Y-m-d H:i:s'),
            'hora'=>$request->time.':00',
            'canalizacion'=>null,
            'detalles'=>"Registro de suceso de seguridad pública",
            'id_sesion'=>$sesion->id_sesion]);
            //obtenemos el id del reporte 
           $id=\DB::table('reporte')->select('id_reporte')->orderby('id_reporte','desc')->first();
            $reportesp=\DB::table('reporte_sp')->insert([
                    'id_reporte'=>$id->id_reporte,
                    'id_emergencia'=>$request->emergencia,
                    'tipoaviso'=>$request->atencion,
                    'unidad'=>$request->unidad,
                    'created_at'=>DATE('Y-m-d H:i:s'),
                    'updated_at'=>DATE('Y-m-d H:i:s'),
                    'oficiales'=>$request->policias,
                    'observaciones'=>$request->observaciones,
                    'hora'=>$request->time.':00']
                    );
            $repsp=\DB::table('reporte_sp')->first();
            $id=\DB::table('reporte')->select('id_reporte')->orderby('id_reporte','desc')->first();
            //dd($request->all());
            //variables que indican la cantidad de personas en el array
            $size=sizeof($request->agrav);
            $size2=sizeof($request->asegu);
            //insercion de los asegurados y a graviados
            for ($i=0; $i < $size ; $i++) {
                $agraviado=$request->agrav[$i]; 
                //dd($agraviado['localidad']);
                //obtenemos el registro de la persona si es que existe
                $persona=\DB::table('persona')->select('id_persona')->where('curp','=',$agraviado['curp'])->first(); 
                //dd($persona);   
                if($persona==null){ //no existe la persona, hay que agregarla
                    //verificamos si equiste la localidad si existe obtenemos el id si no la agregamos
                    $localidad=\DB::table('localidad')->select('id_localidad')->where('nombre','=',$agraviado['localidad'])->first();
                    //dd($localidad);
                    if($localidad==null){
                        //dd($agraviado['localidad']);
                        $loc=new localidad;
                        $loc->nombre=$agraviado['localidad'];
                        $loc->id_municipio=3;
                        $loc->save();
                        $localidad=\DB::table('localidad')->select('id_localidad')->orderby('id_localidad','desc')->first();
                       // dd($localidad);
                    }
                    //verificamos datos del lugar
                    $domicilio2=$agraviado['domicilio'];
                    //dd($domicilio2);
                    $id_lugar2= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $domicilio2)->first();
                    //dd($id_lugar2);
                    if($id_lugar2==null){//no existe el lugar, hay que agregarlo
                        $dom=new lugar;
                        $dom->id_localidad=$localidad->id_localidad;
                        $dom->direccion=$domicilio2;
                        $dom->save();
                        $id_lugar2= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $domicilio2)->first(); //obtenemos el id de lugar ojo-*****
                    }
                    //dd($id_lugar2);
                    //verificamos si existe  la ocupacion
                    $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $agraviado['ocupacion'])->first();
                    if($id_ocupacion==null){//la ocupación no existe tenemos que crearla
                        $ocupacion = new ocupacion;
                        $ocupacion->nombre = $agraviado['ocupacion'];
                        $ocupacion->save();
                        //se hace nuevamente la consulta para obtener el id de la nueva profesión
                        $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $agraviado['ocupacion'])->first();
                    }
                       //procedemos a registrar la persona con los campos obtenidos
                    $detenido = new persona;
                    $detenido->id_lugar = $id_lugar2->id_lugar;
                    $detenido->id_ocupacion = $id_ocupacion->id_ocupacion;
                    $detenido->nombre = $agraviado['nombre'];
                    $detenido->domicilio = $domicilio2;
                    $detenido->curp = $agraviado['curp'];
                    $detenido->sexo = $agraviado['sexo'];
                    $detenido->edad = $agraviado['edad'];
                    $detenido->telefono = $agraviado['telefono'];
                    $detenido->tipo=3;
                    $detenido->activo_pd=0;
                    $detenido->activo_sp=1;
                    $detenido->save();
                    $persona=\DB::table('persona')->select('id_persona')->where('curp','=',$agraviado['curp'])->first();//obtenemos el id de la persona 
                    //dd($persona);
                    //registramos la persona en la tabla detalles de insidencia sp
                    $detalle= new repsp_per;
                    $detalle->id_reporte=$id->id_reporte;
                    $detalle->id_persona=$persona->id_persona;
                    $detalle->estatus=1;
                    $detalle->save();
                }
                else{ // la persona si existe, la registramos en la tabla detalles de insidencia sp
                    $detalle= new repsp_per;
                    $detalle->id_reporte=$id->id_reporte;
                    $detalle->id_persona=$persona->id_persona;
                    $detalle->estatus=1;
                    $detalle->save();
                }
            }
            for ($i=0; $i < $size2; $i++) { 
                $asegurado=$request->asegu[$i];
                //obtenemos el registro de la persona si es que existe
                $persona=\DB::table('persona')->select('id_persona')->where('curp','=',$asegurado['curp'])->first();    
                if($persona==null){ //no existe la persona, hay que agregarla
                    //verificamos si equiste la localidad si existe obtenemos el id si no la agregamos
                    $localidad=\DB::table('localidad')->select('id_localidad')->where('nombre','=',$asegurado['localidad'])->first();
                    //dd($localidad);
                    if($localidad==null){
                        //dd($agraviado['localidad']);
                        $loc=new localidad;
                        $loc->nombre=$asegurado['localidad'];
                        $loc->id_municipio=3;
                        $loc->save();
                        $localidad=\DB::table('localidad')->select('id_localidad')->orderby('id_localidad','desc')->first();
                       // dd($localidad);
                    }
                    //verificamos datos del lugar
                    $domicilio2=$asegurado['domicilio'];
                    $id_lugar= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $domicilio2)->first();
                    //dd($id_lugar);
                    if($id_lugar==null){//no existe el lugar, hay que agregarlo
                        $dom=new lugar;
                        $dom->id_localidad=$localidad->id_localidad;
                        $dom->direccion=$domicilio;
                        $dom->save();
                        $id_lugar= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $domicilio2)->first(); //obtenemos el id de lugar ojo-*****
                    }
                    //verificamos si existe  la ocupacion
                    $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $asegurado['ocupacion'])->first();
                    if($id_ocupacion==null){//la ocupación no existe tenemos que crearla
                        $ocupacion = new ocupacion;
                        $ocupacion->nombre = $asegurado['ocupacion'];
                        $ocupacion->save();
                        //se hace nuevamente la consulta para obtener el id de la nueva profesión
                        $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $asegurado['ocupacion'])->first();
                    }
                       //procedemos a registrar la persona con los campos obtenidos
                    $detenido = new persona;
                    $detenido->id_lugar = $id_lugar->id_lugar;
                    $detenido->id_ocupacion = $id_ocupacion->id_ocupacion;
                    $detenido->nombre = $asegurado['nombre'];
                    $detenido->domicilio = $domicilio2;
                    $detenido->curp = $asegurado['curp'];
                    $detenido->sexo = $asegurado['sexo'];
                    $detenido->edad = $asegurado['edad'];
                    $detenido->telefono = $asegurado['telefono'];
                    $detenido->tipo=3;
                    $detenido->activo_pd=0;
                    $detenido->activo_sp=1;
                    $detenido->save();
                    $persona=\DB::table('persona')->select('id_persona')->where('curp','=',$asegurado['curp'])->first();//obtenemos el id de la persona 
                    //dd($persona);
                    //registramos la persona en la tabla detalles de insidencia sp
                    $detalle= new repsp_per;
                    $detalle->id_reporte=$id->id_reporte;
                    $detalle->id_persona=$persona->id_persona;
                    $detalle->estatus=2;
                    $detalle->save();
                }
                else{ // la persona si existe, la registramos en la tabla detalles de insidencia sp
                    $detalle= new repsp_per;
                    $detalle->id_reporte=$id->id_reporte;
                    $detalle->id_persona=$persona->id_persona;
                    $detalle->estatus=2;
                    $detalle->save();
                } 
                
            }
        return redirect('/poli');
    }
    public function get_user_info(Request $request){
        //dd($request->all());
         $get=\DB::table('persona')
            ->join('ocupacion','ocupacion.id_ocupacion','=','persona.id_ocupacion')
            ->join('lugar','persona.id_lugar','=','lugar.id_lugar')
            // ->join('localidad','localidad.id_localidad','=','lugar.id_localidad')
            ->select(
                'persona.id_persona as id',
                'persona.nombre',
                'persona.domicilio',
                'persona.curp',
                'persona.edad',
                'persona.sexo',
                'persona.alias',
                'ocupacion.nombre as ocupacion',
                'persona.telefono',
                'lugar.id_localidad as localidad'
            )
            ->where('persona.id_persona', $request->id)
            ->get();
        if( count($get) == 1 )
            return json_encode($get[0]);
    }
    public function newvial(Request $request){
        //dd($request->all());
       $sesion=\DB::table('sys_sesion')->select('id_sesion')->orderby('id_sesion','desc')->first();
        if($request->numero1==0){
            $domicilio=$request->calle1." S/N colonia ".$request->colonia1;
        }
        else{
            $domicilio=$request->calle1." #".$request->numero1." colonia ".$request->colonia1;
        }       
        $lugarinsidencia=\DB::table('lugar')->select('id_lugar')->where('direccion','=',$domicilio)->first();
        if($lugarinsidencia==null){
            $dom=new lugar;
            $dom->id_localidad=$request->local;
            $dom->direccion=$domicilio;
            $dom->save();
            $lugarinsidencia= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $domicilio)->first(); 
            //obtenemos el id de lugar ojo-****
        }
        $nuevo= \DB::table('reporte')->insert([
            'id_emergencia'=>$request->emergencia,
            'tipo_aviso'=>$request->tipoaviso   ,
            'id_lugar'=>$lugarinsidencia->id_lugar, //asegurarse que el primer lugar sea la misma DSPV
            'fecha'=>DATE('Y-m-d H:i:s'),
            'hora'=>$request->time.':00',
            'canalizacion'=>null,
            'detalles'=>"Registro de suceso de Vialidad",
            'id_sesion'=>$sesion->id_sesion]);
            //obtenemos el id del reporte 
        $id=\DB::table('reporte')->select('id_reporte')->orderby('id_reporte','desc')->first();
        //registramos los heridos
        //dd($request->herido);
        $tamaño=sizeof($request->herido);
        if($tamaño !=0){
            for($i=0;$i<$tamaño;$i++){
                $herido=$request->herido[$i];
                $persona=\DB::table('persona')->select('id_persona')->where('nombre','=',$herido['nombre'])->first();
                if($persona==null){
                   $localidad=\DB::table('localidad')->select('id_localidad')->where('nombre','=',$herido['localidad'])->first();
                    if($localidad==null){
                        $loc=new localidad;
                        $loc->nombre=$agraviado['localidad'];
                        $loc->id_municipio=3;
                        $loc->save();
                        $localidad=\DB::table('localidad')->select('id_localidad')->orderby('id_localidad','desc')->first();
                    } //dd($localidad);
                    //verificamos datos del lugar
                    $domicilio2=$herido['domicilio'];
                    //dd($domicilio2);
                    $id_lugar= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $domicilio2)->first();
                    //dd($id_lugar);
                    if($id_lugar==null){//no existe el lugar, hay que agregarlo
                        $dom=new lugar;
                        $dom->id_localidad=$localidad->id_localidad;
                        $dom->direccion=$domicilio2;
                        $dom->save();
                        $id_lugar= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $domicilio2)->first(); //obtenemos el id de lugar ojo-*****
                        //dd($id_lugar);
                    }
                    //dd($id_lugar);
                    //verificamos si existe  la ocupacion
                    $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $herido['ocupacion'])->first();
                    if($id_ocupacion==null){//la ocupación no existe tenemos que crearla
                        $ocupacion = new ocupacion;
                        $ocupacion->nombre = $herido['ocupacion'];
                        $ocupacion->save();
                        //se hace nuevamente la consulta para obtener el id de la nueva profesión
                        $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $herido['ocupacion'])->first();

                    }
                       //procedemos a registrar la persona con los campos obtenidos
                    $detenido = new persona;
                    $detenido->id_lugar = $id_lugar->id_lugar;
                    $detenido->id_ocupacion = $id_ocupacion->id_ocupacion;
                    $detenido->nombre = $herido['nombre'];
                    $detenido->domicilio = $domicilio2;
                    $detenido->curp = $herido['curp'];
                    $detenido->sexo = $herido['sexo'];
                    $detenido->edad = $herido['edad'];
                    $detenido->telefono = $herido['telefono'];
                    $detenido->tipo=3;
                    $detenido->activo_pd=0;
                    $detenido->activo_sp=1;
                    $detenido->save();  
                 $persona=\DB::table('persona')->select('id_persona')->where('nombre','=',$herido['nombre'])->first();
                }
                $tab=new heridos;
                $tab->reporte=$id->id_reporte;
                $tab->id_persona=$persona->id_persona;
                $tab-save();
            }
        }
        //comenzamos con los conductores para poder registrar el vehiculo 
        $tam=sizeof($request->vehiculo);
        for ($i=0; $i < $tam; $i++) { 
            $vehiculo=$request->vehiculo[$i];
            $persona=\DB::table('persona')->select('id_persona')->where('nombre','like','%'.$vehiculo['nombre'].'%')->first();
            if($persona==null){
                   $localidad=\DB::table('localidad')->select('id_localidad')->where('nombre','=',$vehiculo['localidad'])->first();
                    if($localidad==null){
                        $loc=new localidad;
                        $loc->nombre=$agraviado['localidad'];
                        $loc->id_municipio=3;
                        $loc->save();
                        $localidad=\DB::table('localidad')->select('id_localidad')->orderby('id_localidad','desc')->first();
                    } //dd($localidad);
                    //verificamos datos del lugar
                    $domicilio2=$vehiculo['domicilio'];
                    //dd($domicilio2);
                    $id_lugar= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $domicilio2)->first();
                    //dd($id_lugar);
                    if($id_lugar==null){//no existe el lugar, hay que agregarlo
                        $dom=new lugar;
                        $dom->id_localidad=$localidad->id_localidad;
                        $dom->direccion=$domicilio2;
                        $dom->save();
                        $id_lugar= \DB::table('lugar')->select('id_lugar')->where('direccion','=', $domicilio2)->first(); //obtenemos el id de lugar ojo-*****
                        //dd($id_lugar);
                    }
                    //dd($id_lugar);
                    //verificamos si existe  la ocupacion
                    $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $vehiculo['ocupacion'])->first();
                    if($id_ocupacion==null){//la ocupación no existe tenemos que crearla
                        $ocupacion = new ocupacion;
                        $ocupacion->nombre = $vehiculo['ocupacion'];
                        $ocupacion->save();
                        //se hace nuevamente la consulta para obtener el id de la nueva profesión
                        $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $vehiculo['ocupacion'])->first();

                    }
                       //procedemos a registrar la persona con los campos obtenidos
                    $detenido = new persona;
                    $detenido->id_lugar = $id_lugar->id_lugar;
                    $detenido->id_ocupacion = $id_ocupacion->id_ocupacion;
                    $detenido->nombre = $vehiculo['nombre'];
                    $detenido->domicilio = $domicilio2;
                    $detenido->curp = $vehiculo['curp'];
                    $detenido->sexo = $vehiculo['sexo'];
                    $detenido->edad = $vehiculo['edad'];
                    $detenido->telefono = $vehiculo['telefono'];
                    $detenido->tipo=3;
                    $detenido->activo_pd=0;
                    $detenido->activo_sp=1;
                    $detenido->save();  
                 $persona=\DB::table('persona')->select('id_persona')->where('nombre','=',$vehiculo['nombre'])->first();
            }else{
                $dom=$vehiculo['domicilio'];
                 //verificamos si el domicilio  nuevo es el que está registrado en la persona,
                $domg=\DB::table('lugar as l')->join('persona as p','p.id_lugar','=','l.id_lugar')->select('l.direccion')->where('p.id_persona','=',$persona->id_persona)->first();
                if($domg->direccion==$dom){
                    //los domicilios son iguales solo actualizar los siguientes campos ocupacion 
                    $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $vehiculo['ocupacion'])->first();
                    if($id_ocupacion==null){//la ocupación no existe tenemos que crearla
                        $ocupacion = new ocupacion;
                        $ocupacion->nombre = $vehiculo['ocupacion'];
                        $ocupacion->save();
                        //se hace nuevamente la consulta para obtener el id de la nueva profesión
                        $id_ocupacion = \DB::table('ocupacion')->select('id_ocupacion')->where('nombre','=', $vehiculo['ocupacion'])->first();
                    }
                    $actualizar=\DB::table('persona')->where('id_persona','=',$persona->id_persona)->update(array(
                        'id_ocupacion'=>$id_ocupacion->id_ocupacion));
                }else{
                    //los domicilios no son iguales hay que verificar si el lugar existe
                    $lugar=\DB::table('lugar')->select('id_lugar')->where('direccion','=',$dom)->first();
                    if($lugar==null){
                        //lugar no existe, crealo
                        $localidad=\DB::table('localidad')->select('id_localidad')->where('nombre','=',$vehiculo['localidad'])->first();
                        $lugar=new lugar;
                        $lugar->direccion=$dom;
                        $lugar->id_localidad=$localidad->id_localidad;
                        $lugar->save();
                        $lugar=\DB::table('lugar')->select('id_lugar')->where('direccion','=',$dom)->first();
                    }else{
                        $actualizar=\DB::table('persona')->where('id_persona','=',$persona->id_persona)->update(array('id_lugar'=>$lugar->id_lugar,'domicilio'=>$dom,'telefono'=>$vehiculo['telefono']));
                    }
                }
            }
            // verificamos los datos del vehiculo
            $marca=$vehiculo['marca'];
            $modelo=$vehiculo['modelo'];
            $año=$vehiculo['anio'];
            $serie=$vehiculo['serie'];
            $placas=$vehiculo['placas'];
            $tipo=$vehiculo['tipo'];
            $asegurado=$vehiculo['asegurado'];
            $adeudo=$vehiculo['adeudo'];
            $ubicacion=$vehiculo['ubicacion'];
            $caracteristicas=$vehiculo['caracteristicas'];
            if(empty($ubicacion)){
                $ubicacion=0;
            }
            if(empty($adeudo)){
                $adeudo=0.0;
            }
            $estado=\DB::table('estado')->select('id_estado')->where('nombre','=',$vehiculo['estado'])->first();
            //verificamos si existe la marca nombrada
            $dbmarca=\DB::table('marca_vehiculo')->select('id_marca')->where('nombre','=',$marca)->first();
            if($dbmarca==null){//si no existe lo creamos
                $marc=new marca;
                $marc->nombre=$marca;
                $marc->save();
                $dbmarca=\DB::table('marca_vehiculo')->select('id_marca')->where('nombre','=',$marca)->first();
            }
            //verificamos si estáregistrado el modelo del vehiculo
            $dbmodve=\DB::table('modelo_vehiculo')->select('id_modelo')->where('id_marca','=',$dbmarca->id_marca)->where('nombre','=',$modelo)->where('anio','=',$año)->first();
            if($dbmodve==null){
                $mod=new modelo_vehiculo;
                $mod->id_marca=$dbmarca->id_marca;
                $mod->nombre=$modelo;
                $mod->anio=$año;
                $mod->save();
                $dbmodve=\DB::table('modelo_vehiculo')->select('id_modelo')->where('id_marca','=',$dbmarca->id_marca)->where('nombre','=',$modelo)->where('anio','=',$año)->first();
            }
            $dbtipo=\DB::table('tipo_vehiculo')->select('id_tipo')->where('nombre','=',$tipo)->first();
            if($dbtipo==null){
                $db=new tipo_vehiculo;
                $db->nombre=$tipo;
                $db->save();
                $dbtipo=\DB::table('tipo_vehiculo')->select('id_tipo')->where('nombre','=',$tipo)->first();
            }
            $dbvehiculo=\DB::table('vehiculo')->select('id_vehiculo')->where('id_modelo','=',$dbmodve->id_modelo)->where('id_tipo','=',$dbtipo->id_tipo)->first();
            if($dbvehiculo==null){
                //insertamos el vehiculo
                if(empty($serie)){
                    if($asegurado==2){
                        $vehi=new  vehiculo;
                        $vehi->id_modelo=$dbmodve->id_modelo;
                        $vehi->id_tipo=$dbtipo->id_tipo;
                        $vehi->id_estado=$estado->id_estado;
                        $vehi->detalles=$caracteristicas;
                        $vehi->ubicacion=$ubicacion;
                        $vehi->adeudo=$adeudo;
                        $vehi->placas=$placas;
                        $vehi->save();
                    }else{
                        $vehi=new  vehiculo;
                        $vehi->id_modelo=$dbmodve->id_modelo;
                        $vehi->id_tipo=$dbtipo->id_tipo;
                        $vehi->id_estado=$estado->id_estado;
                        $vehi->detalles=$caracteristicas;
                        $vehi->liberado=1;
                        $vehi->ubicacion=$ubicacion;
                        $vehi->adeudo=$adeudo;
                        $vehi->placas=$placas;
                        $vehi->save();
                    }
                }else{
                    if($asegurado==2){
                        $vehi=new  vehiculo;
                        $vehi->id_modelo=$dbmodve->id_modelo;
                        $vehi->id_tipo=$dbtipo->id_tipo;
                        $vehi->id_estado=$estado->id_estado;
                        $vehi->detalles=$caracteristicas;
                        $vehi->serie=$serie;
                        $vehi->ubicacion=$ubicacion;
                        $vehi->adeudo=$adeudo;
                        $vehi->placas=$placas;
                        $vehi->save();
                    }else{
                        $vehi=new  vehiculo;
                        $vehi->id_modelo=$dbmodve->id_modelo;
                        $vehi->id_tipo=$dbtipo->id_tipo;
                        $vehi->id_estado=$estado->id_estado;
                        $vehi->detalles=$caracteristicas;
                        $vehi->liberado=1;
                        $vehi->serie=$serie;
                        $vehi->ubicacion=$ubicacion;
                        $vehi->adeudo=$adeudo;
                        $vehi->placas=$placas;
                        $vehi->save();
                    }
                }
                $dbvehiculo=\DB::table('vehiculo')->select('id_vehiculo')->where('id_modelo','=',$dbmodve->id_modelo)->where('id_tipo','=',$dbtipo->id_tipo)->first();
            }
            //tabla reporte vehiculo
            $responsable=$vehiculo['responsable'];
            if($responsable==1){
                $newve=new reporte_vehiculo;
                $newve->id_reporte=$id->id_reporte;
                $newve->id_vehiculo=$dbvehiculo->id_vehiculo;
                $newve->id_conductor=$persona->id_persona;
                $newve->probable_resp=0;
                $newve->detalles=$caracteristicas;
                $newve->save();
                $reporteve=\DB::table('reporte_vehiculo')->where('id_reporte','=',$id->id_reporte)->where('id_vehiculo','=',$dbvehiculo->id_vehiculo)->first();

            }
            if($responsable==2){
                $newve=new reporte_vehiculo;
                $newve->id_reporte=$id->id_reporte;
                $newve->id_vehiculo=$dbvehiculo->id_vehiculo;
                $newve->id_conductor=$persona->id_persona;
                $newve->probable_resp=1;
                $newve->detalles=$caracteristicas;
                $newve->save();
                $reporteve=\DB::table('reporte_vehiculo')->where('id_reporte','=',$id->id_reporte)->where('id_vehiculo','=',$dbvehiculo->id_vehiculo)->first();
            }
        }
        return redirect('/poli');
    }
    public function vialplacas(){
        $placas = \DB::table('vehiculo')
        ->select('placas')
        ->get();
         $data= array('placas' => $placas,);
        return view('vispoli.consultaplacas', $data);
    }
    public function get_auto_info(Request $request){
        $auto = \DB::table('vehiculo as v')
        ->join('modelo_vehiculo as mv', 'mv.id_modelo', '=','v.id_modelo')
        ->join('tipo_vehiculo as tv', 'tv.id_tipo', '=', 'v.id_tipo')
        ->join('reporte_vehiculo as rv', 'rv.id_vehiculo', '=', 'v.id_vehiculo')
        ->join('estado as e', 'e.id_estado', '=', 'v.id_estado')
        ->select('mv.nombre as modelo',
            'mv.anio as anii',
            'rv.created_at as registrado',
            'rv.updated_at as liberado1',
            'tv.nombre as tipo',
            'e.nombre as estado',
            'v.id_vehiculo',
            'v.detalles',
            'v.ubicacion',
            'v.liberado',
            'v.adeudo',
            'v.placas'
        )
        ->where('v.placas', $request->placa)
        ->get();
        if( count($auto) == 1 ){
            $auto = $auto[0];
            //asignacion para el valor de liberado
            $auto->liberado = $auto->liberado == 0 ? "Liberado" : "No liberado";
            //asignacion para el valor de ubicación
            switch($auto->ubicacion){
                case 1:
                    $auto->ubicacion = "El mesquite";
                    break;
                case 2:
                    $auto->ubicacion = "Gruas Ralf";
                    break;
                case 3:
                    $auto->ubicacion = "Corralon del complejo";
                    break;
                default:
                    $auto->ubicacion = "libre";
            }

            return json_encode($auto);
        }
    }
    public function get_auto_libre(Request $request){
        //dd($request->all());
        $update = \DB::table('vehiculo')
                            ->where('placas', $request->placa)
                            ->update([
                                'liberado' => 0,
                                'adeudo' => 0,
                            ]);

        $update1 = \DB::table('reporte_vehiculo')
                            ->where('id_vehiculo', $request->id)
                            ->update(['updated_at' => DATE('Y-m-d H:i:s')]);

        $modificado = \DB::table('vehiculo as v')
                                ->join('reporte_vehiculo as rv', 'rv.id_vehiculo', '=', 'v.id_vehiculo')
                                ->select('rv.updated_at as liberadoo','v.liberado', 'v.adeudo')
                                ->where('placas', $request->placa)
                                ->get();
        //dd($modificado);
            $modificado = $modificado[0];
            return json_encode($modificado);
    }
    public function searchdate(Request $request){
        return view('vispoli.con_fec');
    }
    public function vialfecha1(Request $request){
        $data=\DB::table('vehiculo as v')
                 ->join('modelo_vehiculo as mov','mov.id_modelo','=','v.id_modelo')
                 ->join('marca_vehiculo as mav','mav.id_marca','=','mov.id_marca')
                 ->join('reporte_vehiculo as rv','v.id_vehiculo','=','rv.id_vehiculo')
                 ->select('mav.nombre as marca','mov.nombre as modelo','mov.anio as anio','v.placas as placas')
                 ->where((\DB::raw('DATE(rv.created_at)')),'like',$request->fecha)
                 ->get();
        return json_encode($data);
    }
    public function vialfecha2(Request $request){
        $data=\DB::table('vehiculo as v')
                 ->join('modelo_vehiculo as mov','mov.id_modelo','=','v.id_modelo')
                 ->join('marca_vehiculo as mav','mav.id_marca','=','mov.id_marca')
                 ->join('reporte_vehiculo as rv','v.id_vehiculo','=','rv.id_vehiculo')
                 ->select('mav.nombre as marca','mov.nombre as modelo','mov.anio as anio','v.placas as placas')
                 ->wherebetween ((\DB::raw('DATE(rv.created_at)')),[$request->fecha,$request->fecha2])
                 ->get();
        return json_encode($data);
    }
    public function llamadas(){
        return view('vispoli.llamadas');
    }
    public function llamadafecha1(Request $request){
        //dd($request->all());
        $llamada=\DB::table('reporte as r')
                    ->join('tipo_aviso as ta','ta.id_tipo','=','r.tipo_aviso')
                    ->select((\DB::raw('COUNT(r.id_reporte) as cantidad')),'ta.nombre')
                    ->groupBY('ta.nombre')
                    ->where((\DB::raw('DATE(r.fecha)')),'=',$request->fecha)
                    ->get();
        return json_encode($llamada);
    }
    public function llamadafecha2(Request $request){
        //dd($request->all());
        $llamada2=\DB::table('reporte as r') 
        ->join('tipo_aviso as ta','ta.id_tipo','=','r.tipo_aviso') 
        ->select((\DB::raw('COUNT(r.id_reporte) as cantidad')),'ta.nombre') 
        ->groupBY('ta.nombre') 
        ->wherebetween('r.fecha',[$request->fecha,$request->fecha2]) 
        ->get();
        return json_encode($llamada2);
    }
    public function insp(){
        return view('vispoli.incidenciasp');
    }
    //funcon ajax de incidencias
    public function get_incidencias(Request $request){
        $fecha=DATE('Y-').$request->mes."-01";
        $dias= cal_days_in_month(CAL_GREGORIAN, $request->mes, DATE('Y'));
        $fecha2 =Date('Y-').$request->mes.'-'.$dias;
        //dd($fecha2);
        
        $data=\DB::table('reporte_sp as sp')
            ->join('reporte as r','r.id_reporte','=','sp.id_reporte')
            ->join('emergencia as e','e.id','=','sp.id_emergencia')
            ->join('lugar as l','l.id_lugar','=','r.id_lugar')
            ->join('tipo_aviso as ta','ta.id_tipo','=','sp.tipoaviso')
            ->select('l.direccion',(\DB::raw('DATE_FORMAT(sp.created_at,"%b %d %Y") as fecha')),
                'sp.hora','ta.nombre as aviso','e.nombre as emergencia','sp.id_reporte as id')
            ->wherebetween('sp.created_at',[$fecha,$fecha2])
            ->orderBy('fecha', 'DESC')
            ->get();           
        return json_encode($data);
    }
    public function detalleincidencia($id){
        //dd($id);
        $data=array(
                'reporte'=>\DB::table('reporte_sp as rep')
                    ->join('emergencia as e','e.id','=','rep.id_emergencia')
                    ->join('reporte as r','r.id_reporte','=','rep.id_reporte')
                    ->join('lugar as lug','lug.id_lugar','=','r.id_lugar')
                    ->join('localidad as loc','loc.id_localidad','=','lug.id_localidad')
                    ->join('tipo_aviso as ta','ta.id_tipo','=','rep.tipoaviso')
                    ->select((\DB::raw('Date_format(rep.created_at,"%d del %c de %Y" )as fecha')),'e.nombre as emergencia','rep.hora','loc.nombre as localidad','lug.direccion','rep.unidad','rep.oficiales','rep.observaciones','ta.nombre as aviso')
                    ->where('rep.id_reporte','=',$id)
                    ->first(),
                'agraviados'=>\DB::table('persona as p')
                    ->join('lugar as l','l.id_lugar','=','p.id_lugar')
                    ->join('localidad as loc','l.id_localidad','=','loc.id_localidad')
                    ->join('detalle_per_rep as det','det.id_persona','p.id_persona')
                    ->join('ocupacion as o','p.id_ocupacion','=','o.id_ocupacion')
                    ->select('p.nombre as persona','p.curp','p.sexo','o.nombre as ocupacion','p.edad','p.telefono','l.direccion','loc.nombre as localidad')
                    ->where('det.id_reporte','=',$id)
                    ->where('det.estatus','=',1)
                    ->get(),
                'asegurados'=>\DB::table('persona as p')
                    ->join('lugar as l','l.id_lugar','=','p.id_lugar')
                    ->join('localidad as loc','l.id_localidad','=','loc.id_localidad')
                    ->join('detalle_per_rep as det','det.id_persona','p.id_persona')
                    ->join('ocupacion as o','p.id_ocupacion','=','o.id_ocupacion')
                    ->select('p.nombre as persona','p.curp','p.sexo','o.nombre as ocupacion','p.edad','p.telefono','l.direccion','loc.nombre as localidad')
                    ->where('det.id_reporte','=',$id)
                    ->where('det.estatus','=',2)

                    ->get(),
        );
        return view('visPoli.incidenciasp2',$data);
    }
 }
