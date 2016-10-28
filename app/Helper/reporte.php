<?php 
namespace App\helper;

class reporte{
	public static function save($datos){
		$nuevo= \DB::table('reporte')->insert([
		'id_emergencia'=>$datos->emergencia,
		'tipo_aviso'=>$datos->tipo_aviso,
		'fecha'=>DATE('Y-m-d H:i:s'),
		'hora'=>$datos->hora,
		'canalizacion'=>$datos->canalizacion,
		'detalles'=>$datos->detalles,
		'id_sesion'=>$datos->id_sesion]);
		

		$id=\BD::table('reporte')->select('id_reporte')->groupby('id_reporte','desc')->first();
		return $id;
	}
}
?>