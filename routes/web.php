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

Route::group(['middleware' => 'policia'], function(){
	Route::get('/poli', 'segpubcontroller@index');

	Route::get('/registroincidenciasp', 'segpubcontroller@nueva_incidencia_sp');
	
	Route::get('/registrobarandilla','segpubcontroller@nueva_barandilla');
	Route::post('/savebarandilla','segpubcontroller@guardabarandilla');
	Route::get('/logoutp', 'segpubcontroller@logout');
	Route::get('/consultadetenido','segpubcontroller@showdet');
	Route::get('/segpub/barandilla/info/{id}','segpubcontroller@showdet2');
	Route::post('/segpub/ajax/liberar', 'segpubcontroller@liberar');
	
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
	//Route::get('/predel/ajax/paciente', 'prevdelcontroller@showPas');
	Route::get('/predel/paciente/info/{id}', 'prevdelcontroller@mostrarSes');
	Route::get('/predel/new/sesiones/{id}', 'prevdelcontroller@newSes');
	Route::get('/predel/new/visitas/{id}', 'prevdelcontroller@newVis');
	Route::post('/predel/sesion/{id}', 'prevdelcontroller@insertSes');
	Route::post('/predel/visita/{id}', 'prevdelcontroller@regVis');
	Route::get('/predel/ajax/sesiones/{id}', 'prevdelcontroller@showSec');
	Route::get('/predel/personas/sesion/{id}', 'prevdelcontroller@ses_esp');
	Route::post('/predel/ajax/delpac', 'prevdelcontroller@deletePac');

	Route::post('/predel/ajax/delins', 'prevdelcontroller@deleteIns');

	//Route::get('/predel/ajax/showinst', 'prevdelcontroller@showInst');
	Route::get('/predel/intitucion/info/{id}', 'prevdelcontroller@mostrarInst');
	Route::get('/predel/ajax/visitas/{id}', 'prevdelcontroller@showVis');
	Route::get('/predel/intitucion/visita/{id}', 'prevdelcontroller@vis_esp');


});

