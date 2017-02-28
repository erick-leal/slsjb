@extends('layouts.admin')

@section('title','Lista de Noticias')

@section('content')
	        	
	<a class="btn btn-success" href="{{ route('noticias.create') }}"> Registrar Nueva Noticia</a>
	<!-- Buscador -->
	{!! Form::open(['route' => 'noticias.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
		<div class="input-group">
			{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Buscar Noticia..', 'aria-describedby' => 'search']) !!}
			<span class="btn input-group-addon" id="search"><span class="fa fa-search" aria-hidden="true"></span></span>
		</div>
	{!! Form::close() !!}
	<!-- fin -->
	 
	<table class="table table-bordered">
		<tr>
			<th>Fecha</th>
			<th>Nombre</th>
			<th>Administrador</th>
			<th>Opciones</th>
				
		</tr>
			@foreach ($noticias as $n)
				<tr>
					<td>{{ $n->fecha }}</td>
					<td>{{ $n->nombre }}</td>
					<td>{{ $n->administrativo->nombre." ".$n->administrativo->apellido_paterno}}</td>
					<td><a href="" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a>
						<a href="{{route('noticias.edit', $n->id)}}" class="btn btn-warning"><span class="fa fa-edit" aria-hidden="true"></span></a>
						
						<a href="" data-target="#modal-delete-{{ $n->id }}"" data-toggle="modal" class="btn btn-danger"> <span class="fa fa-trash" aria-hidden="true"></span></a>
				</tr>
				@include('noticias.modal')
			@endforeach

	</table>
	
@endsection