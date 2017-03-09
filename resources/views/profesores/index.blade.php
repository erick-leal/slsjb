@extends('layouts.admin')

@section('title','Lista de Profesores')

@section('content')
	        	
	<a class="btn btn-success" href="{{ route('profesores.create') }}"> Registrar Nuevo Profesor</a>
	<!-- Buscador -->
	{!! Form::open(['route' => 'profesores.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
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
			<th>Rut</th>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Email</th>
			<th>Telefono</th>	
			<th>Opciones</th>
		</tr>
			@foreach ($profesores as $pro)
				<tr>
					<td>{{ $pro->rut }}</td>
					<td>{{ $pro->nombre}}</td>
					<td>{{ $pro->apellido_paterno.' '.$pro->apellido_materno}}</td>
					<td>{{ $pro->email}}</td>
					<td>{{ $pro->telefono}}</td>
					<td><a href="" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a>
						<a href="{{route('profesores.edit', $pro->id)}}" class="btn btn-warning"><span class="fa fa-edit" aria-hidden="true"></span></a>
						
						<a href="" data-target="#modal-delete-{{ $pro->id }}"" data-toggle="modal" class="btn btn-danger"> <span class="fa fa-trash" aria-hidden="true"></span></a>
				</tr>
				@include('profesores.modal')
			@endforeach

	</table>
	{!! $profesores->render() !!}
@endsection