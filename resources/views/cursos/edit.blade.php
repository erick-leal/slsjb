@if (Auth::guard("administrador")->check())

@extends('layouts.admin')

@section('title','Editar Curso: ' . $curso->nombre)

@section('content')

	@if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
            	{!! $message !!}
            @endforeach
        </div>
    @endif

	{!! Form::open(array('route' => ['cursos.update',$curso],'method'=>'PUT')) !!}
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
	            <div class="form-group">
	                {!! Form::label('nombre','Curso')!!}
	                {!! Form::text('nombre', $curso->nombre, array('placeholder' => 'Curso...','class' => 'form-control')) !!}
	            </div>
	      
	            <div class="form-group">
	                {!! Form::label('tipo','Tipo')!!}
	                {!! Form::select('tipo', ['' => 'Modalidad Curso...','Tecnico Profesional' => 'Tecnico Profesional', 'Humanista Cientifico' => 'Cientifico Humanista'], $curso->tipo, ['class' => 'form-control']) !!}
	            </div>
				<button type="submit" class="btn btn-primary">Editar</button>
				<a class="btn btn-danger" href="{{route('cursos.index')}}">Cancelar</a>       	
	        </div>
		</div>
	{!! Form::close() !!}

@endsection

@else

@include('layouts.error')

@endif	