@extends('layouts.admin')

@section('title','Editar Administrativo')

@section('content')
	
	@if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
            	{!! $message !!}
            @endforeach
        </div>
    @endif

	{!! Form::open(array('route' => ['administrativos.update',$administrativo],'method'=>'PUT', 'files' => true)) !!}
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
	            <div class="form-group">
	                {!! Form::label('rut','Rut')!!}
	                {!! Form::text('rut', $administrativo->rut, array('placeholder' => 'Rut...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('nombre','Nombre')!!}
	                {!! Form::text('nombre', $administrativo->nombre, array('placeholder' => 'Nombre...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('apellido_paterno','Apellido Paterno')!!}
	                {!! Form::text('apellido_paterno', $administrativo->apellido_paterno, array('placeholder' => 'Apellido Paterno...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('apellido_materno','Apellido Materno')!!}
	                {!! Form::text('apellido_materno', $administrativo->apellido_materno, array('placeholder' => 'Apellido Materno...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('email','Correo')!!}
	                {!! Form::text('email', $administrativo->email, array('placeholder' => 'Correo...','class' => 'form-control')) !!}
	            </div>

	            
	            <div class="form-group">
                    {!! Form::label('id_cargo', 'Cargo') !!}
                    {!! Form::select('id_cargo',$cargos,$administrativo->cargo,['class' => 'form-control']) !!}
                </div>
	      
	            <div class="form-group">
	                {!! Form::label('sexo','Sexo')!!}
	                {!! Form::select('sexo', ['' => 'Seleccionar...','Masculino' => 'Masculino', 'Femenino' => 'Femenino'], $administrativo->sexo, ['class' => 'form-control']) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('telefono','Telefono')!!}
	                {!! Form::text('telefono', $administrativo->telefono, array('placeholder' => 'Telefono...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('fecha_nacimiento','Fecha Nacimiento')!!}
	                {!! Form::date('fecha_nacimiento', $administrativo->fecha_nacimiento, array('placeholder' => 'Fecha Nacimiento...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('edad','Edad')!!}
	                {!! Form::text('edad', $administrativo->edad, array('placeholder' => 'Edad...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('direccion','Direccion')!!}
	                {!! Form::text('direccion', $administrativo->direccion, array('placeholder' => 'Direccion...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
					{!! Form::label('foto','Foto')!!}
					{!! Form::file('foto', null, array('placeholder' => 'Foto...','class' => 'form-control')) !!}
					@if(($administrativo->foto)!="")
						<br><img src="{{ asset('imagenes/administrativos/'.$administrativo->foto) }}" height="200px" width="200px">
					@endif
				</div>

				<button type="submit" class="btn btn-primary">Editar</button>    
				<a class="btn btn-danger" href="{{route('administrativos.index')}}">Cancelar</a>   	
	        </div>
		</div>
	{!! Form::close() !!}

@endsection

@section('js')
<script>
    $("input#rut").rut();
</script>
@endsection