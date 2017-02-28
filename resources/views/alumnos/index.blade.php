@extends('layouts.admin')

@section('title','Listado de Alumnos')

@section('content')
	        	
	<a class="btn btn-success" href="{{ route('alumnos.create') }}"> Registrar Nuevo Alumno</a>
	<!-- Buscador -->
	{!! Form::open(['route' => 'alumnos.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
		<div class="input-group">
			{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Buscar Alumno..', 'aria-describedby' => 'search']) !!}
			<span class="btn input-group-addon" id="search"><span class="fa fa-search" aria-hidden="true"></span></span>
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
			@foreach ($alumnos as $alu)
				<tr>
					<td>{{ $alu->rut }}</td>
					<td>{{ $alu->nombre}}</td>
					<td>{{ $alu->apellido_paterno.' '.$alu->apellido_materno}}</td>
					<td>{{ $alu->email}}</td>
					<td>{{ $alu->telefono}}</td>
					<td><a href="" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a>
						<a href="{{route('alumnos.edit', $alu->id)}}" class="btn btn-warning"><span class="fa fa-edit" aria-hidden="true"></span></a>
						
						<a href="" data-target="#modal-delete-{{ $alu->id }}"" data-toggle="modal" class="btn btn-danger"> <span class="fa fa-trash" aria-hidden="true"></span></a>
				</tr>
				@include('alumnos.modal')
			@endforeach

	</table>
	
@endsection