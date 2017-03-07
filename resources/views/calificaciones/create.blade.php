@extends('layouts.admin')

@section('title','Registrar Anotacion')

@section('content')
	
	@if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
            	{!! $message !!}
            @endforeach
        </div> 
    @endif

	{!! Form::open(array('route' => 'conductas.store','method'=>'POST')) !!}
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">

				<div class="form-group">
                    {!! Form::label('id_alumno', 'Alumno') !!}
                    {!! Form::select('id_alumno',$alumnos,null,['class' => 'form-control select-alumno', 'placeholder' => 'Seleccione una alumno']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('id_asignatura', 'Asignatura') !!}
                    {!! Form::select('id_asignatura',$asignaturas,null,['class' => 'form-control select-asignatura', 'placeholder' => 'Seleccione una asignatura']) !!}
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
				<a class="btn btn-danger" href="{{route('conductas.index')}}">Cancelar</a>   	
	        </div>
		</div>
	{!! Form::close() !!}

@endsection

@section('js')
<script>
	$('.select-alumno').chosen({no_results_text: "Alumno no registrado", max_selected_options: 1});
	$('.select-asignatura').chosen({no_results_text: "Asignatura no registrada", max_selected_options: 1});
	$('.textarea-descripcion').trumbowyg();
</script>

@endsection