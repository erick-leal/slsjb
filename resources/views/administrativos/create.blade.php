@extends('layouts.admin')

@section('title','Registrar Administrativo')

@section('content')
	
	@if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
            	{!! $message !!}
            @endforeach
        </div>
    @endif

	{!! Form::open(array('route' => 'administrativos.store','method'=>'POST', 'files' => true)) !!}
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
	            <div class="form-group">
	                {!! Form::label('rut','Rut')!!}
	                {!! Form::text('rut', null, array('placeholder' => 'Rut...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('nombre','Nombre')!!}
	                {!! Form::text('nombre', null, array('placeholder' => 'Nombre...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('apellido_paterno','Apellido Paterno')!!}
	                {!! Form::text('apellido_paterno', null, array('placeholder' => 'Apellido Paterno...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('apellido_materno','Apellido Materno')!!}
	                {!! Form::text('apellido_materno', null, array('placeholder' => 'Apellido Materno...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('email','Correo')!!}
	                {!! Form::text('email', null, array('placeholder' => 'Correo...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('password','Contraseña')!!}
	                {!! Form::text('password', null, array('placeholder' => 'Contraseña...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
                    {!! Form::label('id_cargo', 'Cargo') !!}
                    {!! Form::select('id_cargo',$cargos,null,['class' => 'form-control', 'placeholder' => 'Seleccione una opción']) !!}
                </div>
	      
	            <div class="form-group">
	                {!! Form::label('sexo','Sexo')!!}
	                {!! Form::select('tipo', ['' => 'Seleccionar...','Masculino' => 'Masculino', 'Femenino' => 'Femenino'], null, ['class' => 'form-control']) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('telefono','Telefono')!!}
	                {!! Form::text('telefono', null, array('placeholder' => 'Telefono...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('fecha_nacimiento','Fecha Nacimiento')!!}
	                {!! Form::date('fecha_nacimiento', null, array('placeholder' => 'Fecha Nacimiento...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('edad','Edad')!!}
	                {!! Form::text('edad', null, array('placeholder' => 'Edad...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('direccion','Direccion')!!}
	                {!! Form::text('direccion', null, array('placeholder' => 'Direccion...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('foto','Foto')!!}
	                {!! Form::file('foto', null, array('placeholder' => 'Foto...','class' => 'form-control')) !!}
	            </div>

				<button type="submit" class="btn btn-primary">Registrar</button>    
				<a class="btn btn-danger" href="{{route('administrativos.index')}}">Cancelar</a>   	
	        </div>
		</div>
	{!! Form::close() !!}

@endsection