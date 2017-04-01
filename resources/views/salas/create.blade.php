@if (Auth::guard("administrador")->check())

@extends('layouts.admin')

@section('title','Registrar Sala')

@section('content')
	
	@if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
            	{!! $message !!}
            @endforeach
        </div>
    @endif

	{!! Form::open(array('route' => 'salas.store','method'=>'POST')) !!}
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
	            <div class="form-group">
	                {!! Form::label('nombre','Sala')!!}
	                {!! Form::text('nombre', null, array('placeholder' => 'Sala...','class' => 'form-control')) !!}
	            </div>
	      
	            <div class="form-group">
	                {!! Form::label('capacidad','Capacidad')!!}
	                {!! Form::text('capacidad', null, array('placeholder' => 'Capacidad...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('ubicacion','Ubicacion')!!}
	                {!! Form::select('ubicacion', ['' => 'Seleccion Piso...','Primer Piso' => 'Primer Piso', 'Segundo Piso' => 'Segundo Piso','Tercer Piso' => 'Tercer Piso'], null, ['class' => 'form-control']) !!}
	            </div>
				<button type="submit" class="btn btn-primary">Registrar</button>    
				<a class="btn btn-danger" href="{{route('salas.index')}}">Cancelar</a>   	
	        </div>
		</div>
	{!! Form::close() !!}

@endsection

@else

@include('layouts.error')

@endif	