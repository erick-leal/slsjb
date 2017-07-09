@if (Auth::guard('profesor')->check())

@extends('layouts.admin')

@section('title','Editar Evaluacion: ' . $evaluacion->nombre)

@section('content')

	@if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
            	{!! $message !!}
            @endforeach
        </div>
    @endif

	{!! Form::open(array('route' => ['evaluaciones.update',$evaluacion],'method'=>'PUT')) !!}
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-10">

				<div class="form-group">
                    {!! Form::label('id_asignatura', 'Asignatura') !!}
                    {!! Form::select('id_asignatura', $mis_asignaturas, $evaluacion->asignatura->id, ['class' => 'form-control select-asignatura']) !!}
                </div>
                
	            <div class="form-group">
	                {!! Form::label('nombre','Nombre')!!}
	                {!! Form::text('nombre', $evaluacion->nombre, array('placeholder' => 'Nombre...','class' => 'form-control')) !!}
	            </div>

	            
	            <div class="form-group">
	                {!! Form::label('contenido','Contenido')!!}
	                {!! Form::textarea('contenido', $evaluacion->contenido,['class' => 'form-control textarea-descripcion']) !!}
	            </div>

				<button type="submit" class="btn btn-primary">Registrar</button>    
				<a class="btn btn-danger" href="{{route('evaluaciones.index')}}">Cancelar</a>   	
	        </div>
		</div>
	{!! Form::close() !!}

@endsection

@section('js')
	<script>
		$('.select-asignatura').chosen({no_results_text: "Asignatura no registrada", max_selected_options: 1});
		$('.textarea-descripcion').trumbowyg({
			lang: 'es',
			removeformatPasted: true
		});
	</script>
@endsection	

@else

@include('layouts.error')

@endif	