@extends('layouts.admin')

@section('title','Listado de Alumnos')

@section('content')
	

	@if (Auth::guard("administrador")->check())       	
	<a class="btn btn-success" href="{{ route('alumnos.create') }}"> Registrar Nuevo Alumno</a>
	@endif
	<!-- Buscador -->
	{!! Form::open(['route' => 'alumnos.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
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
			
			<th>Opciones</th>	
		</tr> 
			@foreach ($alumnos as $alu)
				<tr>
					<td>{{ $alu->rut }}</td>
					<td>{{ $alu->nombre}}</td>
					<td>{{ $alu->apellido_paterno.' '.$alu->apellido_materno}}</td>
					<td>{{ $alu->email}}</td>
					
					<td><a href="{{route('alumnos.show', $alu->id)}}" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a>
					@if (Auth::guard("administrador")->check() || Auth::guard("administrativo")->check())
						<a href="{{route('alumnos.edit', $alu->id)}}" class="btn btn-warning"><span class="fa fa-edit" aria-hidden="true"></span></a>
						
						<a href="" data-target="#modal-delete-{{ $alu->id }}"" data-toggle="modal" class="btn btn-danger"> <span class="fa fa-trash" aria-hidden="true"></span></a>
					@endif
				</tr>
				@include('alumnos.modal')
			@endforeach

	</table>
	{!! $alumnos->render() !!}
@endsection