@if (Auth::guard("administrador")->check())

@extends('layouts.admin')

@section('title','Editar Sala: ' . $sala->nombre)

@section('content')

	@if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
            	{!! $message !!}
            @endforeach
        </div>
    @endif

	{!! Form::open(array('route' => ['salas.update',$sala],'method'=>'PUT')) !!}
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
	            <div class="form-group">
	                {!! Form::label('nombre','Sala')!!}
	                {!! Form::text('nombre', $sala->nombre, array('placeholder' => 'Sala...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('capacidad','Capacidad')!!}
	                {!! Form::text('capacidad', $sala->capacidad, array('placeholder' => 'Capacidad...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('ubicacion','Ubicacion')!!}
	                {!! Form::select('ubicacion', ['' => 'Seleccion Piso...','Primer Piso' => 'Primer Piso', 'Segundo Piso' => 'Segundo Piso','Tercer Piso' => 'Tercer Piso'], $sala->ubicacion, ['class' => 'form-control']) !!}
	            </div>
	      
	          
				<button type="submit" class="btn btn-primary">Editar</button>
				<a class="btn btn-danger" href="{{route('salas.index')}}">Cancelar</a>       	
	        </div>
		</div>
	{!! Form::close() !!}

@endsection

@else

@include('layouts.error')

@endif	