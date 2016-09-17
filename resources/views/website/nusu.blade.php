@extends('templates.sitio')
@section('content')
    <div class="rigth"><a href="/">regresar</a></div>
	<div class="container">
    <div class="row">
        
        <div class="col m5">
           
            <div class="row">
                <form class="col s12" action="/controller" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" class="validate" name="nombre">
                            <label>Nombre</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="pass" type="password" class="validate" name="Contraseña">
                            <label for="pass">Password</label>
                        </div>
                    </div>
                        <div class="row">
                            
                                <select class="input-field col s12" name="privilegio">
                                    <option value="" disabled selected>Seleccione</option>
                                        @foreach ($privilegios as $privilegio)
                                           <option value="{{$privilegio['idPrivilegios']}}">{{$privilegio['Tipo_privilegio']}}</option>
                                        @endforeach

                                </select>
                                <label>Tipo de usuario</label>
                        </div>                  
                   
                  <br>
                    <div class="row">
                        <div class="col m12">
                            
                                <button class="btn waves-effect waves-light" type="submit" name="action">Registrame &nbsp<i class="fa fa-arrow-right"></i>
 	 							</button>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop