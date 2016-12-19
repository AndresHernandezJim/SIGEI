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
class DirectorController extends Controller
{
     public function logout(){
        session()->forget('Admin');
        return redirect('/');
    }

    public function insp(){
        return view('visDir.incidenciaspD');
    }
    public function nusu(){
        $data=array(
            'privilegios'=> \App\privilegios::get(),
        );
        return view('/visDir/nusu',$data);
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

        return redirect('/director');
    }
    public function changepass(Request $request){
        
    }
    public function index(){
        //dd("direcon");
        $año=date('Y');
        $mes=date('m');
        $fecha=DATE('Y-m')."-01";
        $dias= cal_days_in_month(CAL_GREGORIAN, date('m'), DATE('Y'));
        $fecha2 =Date('Y-m').'-'.$dias;
        if($mes==1 && $dias<1){
            $año--;
        }
    	$get = \DB::table('reporte as r')
        		->select(
        			\DB::raw('COUNT(m.id) AS cantidad'),
        			'm.nombre as emergencia'
    			)
    			->join('emergencia AS m','m.id','=','r.id_emergencia')
    			->join('tipo_reporte AS tr','tr.id_tiporep','=','m.tipo')
    			->groupBy('m.id')
    			->orderBy('cantidad','DESC')
    			->limit(5);
        $data = [
        	'uno' => \DB::table('reporte as r')
        		->select(
        			\DB::raw('COUNT(m.id) AS cantidad'),
        			'm.nombre as emergencia'
    			)
    			->join('emergencia AS m','m.id','=','r.id_emergencia')
    			->join('tipo_reporte AS tr','tr.id_tiporep','=','m.tipo')
    			->groupBy('m.id')
    			->orderBy('cantidad','DESC')
    			->limit(5)
    			->get(),
    		'dos' => \DB::table('reporte as r')
        		->select(
        			\DB::raw('COUNT(m.id) AS cantidad'),
        			'm.nombre as emergencia'
    			)
    			->join('emergencia AS m','m.id','=','r.id_emergencia')
    			->join('tipo_reporte AS tr','tr.id_tiporep','=','m.tipo')
    			->groupBy('m.id')
    			->orderBy('cantidad','DESC')
    			->where('tr.id_tiporep',1)
                ->where(\DB::raw('YEAR(r.fecha)'),'=',$año)
    			->limit(5)	
    			->get(),
    		'tres' => \DB::table('reporte as r')
        		->select(
        			\DB::raw('COUNT(m.id) AS cantidad'),
        			'm.nombre as emergencia'
    			)
    			->join('emergencia AS m','m.id','=','r.id_emergencia')
    			->join('tipo_reporte AS tr','tr.id_tiporep','=','m.tipo')
    			->groupBy('m.id')
    			->orderBy('cantidad','DESC')
    			->where('tr.id_tiporep',2)
    			->limit(5)
    			->get(),
    		'cuatro'=>\DB::table('reporte as r')
                    ->join('tipo_aviso as ta','ta.id_tipo','=','r.tipo_aviso')
                    ->select((\DB::raw('COUNT(r.id_reporte) as cantidad')),'ta.nombre')
                    ->groupBY('ta.nombre')
                    ->wherebetween('r.fecha',[$fecha,$fecha2]) 
                    ->get(),
            'cinco'=> \DB::table('reporte as r')
                ->select(
                    \DB::raw('COUNT(m.id) AS cantidad'),
                    'm.nombre as emergencia'
                )
                ->join('emergencia AS m','m.id','=','r.id_emergencia')
                ->join('tipo_reporte AS tr','tr.id_tiporep','=','m.tipo')
                ->groupBy('m.id')
                ->orderBy('cantidad','DESC')
                ->where('tr.id_tiporep',2)
                ->wherebetween('r.fecha',[$fecha,$fecha2]) 
                ->limit(5)
                ->get(),
            'seis'=> \DB::table('reporte as r')
                ->select(
                    \DB::raw('COUNT(m.id) AS cantidad'),
                    'm.nombre as emergencia'
                )
                ->join('emergencia AS m','m.id','=','r.id_emergencia')
                ->join('tipo_reporte AS tr','tr.id_tiporep','=','m.tipo')
                ->groupBy('m.id')
                ->orderBy('cantidad','DESC')
                ->where('tr.id_tiporep',1)
                ->wherebetween('r.fecha',[$fecha,$fecha2])
                ->limit(5)  
                ->get(),
        ];
        //dd($data);
        return view('visDir.index',$data);
    }

    ///======================

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

        
        return view('visDir.viewdet',$detenido);
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
        return view('visDir.viewdet2',$datos);
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
        return view('visDir.viewdet3',$datos);
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
        return view('visDir.historial', $persona);
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

             $persona=\DB::table('persona')
            ->select('id_persona as id')
            ->where('persona.nombre', $request->nombre)
            ->first();
            return redirect('/segpub/barandilla/detperxD/'.$persona->id);
        } 
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

             return view('visDir.hist_per', $data);
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
public function vialplacas(){
        $placas = \DB::table('vehiculo')
        ->select('placas')
        ->get();
         $data= array('placas' => $placas,);
        return view('visDir.consultaplacas', $data);
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
        return view('visDir.con_fec');
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
        return view('visDir.llamadas');
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

   public function inspp(){
        return view('visDir.incidenciasp');
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
    public function get_incidencias2(Request $request){
        //dd($request->all());
        $fecha1=$request->año1."-".$request->mes1.'-'.$request->dia1;
        $fecha2=$request->año2."-".$request->mes2.'-'.$request->dia2;
        $data=\DB::table('reporte_sp as sp')
            ->join('reporte as r','r.id_reporte','=','sp.id_reporte')
            ->join('emergencia as e','e.id','=','sp.id_emergencia')
            ->join('lugar as l','l.id_lugar','=','r.id_lugar')
            ->join('tipo_aviso as ta','ta.id_tipo','=','sp.tipoaviso')
            ->select('l.direccion',(\DB::raw('DATE_FORMAT(sp.created_at,"%b %d %Y") as fecha')),
                'sp.hora','ta.nombre as aviso','e.nombre as emergencia','sp.id_reporte as id')
            ->wherebetween('sp.created_at',[$fecha1,$fecha2])
            ->orderBy('fecha', 'DESC')
            ->get();     
            //dd($data);      
        return json_encode($data);
    }
    public function get_incidencias3(){
        $fecha=date('Y-m-d');
        $data=\DB::table('reporte_sp as sp')
            ->join('reporte as r','r.id_reporte','=','sp.id_reporte')
            ->join('emergencia as e','e.id','=','sp.id_emergencia')
            ->join('lugar as l','l.id_lugar','=','r.id_lugar')
            ->join('tipo_aviso as ta','ta.id_tipo','=','sp.tipoaviso')
            ->select('l.direccion',(\DB::raw('DATE_FORMAT(sp.created_at,"%b %d %Y") as fecha')),
                'sp.hora','ta.nombre as aviso','e.nombre as emergencia','sp.id_reporte as id')
            ->where(\DB::raw('DATE(sp.created_at)'),'=',$fecha)
            ->orderBy('fecha', 'DESC')
            ->get();     
            //dd($data);      
        return json_encode($data);
    }
    public function get_incidencias4(){
        $date = date( "Y-m-d" );
        $ayer = date( "Y-m-d", strtotime( "-1 day", strtotime( $date ) ) );  
        // dd($ayer);
        $data=\DB::table('reporte_sp as sp')
            ->join('reporte as r','r.id_reporte','=','sp.id_reporte')
            ->join('emergencia as e','e.id','=','sp.id_emergencia')
            ->join('lugar as l','l.id_lugar','=','r.id_lugar')
            ->join('tipo_aviso as ta','ta.id_tipo','=','sp.tipoaviso')
            ->select('l.direccion',(\DB::raw('DATE_FORMAT(sp.created_at,"%b %d %Y") as fecha')),
                'sp.hora','ta.nombre as aviso','e.nombre as emergencia','sp.id_reporte as id')
            ->where(\DB::raw('DATE(sp.created_at)'),'=',$ayer)
            ->orderBy('fecha', 'DESC')
            ->get();     
            //dd($data);      
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
        //dd($data);
        return view('visDir.incidenciasp2',$data);
    }
    public function incv(){
        return view('visDir.incidenciasv');
    }

    public function get_incidenciasV(Request $request){
        $fecha=DATE('Y-').$request->mes."-01";
        $dias= cal_days_in_month(CAL_GREGORIAN, $request->mes, DATE('Y'));
        $fecha2 =Date('Y-').$request->mes.'-'.$dias;
        //dd($request->all());
        $data = \DB::table('reporte as r')
    ->join('reporte_vehiculo as rv','rv.id_reporte','=','r.id_reporte')
    ->join('emergencia as e','e.id','=','r.id_emergencia')
    ->join('tipo_aviso as ta','ta.id_tipo','=','r.tipo_aviso')
    ->select('r.id_reporte as id','e.nombre as emergencia',(\DB::raw('DATE_FORMAT(r.fecha,"%b %d %Y") as fecha')),'r.hora as hora','ta.nombre as comunicado')
    ->wherebetween('r.fecha',[$fecha,$fecha2])
    ->orderBy('fecha', 'DESC')
    ->get();
    return json_encode($data);
    }
    public function get_incidenciasV2(Request $request){
        $fecha1=$request->año1."-".$request->mes1.'-'.$request->dia1;
        $fecha2=$request->año2."-".$request->mes2.'-'.$request->dia2;
        $data = \DB::table('reporte as r')
        ->join('reporte_vehiculo as rv','rv.id_reporte','=','r.id_reporte')
        ->join('emergencia as e','e.id','=','r.id_emergencia')
        ->join('tipo_aviso as ta','ta.id_tipo','=','r.tipo_aviso')
        ->select('r.id_reporte as id','e.nombre as emergencia',(\DB::raw('DATE_FORMAT(r.fecha,"%b %d %Y") as fecha')),'r.hora as hora','ta.nombre as comunicado')
        ->wherebetween('r.fecha',[$fecha1,$fecha2])
        ->orderBy('fecha', 'DESC')
        ->get();
    return json_encode($data);
    }
    public function get_incidenciasV3(){
        $fecha=date('Y-m-d');
        $data = \DB::table('reporte as r')
        ->join('reporte_vehiculo as rv','rv.id_reporte','=','r.id_reporte')
        ->join('emergencia as e','e.id','=','r.id_emergencia')
        ->join('tipo_aviso as ta','ta.id_tipo','=','r.tipo_aviso')
        ->select('r.id_reporte as id','e.nombre as emergencia',(\DB::raw('DATE_FORMAT(r.fecha,"%b %d %Y") as fecha')),'r.hora as hora','ta.nombre as comunicado')
        ->where(\DB::raw('DATE(r.fecha)'),'=',$fecha)
        ->orderBy('fecha', 'DESC')
        ->get();
    return json_encode($data);
    }
    public function get_incidenciasV4(){
        $date = date( "Y-m-d" );
        $ayer = date( "Y-m-d", strtotime( "-1 day", strtotime( $date ) ) );  
        $data = \DB::table('reporte as r')
        ->join('reporte_vehiculo as rv','rv.id_reporte','=','r.id_reporte')
        ->join('emergencia as e','e.id','=','r.id_emergencia')
        ->join('tipo_aviso as ta','ta.id_tipo','=','r.tipo_aviso')
        ->select('r.id_reporte as id','e.nombre as emergencia',(\DB::raw('DATE_FORMAT(r.fecha,"%b %d %Y") as fecha')),'r.hora as hora','ta.nombre as comunicado')
        ->where(\DB::raw('DATE(r.fecha)'),'=',$ayer)
        ->orderBy('fecha', 'DESC')
        ->get();
    return json_encode($data);
    }
    public function detincv($id){
       $data=array( 
            'reporte'=>\DB::table('reporte as r')
              ->join('reporte_vehiculo as rv','rv.id_reporte','=','r.id_reporte')
              ->join('emergencia as e','e.id','=','r.id_emergencia')
              ->join('lugar as l','l.id_lugar','=','r.id_lugar')
              ->join('localidad as lo','lo.id_localidad','=','l.id_localidad')
              ->join('tipo_aviso as ta','ta.id_tipo','=','r.tipo_aviso')
              ->select('e.nombre as emergencia',(\DB::raw('DATE_FORMAT(r.fecha,"%b %d %Y") as fecha')),'r.hora as hora','ta.nombre as comunicado','l.direccion','lo.nombre as localidad','rv.remite as oficial')
              ->where('r.id_reporte','=',$id)
              ->first(),
            'heridos'=>\DB::table('persona as p')
                ->join('lugar as l','l.id_lugar','=','p.id_lugar')
                ->join('localidad as lo','lo.id_localidad','=','l.id_localidad')
                ->join('herido as h','h.id_persona','=','p.id_persona')
                ->join('reporte_vehiculo as rv','rv.id_reporte','=','h.id_reporte')
                ->select('p.nombre as nombre','p.edad','p.domicilio','p.curp','p.telefono','lo.nombre as procedencia')
                ->where('rv.id_reporte','=',$id)
                ->get(),
            'vehiculo'=>\DB::table('vehiculo AS v')
                 ->JOIN ('reporte_vehiculo AS rv','rv.id_vehiculo','=','v.id_vehiculo')
                 ->JOIN ('modelo_vehiculo AS mv ','mv.id_modelo','=','v.id_modelo')
                 ->JOIN ('marca_vehiculo AS mav','mav.id_marca','=','mv.id_marca')
                 ->JOIN ('estado as e','e.id_estado','=','v.id_estado')
                 ->JOIN ('tipo_vehiculo AS tv','tv.id_tipo','=','v.id_tipo')
                 ->JOIN ('persona AS p','p.id_persona','=','rv.id_conductor')
                 ->join ('lugar as lu','lu.id_lugar','=','p.id_lugar')
                 ->join ('localidad as l','l.id_localidad','=','lu.id_localidad')
                 ->select('tv.nombre AS tipo','mav.nombre AS marca','mv.nombre AS modelo','mv.anio','v.serie','v.detalles',
                  'v.liberado','v.adeudo','v.placas','v.ubicacion','v.adeudo','e.nombre AS procedencia','p.nombre AS conductor','p.edad','p.telefono',
                    'p.domicilio','l.nombre AS localidad','rv.probable_resp as responsable') 
                 ->WHERE('rv.id_reporte','=',$id)
                 ->get(),
               );
       //dd($data);
       return view('visDir.detallevial',$data);
    }
   
}
