@extends('layouts.admin')

@section('title','Registrar Asignatura')

@section('content')
	
	@if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
            	{!! $message !!}
            @endforeach
        </div>
    @endif

	{!! Form::open(array('route' => 'asignaturas.store','method'=>'POST')) !!}
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
	            <div class="form-group">
	                {!! Form::label('codigo','Codigo')!!}
	                {!! Form::text('codigo', null, array('placeholder' => 'Codigo...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('nombre','Nombre')!!}
	                {!! Form::text('nombre', null, array('placeholder' => 'Nombre...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
                    {!! Form::label('id_curso', 'Curso') !!}
                    {!! Form::select('id_curso',$cursos,null,['class' => 'form-control', 'placeholder' => 'Seleccione una opción']) !!}
                </div>
	      
	            <div class="form-group">
	                {!! Form::label('periodo','Periodo')!!}
	                {!! Form::select('periodo', ['' => 'Seleccionar...','Primer Semestre' => 'Primer Semestre', 'Segundo Semestre' => 'Segundo Semestre'], null, ['class' => 'form-control']) !!}
	            </div>

	           <div class="form-group">
                    {!! Form::label('id_sala', 'Sala') !!}
                    {!! Form::select('id_sala',$salas,null,['class' => 'form-control', 'placeholder' => 'Seleccione una opción']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('id_profesor', 'Profesor') !!}
                    {!! Form::select('id_profesor',$profesores,null,['class' => 'form-control select-profesor', 'placeholder' => 'Seleccione una opción']) !!}
                </div> 

                <div class="form-group">
                    {!! Form::label('alumnos', 'Alumnos') !!}
                    {!! Form::select('alumnos[]',$alumnos,null,['class' => 'form-control select-alumnos', 'multiple', 'data-placeholder' => 'Seleccionar Alumnos']) !!}
                </div> 

                <div class="form-group">
	                {!! Form::label('horario','Horario')!!}
	                {!! Form::text('horario', null, array('placeholder' => 'Horario...','class' => 'form-control')) !!}
	            </div>

				<button type="submit" class="btn btn-primary">Registrar</button>    
				<a class="btn btn-danger" href="{{route('asignaturas.index')}}">Cancelar</a>   	
	        </div>
		</div>
	{!! Form::close() !!}

@endsection

@section('js')
	<script>
		$('.select-profesor').chosen({no_results_text: "Profesor no registrado", max_selected_options: 1});
		$('.select-alumnos').chosen({no_results_text: "Alumno no registrado", max_selected_options: 50});
	</script>
@endsection