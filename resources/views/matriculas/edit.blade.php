@if (Auth::guard("administrativo")->check())

@extends('layouts.admin')

@section('title','Editar Matricula')

@section('content')
	
	@if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
            	{!! $message !!}
            @endforeach
        </div>
    @endif

	{!! Form::open(array('route' => ['matriculas.update',$matricula],'method'=>'PUT')) !!}
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
	        

	            <div class="form-group">
	                {!! Form::label('estado','Estado')!!}
	                {!! Form::select('estado', ['' => 'Seleccionar...','Matriculado' => 'Matriculado', 'Pendiente' => 'Pendiente', 'No Matriculado' => 'No Matriculado'], $matricula->estado, ['class' => 'form-control']) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('monto','Monto')!!}
	                {!! Form::text('monto', $matricula->monto, array('placeholder' => 'Monto...','class' => 'form-control')) !!}
	            </div>

				<button type="submit" class="btn btn-primary">Editar</button>    
				<a class="btn btn-danger" href="{{route('matriculas.index')}}">Cancelar</a>   	
	        </div>
		</div>
	{!! Form::close() !!}

@endsection

@section('js')
	<script>
		$('.select-alumno').chosen({no_results_text: "Alumno no registrado", max_selected_options: 1});
	</script>
@endsection

@else

@include('layouts.error')

@endif	