<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('website/index');
});
Route::get('/registro','website@nusu');
Route::Post('/newusr', 'website@Newusr');
Route::Post('/login', 'LoginController@login');
Route::get('hola',function(){return view('upload-image');});

Route::group(['middleware' => 'admin'], function(){
	Route::get('/director', 'DirectorController@index');
	Route::get('/logoutD', 'DirectorController@logout');

	
	Route::get('/consultadetenidoD','DirectorController@showdet');
	Route::get('/segpub/barandilla/infoD/{id}','DirectorController@showdet2');
	Route::get('/regreso','DirectorController@return');
	Route::get('/segpub/personas/detencionD/{id}','DirectorController@showdet3');
	Route::get('/segpub/barandilla/historialD', 'DirectorController@bus_per');
	Route::post('/segpub/barandilla/detperD','DirectorController@detalleper_bara');
	Route::get('/segpub/barandilla/detperxD/{id}', 'DirectorController@detalleper_bara2');
	Route::post('/sp','DirectorController@storepersona');
	Route::post('/segpub/incidenciavial','DirectorController@newvial');
	Route::get('/consultaplacasfechaD','DirectorController@vialplacas');
	Route::get('/consultagruasfecha','DirectorController@vialfecha');
	Route::get('/consultagruasfechaD', 'DirectorController@searchdate');
	Route::get('/consultallamadasD', 'DirectorController@llamadas');
	Route::get('/consultaincidenciaspD','DirectorController@inspp');
	Route::get('/consultaincidenciaspDD/{id}','DirectorController@detalleincidencia');
   //ajax
	Route::patch('get/user/infoD','DirectorController@get_user_info');
	Route::patch('get/auto/placaD','DirectorController@get_auto_info');
	Route::patch('get/auto/liberarD','DirectorController@get_auto_libre');
	Route::patch('get/auto/fecha1D','DirectorController@vialfecha1');
	Route::patch('get/auto/fecha2D','DirectorController@vialfecha2');
	Route::patch('get/llamada/fecha1D','DirectorController@llamadafecha1');
	Route::patch('get/llamada/fecha2D','DirectorController@llamadafecha2');  
	Route::patch('get/incidencia/fechaD','DirectorController@get_incidencias');
	Route::patch('get/incidencia/fecha2D','DirectorController@get_incidencias2');
	Route::patch('get/incidencia/fecha3D','DirectorController@get_incidencias3');
	Route::patch('get/incidencia/fecha4D','DirectorController@get_incidencias4');
	Route::get('/consultaincidenciasvD','DirectorController@incv');
	Route::get('/consultaincidenciasvdd/{id}','DirectorController@detincv');
	Route::patch('get/incidenciaV/fechaD','DirectorController@get_incidenciasV');
	Route::patch('get/incidenciaV/fecha2D','DirectorController@get_incidenciasV2');
	Route::patch('get/incidenciaV/fecha3D','DirectorController@get_incidenciasV3');
	Route::patch('get/incidenciaV/fecha4D','DirectorController@get_incidenciasV4');
	Route::post('/segpub/ajax/liberarD', 'DirectorController@liberar');
});

Route::group(['middleware' => 'policia'], function(){
	Route::get('/poli', 'segpubcontroller@index');
	Route::get('/registroincidenciasp', 'segpubcontroller@nueva_incidencia_sp');
	Route::get('/registroincidenciavial','segpubcontroller@newrepvial');
	Route::get('/registrobarandilla','segpubcontroller@nueva_barandilla');
	Route::post('/savebarandilla','segpubcontroller@guardabarandilla');
	Route::get('/logoutp', 'segpubcontroller@logout');
	Route::get('/consultadetenido','segpubcontroller@showdet');
	Route::get('/segpub/barandilla/info/{id}','segpubcontroller@showdet2');
	Route::post('/segpub/ajax/liberar', 'segpubcontroller@liberar');
	Route::get('/regreso','segpubcontroller@return');
	Route::get('/segpub/personas/detencion/{id}','segpubcontroller@showdet3');
	Route::get('/segpub/barandilla/historial', 'segpubcontroller@bus_per');
	Route::post('/segpub/barandilla/detper','segpubcontroller@detalleper_bara');
	Route::get('/segpub/barandilla/detperx/{id}', 'segpubcontroller@detalleper_bara2');
	Route::post('/sp','segpubcontroller@storepersona');
	Route::post('/segpub/incidenciavial','segpubcontroller@newvial');
	Route::get('/consultaplacasfecha','segpubcontroller@vialplacas');
	Route::get('/consultagruasfecha','segpubcontroller@vialfecha');
	Route::get('/consultagruasfecha', 'segpubcontroller@searchdate');
	Route::get('/consultallamadas', 'segpubcontroller@llamadas');
	Route::get('/consultaincidenciasp','segpubcontroller@insp');
	Route::get('/consultaincidenciasp/{id}','segpubcontroller@detalleincidencia');
   //ajax
	Route::patch('get/user/info','segpubcontroller@get_user_info');
	Route::patch('get/auto/placa','segpubcontroller@get_auto_info');
	Route::patch('get/auto/liberar','segpubcontroller@get_auto_libre');
	Route::patch('get/auto/fecha1','segpubcontroller@vialfecha1');
	Route::patch('get/auto/fecha2','segpubcontroller@vialfecha2');
	Route::patch('get/llamada/fecha1','segpubcontroller@llamadafecha1');
	Route::patch('get/llamada/fecha2','segpubcontroller@llamadafecha2');  
	Route::patch('get/incidencia/fecha','segpubcontroller@get_incidencias');
	Route::patch('get/incidencia/fecha2','segpubcontroller@get_incidencias2');
	Route::patch('get/incidencia/fecha3','segpubcontroller@get_incidencias3');
	Route::patch('get/incidencia/fecha4','segpubcontroller@get_incidencias4');
	Route::get('/consultaincidenciasv','segpubcontroller@incv');
	Route::get('/consultaincidenciasvd/{id}','segpubcontroller@detincv');
	Route::patch('get/incidenciaV/fecha','segpubcontroller@get_incidenciasV');
	Route::patch('get/incidenciaV/fecha2','segpubcontroller@get_incidenciasV2');
	Route::patch('get/incidenciaV/fecha3','segpubcontroller@get_incidenciasV3');
	Route::patch('get/incidenciaV/fecha4','segpubcontroller@get_incidenciasV4');
	

});
Route::group(['middleware' => 'psicologo'], function(){
	Route::get('/predel', 'prevdelcontroller@index');
	Route::get('/logoutpd', 'prevdelcontroller@logout');
	Route::get('/predel/new/institucion','prevdelcontroller@regInst');
	Route::get('/predel/show/institucion','prevdelcontroller@visIns');
	Route::get('/predel/new/persona', 'prevdelcontroller@regPer');
	Route::get('/predel/show/pacientes', 'prevdelcontroller@mostrarPac');
	Route::post('/predel/insert/persona', 'prevdelcontroller@newPaciente');
	Route::post('/prevdel/insert/isntitucion','prevdelcontroller@registroInst');
	Route::get('/predel/ajax/paciente', 'prevdelcontroller@showPas');
	Route::get('/predel/paciente/info/{id}', 'prevdelcontroller@mostrarSes');
	Route::get('/predel/new/sesiones/{id}', 'prevdelcontroller@newSes');
	Route::get('/predel/new/visitas/{id}', 'prevdelcontroller@newVis');
	Route::post('/predel/sesion/{id}', 'prevdelcontroller@insertSes');
	Route::post('/predel/visita/{id}', 'prevdelcontroller@regVis');
	Route::get('/predel/ajax/sesiones/{id}', 'prevdelcontroller@showSec');
	//Route::get('/predel/personas/sesion/{id}', 'prevdelcontroller@ses_esp');
	Route::post('/predel/ajax/delpac', 'prevdelcontroller@deletePac');
	Route::get('/predel/ajax/showinst', 'prevdelcontroller@showInst');
	Route::get('/predel/intitucion/info/{id}', 'prevdelcontroller@mostrarInst');
	Route::get('/predel/ajax/visitas/{id}', 'prevdelcontroller@showVis');
	//Route::get('/predel/intitucion/visita/{id}', 'prevdelcontroller@vis_esp');
	Route::patch('get/user/infop','prevdelcontroller@get_user_info');
	//ajax
	Route::patch('/predel/personas/sesion/', 'prevdelcontroller@ses_esp');
	Route::patch('/predel/intitucion/visita/', 'prevdelcontroller@vis_esp');
});