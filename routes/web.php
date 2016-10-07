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

Route::group(['middleware' => 'policia'], function(){
	Route::get('/poli', 'segpubcontroller@index');
	Route::get('/logoutp', 'segpubcontroller@logout');
});

Route::group(['middleware' => 'psicologo'], function(){
	Route::get('/predel', 'prevdelcontroller@index');
	Route::get('/logoutpd', 'prevdelcontroller@logout');
	Route::get('/predel/new/institucion','prevdelcontroller@regInst');
	Route::get('/predel/show/institucion','prevdelcontroller@visIns');
	Route::get('/predel/new/persona', 'prevdelcontroller@regPer');
	Route::get('/predel/show/pacientes', 'prevdelcontroller@mostrarPac');
	Route::post('/predel/insert/persona', 'prevdelcontroller@newPaciente');
	Route::get('/predel/ajax/paciente', 'prevdelcontroller@showPas');
	Route::get('/predel/paciente/info/{id}', 'prevdelcontroller@mostrarSes');
	Route::get('/predel/new/sesiones/{id}', 'prevdelcontroller@newSes');
	Route::post('/predel/sesion/{id}', 'prevdelcontroller@insertSes');
	Route::get('/predel/ajax/sesiones/{id}', 'prevdelcontroller@showSec');
	Route::get('/predel/personas/sesion/{id}', 'prevdelcontroller@ses_esp');
});

