@extends('templates.tdir')
@section('content')
    <div class="rigth"><a href="/">regrear</a></div>
	<div class="container">
    <div class="row">
        
        <div class="col s12">
           <center>
               <h5>
                   <b>
                       Alta de Usuario
                   </b>
               </h5>
           </center>
           <hr>
            <div class="row">
                <center>
                    <form class="col s12" action="/newusr" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s5">
                            <input type="text" class="validate" name="nombre">
                            <label>Nombre</label>
                        </div>
                        <div class="input-field col s4 offset-s1">
                            <input id="pass" type="password" class="validate" name="contrasena">
                            <label for="pass">Password</label>
                        </div>
                    </div>
                     <div class="row">
                        <div class="input-field col s5">
                            <input id="pass" type="text" class="validate" name="nick">
                            <label for="pass">Nick</label>
                        </div>
                        <div class="input-field col s4 offset-s1">
                            <input id="pass" type="text" class="validate" name="telefono">
                            <label for="pass">Telefono</label>
                        </div>
                    </div>         
                    <div class="row">
                        <div class="input-field col s4 offset-s3">
                            <select  name="privilegio">
                                <option value="" disabled selected>Tipo de usuario</option>                      
                                @foreach ($privilegios as $privilegio)
                                <option value="{{$privilegio['idprivilegio']}}">{{$privilegio['nombre']}}</option>
                                @endforeach
                            </select>
                        </div>                      
                    </div>       
                   
                  <br>
                    <div class="row">
                        <div class="col m12">
                            <center>
                                <a href="/director" class="btn waves-effect waves-yellow indigo accent-4">Regresar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn waves-effect waves-light" type="submit" name="action">Registrame &nbsp<i class="fa fa-arrow-right"></i>
                                </button>
                            </center>                         
                        </div>
                    </div>
                </form>
                </center>    
                
            </div>
        </div>
    </div>
</div>
@stop