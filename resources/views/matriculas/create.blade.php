@if (Auth::guard("administrativo")->check())

@extends('layouts.admin')

@section('title','Registrar Matricula')

@section('content')
	
	@if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
            	{!! $message !!}
            @endforeach
        </div>
    @endif

	{!! Form::open(array('route' => 'matriculas.store','method'=>'POST')) !!}
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
	            <div class="form-group">
	                {!! Form::label('id_alumno','Alumno')!!}
	                {!! Form::select('id_alumno', $alumnos, null,['class' => 'form-control select-alumno', 'placeholder' => 'Seleccione un Alumno' ]) !!}
	            </div>

	            <div class="form-group">
                    {!! Form::label('id_curso', 'Curso') !!}
                    {!! Form::select('id_curso',$cursos,null,['class' => 'form-control select-curso', 'placeholder' => 'Seleccione un curso']) !!}
                </div>

	            <div class="form-group">
	                {!! Form::label('estado','Estado')!!}
	                {!! Form::select('estado', ['' => 'Seleccionar...','Matriculado' => 'Matriculado', 'Pendiente' => 'Pendiente', 'No Matriculado' => 'No Matriculado'], null, ['class' => 'form-control']) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('monto','Monto')!!}
	                {!! Form::text('monto', null, array('placeholder' => 'Monto...','class' => 'form-control')) !!}
	            </div>	            

				<button type="submit" class="btn btn-primary">Registrar</button>    
				<a class="btn btn-danger" href="{{route('matriculas.index')}}">Cancelar</a>   	
	        </div>
		</div>
	{!! Form::close() !!}

@endsection

@section('js')
	<script>
		$('.select-alumno').chosen({no_results_text: "Alumno no registrado", max_selected_options: 1});
		$('.select-curso').chosen({no_results_text: "Curso no registrado", max_selected_options: 1});
	</script>
@endsection

@else

@include('layouts.error')

@endif	