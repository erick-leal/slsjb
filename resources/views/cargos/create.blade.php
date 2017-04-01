@if (Auth::guard("administrador")->check())

@extends('layouts.admin')

@section('title','Crear Cargo')

@section('content')
	
	@if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
            	{!! $message !!}
            @endforeach
        </div>
    @endif

	{!! Form::open(array('route' => 'cargos.store','method'=>'POST')) !!}
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
	            <div class="form-group">
	                {!! Form::label('nombre','Cargo')!!}
	                {!! Form::text('nombre', null, array('placeholder' => 'Cargo...','class' => 'form-control')) !!}
	            </div>
	      
	            <div class="form-group">
	                {!! Form::label('descripcion','Descripcion')!!}
	                {!! Form::text('descripcion', null, array('placeholder' => 'Descripcion...','class' => 'form-control')) !!}
	            </div>
				<button type="submit" class="btn btn-primary">Registrar</button>    
				<a class="btn btn-danger" href="{{route('cargos.index')}}">Cancelar</a>   	
	        </div>
		</div>
	{!! Form::close() !!}

@endsection

@else

@include('layouts.error')

@endif	