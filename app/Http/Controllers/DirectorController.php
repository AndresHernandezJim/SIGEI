<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function index(){
        //dd("direcon");
        $fecha=DATE('Y-m')."-01";
        $dias= cal_days_in_month(CAL_GREGORIAN, date('m'), DATE('Y'));
        $fecha2 =Date('Y-m').'-'.$dias;
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
                    ->get()
        ];
        // dd($data);
        return view('visDir.index',$data);
    }
    public function logout(){
        session()->forget('Admin');
        return redirect('/');
    }

    public function insp(){
        return view('visDir.incidenciaspD');
    }
}
