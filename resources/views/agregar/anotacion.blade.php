@extends('layouts.admin')

@section('title','Registrar Anotación')

@section('content')
	
					@if($errors->has())
                        <div class='alert alert-danger'>
                            @foreach ($errors->all('<p>:message</p>') as $message)
                                {!! $message !!}
                            @endforeach
                        </div>
                   @endif
	
	
	{{ Form::open(array('url' => 'agregar/anotacion','method'=>'POST')) }}
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">

				<div class="form-group">
                    {!! Form::hidden('id_alumno', $alumno->id) !!}
					{!! Form::text('nombre_alumno', $alumno->nombre." ".$alumno->apellido_paterno." ".$alumno->apellido_materno, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                </div>

                <div class="form-group">
                    {!! Form::hidden('id_asignatura', $asignatura->id) !!}
					{!! Form::text('nombre', $asignatura->nombre, array('class' => 'form-control','readonly' => 'readonly')) !!}
                </div>

                 <div class="form-group">
	                {!! Form::label('tipo','Tipo')!!}
	                {!! Form::select('tipo', ['' => 'Seleccionar...','Positiva' => 'Positiva', 'Negativa' => 'Negativa'], null, ['class' => 'form-control']) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('descripcion','Descripcion')!!}
	                {!! Form::textarea('descripcion', null,['class' => 'form-control textarea-descripcion']) !!}
	            </div>

				<button type="submit" class="btn btn-primary">Registrar</button>    
				<a class="btn btn-danger" href="{{URL('showalumnosasignatura', $asignatura->id)}}">Cancelar</a>   	
	        </div>
		</div>
	{{ Form::close() }}

@endsection

@section('js')
<script>
	$('.textarea-descripcion').trumbowyg();
</script>

@endsection