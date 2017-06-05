@if (Auth::guard('administrativo')->check() || Auth::guard('administrador')->check())

@extends('layouts.admin')

@section('title','Editar Noticia: ' . $noticia->nombre)

@section('content')

	@if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
            	{!! $message !!}
            @endforeach
        </div>
    @endif

	{!! Form::open(array('route' => ['noticias.update',$noticia],'method'=>'PUT', 'files' => true)) !!}
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                {!! Form::label('nombre','Titulo')!!}
	                {!! Form::text('nombre', $noticia->nombre, array('placeholder' => 'Titulo...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('fecha','Fecha')!!}
	                {!! Form::date('fecha', $noticia->fecha, array('placeholder' => 'Fecha...','class' => 'form-control')) !!}
	            </div>
	      
	            <div class="form-group">
	                {!! Form::label('descripcion','Descripcion')!!}
	                {!! Form::textarea('descripcion',$noticia->descripcion, array('class' => 'form-control textarea-descripcion')) !!}
	            </div>
  	
				<div class="form-group">
					{!! Form::label('foto','Imagen')!!}
					{!! Form::file('foto', null, array('placeholder' => 'Imagen...','class' => 'form-control')) !!}
					@if(($noticia->foto)!="")
						<br><img src="{{ asset('imagenes/noticias/'.$noticia->foto) }}" height="300px" width="300px">
					@endif
				</div>
		
				<button type="submit" class="btn btn-primary">Editar</button>
				<a class="btn btn-danger" href="{{route('noticias.index')}}">Cancelar</a>       	
	        </div>
		</div>
	{!! Form::close() !!}

@endsection

@section('js')
	<script>
		$('.textarea-descripcion').trumbowyg();
	</script>
@endsection	

@else

@include('layouts.error')

@endif	