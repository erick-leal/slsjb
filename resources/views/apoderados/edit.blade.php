@extends('layouts.admin')

@section('title','Editar Apoderado')

@section('content')
	
	@if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
            	{!! $message !!}
            @endforeach
        </div>
    @endif

	{!! Form::open(array('route' => ['apoderados.update',$apoderado],'method'=>'PUT', 'files' => true)) !!}
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
	            <div class="form-group">
	                {!! Form::label('rut','Rut')!!}
	                {!! Form::text('rut', $apoderado->rut, array('placeholder' => 'Rut...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('nombre','Nombre')!!}
	                {!! Form::text('nombre', $apoderado->nombre, array('placeholder' => 'Nombre...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('apellido_paterno','Apellido Paterno')!!}
	                {!! Form::text('apellido_paterno', $apoderado->apellido_paterno, array('placeholder' => 'Apellido Paterno...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('apellido_materno','Apellido Materno')!!}
	                {!! Form::text('apellido_materno', $apoderado->apellido_materno, array('placeholder' => 'Apellido Materno...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('email','Correo')!!}
	                {!! Form::text('email', $apoderado->email, array('placeholder' => 'Correo...','class' => 'form-control')) !!}
	            </div>
	      
	            <div class="form-group">
	                {!! Form::label('sexo','Sexo')!!}
	                {!! Form::select('sexo', ['' => 'Seleccionar...','Masculino' => 'Masculino', 'Femenino' => 'Femenino'], $apoderado->sexo, ['class' => 'form-control']) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('telefono','Telefono')!!}
	                {!! Form::text('telefono', $apoderado->telefono, array('placeholder' => 'Telefono...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('fecha_nacimiento','Fecha Nacimiento')!!}
	                {!! Form::date('fecha_nacimiento', $apoderado->fecha_nacimiento, array('placeholder' => 'Fecha Nacimiento...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('edad','Edad')!!}
	                {!! Form::text('edad', $apoderado->edad, array('placeholder' => 'Edad...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('direccion','Direccion')!!}
	                {!! Form::text('direccion', $apoderado->direccion, array('placeholder' => 'Direccion...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
					{!! Form::label('foto','Foto')!!}
					{!! Form::file('foto', null, array('placeholder' => 'Foto...','class' => 'form-control')) !!}
					@if(($apoderado->foto)!="")
						<br><img src="{{ asset('imagenes/apoderados/'.$apoderado->foto) }}" height="200px" width="200px">
					@endif
				</div>

				<button type="submit" class="btn btn-primary">Editar</button>    
				<a class="btn btn-danger" href="{{route('apoderados.index')}}">Cancelar</a>   	
	        </div>
		</div>
	{!! Form::close() !!}

@endsection

@section('js')
<script>
    $("input#rut").rut();
</script>
@endsection