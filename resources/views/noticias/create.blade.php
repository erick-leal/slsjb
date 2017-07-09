@if (Auth::guard('administrativo')->check() || Auth::guard('administrador')->check())

@extends('layouts.admin')

@section('title','Registrar Noticia')

@section('content')
	
	@if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
            	{!! $message !!}
            @endforeach
        </div>
    @endif

	{!! Form::open(array('route' => 'noticias.store','method'=>'POST', 'files' => true)) !!}
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                {!! Form::label('nombre','Titulo')!!}
	                {!! Form::text('nombre', null, array('placeholder' => 'Titulo...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('resumen','Bajada de titulo')!!}
	                {!! Form::text('resumen', null, array('placeholder' => 'Bajada de titulo...','class' => 'form-control')) !!}
	            </div>
	      
	            <div class="form-group">
	                {!! Form::label('descripcion','Descripcion')!!}
	                {!! Form::textarea('descripcion', null,['class' => 'form-control textarea-descripcion']) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('foto','Foto')!!}
	                {!! Form::file('foto', null, array('placeholder' => 'Foto...','class' => 'form-control')) !!}
	            </div>

				<button type="submit" class="btn btn-primary">Registrar</button>    
				<a class="btn btn-danger" href="{{route('noticias.index')}}">Cancelar</a>   	
	        </div>
		</div>
	{!! Form::close() !!}

@endsection

@section('js')
	
	

	<script>
		$('.textarea-descripcion').trumbowyg({
			lang: 'es',
			removeformatPasted: true
		});
	</script>
@endsection

@else

@include('layouts.error')

@endif	