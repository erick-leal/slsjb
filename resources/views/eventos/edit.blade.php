@if (Auth::guard('profesor')->check())

@extends('layouts.admin')

@section('title','Editar Evento: ' . $evento->nombre)

@section('content')

	@if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
            	{!! $message !!}
            @endforeach
        </div>
    @endif

	{!! Form::open(array('route' => ['eventos.update',$evento],'method'=>'PUT')) !!}
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-10">

				<div class="form-group">
                    {!! Form::label('id_asignatura', 'Asignatura') !!}
                    {!! Form::select('id_asignatura', $mis_asignaturas, $evento->asignatura->id, ['class' => 'form-control select-asignatura']) !!}
                </div>
                
	            <div class="form-group">
	                {!! Form::label('nombre','Titulo')!!}
	                {!! Form::text('nombre', $evento->nombre, array('placeholder' => 'Titulo...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('fecha','Fecha')!!}
	                {!! Form::date('fecha', $evento->fecha, array('placeholder' => 'Fecha...','class' => 'form-control')) !!}
	            </div>
	      
	            <div class="form-group">
	                {!! Form::label('descripcion','Descripcion')!!}
	                {!! Form::textarea('descripcion', $evento->descripcion,['class' => 'form-control textarea-descripcion']) !!}
	            </div>

				<button type="submit" class="btn btn-primary">Registrar</button>    
				<a class="btn btn-danger" href="{{route('eventos.index')}}">Cancelar</a>   	
	        </div>
		</div>
	{!! Form::close() !!}

@endsection

@section('js')
	<script>
		$('.select-asignatura').chosen({no_results_text: "Asignatura no registrada", max_selected_options: 1});
		$('.textarea-descripcion').trumbowyg();
	</script>
@endsection	

@else

@include('layouts.error')

@endif	