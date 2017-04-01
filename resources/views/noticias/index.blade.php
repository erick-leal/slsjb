@if (Auth::guard('administrativo')->check())

@extends('layouts.admin')

@section('title','Lista de Noticias')

@section('content')
	 @if (Auth::guard("administrativo")->check() )       	
	<a class="btn btn-success" href="{{ route('noticias.create') }}"> Registrar Nueva Noticia</a>
	@endif
	<!-- Buscador -->
	{!! Form::open(['route' => 'noticias.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
		<div class="input-group">
			{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Buscar...', 'aria-describedby' => 'search']) !!}
			<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
		</div>
	{!! Form::close() !!}
	<!-- fin -->
	 
	<table class="table table-bordered">
		<tr>
			<th>Fecha</th>
			<th>Titulo</th>
			<th>Administrador</th>
			<th>Opciones</th>
				
		</tr>
			@foreach ($noticias as $n)
				<tr>
					<td>{{ $n->created_at }}</td>
					<td>{{ $n->nombre }}</td>
					<td>{{ $n->administrativo->nombre." ".$n->administrativo->apellido_paterno}}</td>
					<td><a href="" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a>
						@if (Auth::guard("administrativo")->check())
						<a href="{{route('noticias.edit', $n->id)}}" class="btn btn-warning"><span class="fa fa-edit" aria-hidden="true"></span></a>
						
						<a href="" data-target="#modal-delete-{{ $n->id }}"" data-toggle="modal" class="btn btn-danger"> <span class="fa fa-trash" aria-hidden="true"></span></a>
						@endif
				</tr>
				@include('noticias.modal')
			@endforeach

	</table>
	{{$noticias->render()}}

@endsection

@else

@include('layouts.error')

@endif	