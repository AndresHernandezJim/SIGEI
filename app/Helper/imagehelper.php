<?php 
namespace App\Helper;
class imagehelper
{
	static function upload($file)
	{
		// subir la imagen al servidor
		 	$path ='/images/fotos'; // ruta destino
            $nombre = time().'.'.$file->getClientOriginalExtension();
            //dd($nombre);
            if( $file->move(public_path().$path, $nombre)){
                return $path.='/'.$nombre;
            }
            return $path=false;
	}
	
}


 ?>