@extends('layouts.admin')
@section('title','Editar Profesor : ' . $profesor->nombre." ".$profesor->apellido_paterno)

@section('content') 
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-0">
                <div class="panel panel-default">
                    
                    @if($errors->has())
                        <div class='alert alert-danger'>
                            @foreach ($errors->all('<p>:message</p>') as $message)
                                {!! $message !!}
                            @endforeach
                        </div>
                    @endif
                    <div class="panel-body">
                        {!! Form::open(['route' => ['profesores.update', $profesor], 'method' => 'PUT', 'files' => true]) !!}
                         
                         <div class="form-group">
                            {!! Form::label('rut', 'Rut',['class'=>'control-label']) !!}
                            {!! Form::text('rut', $profesor->rut, ['class' => 'form-control']) !!}
                        </div>
                         
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre',['class'=>'control-label']) !!}
                            {!! Form::text('nombre', $profesor->nombre, ['class' => 'form-control']) !!}
                        </div>
                          <div class="form-group">
                            {!! Form::label('apellido_paterno','Apellido Paterno',['class'=>'control-label']) !!}
                            {!! Form::text('apellido_paterno', $profesor->apellido_paterno,['class'=>'form-control']) !!}
                        </div>
                          <div class="form-group">
                            {!! Form::label('apellido_materno','Apellido Materno',['class'=>'control-label']) !!}
                            {!! Form::text('apellido_materno', $profesor->apellido_materno,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email','Correo Electronico',['class'=>'control-label']) !!}
                            {!! Form::text('email', $profesor->email,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('sexo','Sexo')!!}
                            {!! Form::select('sexo', ['' => 'Seleccionar...','Masculino' => 'Masculino', 'Femenino' => 'Femenino'], $profesor->sexo, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('telefono','Telefono')!!}
                            {!! Form::text('telefono', $profesor->telefono, array('placeholder' => 'Telefono...','class' => '       form-control')) !!}
                        </div>
        
                        <div class="form-group">
                            {!! Form::label('fecha_nacimiento','Fecha Nacimiento')!!}
                            {!! Form::date('fecha_nacimiento', $profesor->fecha_nacimiento, array('placeholder' => 'Fecha       Nacimiento...','class' => 'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('edad','Edad')!!}
                            {!! Form::text('edad', $profesor->edad, array('placeholder' => 'Edad...','class' => 'form-control')) !!}
                        </div>
        
                        <div class="form-group">
                            {!! Form::label('direccion','Direccion')!!}
                            {!! Form::text('direccion', $profesor->direccion, array('placeholder' => 'Direccion...','class' => '        form-control')) !!}
                        </div>      

                        <div class="form-group">
                            {!! Form::label('foto','Foto')!!}
                            {!! Form::file('foto', null, array('placeholder' => 'Foto...','class' => 'form-control')) !!}
                            @if(($profesor->foto)!="")
                                <br><img src="{{ asset('imagenes/profesores/'.$profesor->foto) }}" height="200px" width="200px">
                            @endif
                        </div>
                           
                        <div class="form-group">
                            {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
                            <a class="btn btn-danger" href="{{url('home')}}">Cancelar</a>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection