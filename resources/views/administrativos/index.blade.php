@extends('layouts.admin')

@section('title','Lista de Administrativos')

@section('content')
	        	
	<a class="btn btn-success" href="{{ route('administrativos.create') }}"> Registrar Nuevo Administrativo</a>
	<!-- Buscador -->
	{!! Form::open(['route' => 'administrativos.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
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
			@foreach ($administrativos as $adm)
				<tr>
					<td>{{ $adm->rut }}</td>
					<td>{{ $adm->nombre}}</td>
					<td>{{ $adm->apellido_paterno.' '.$adm->apellido_materno}}</td>
					<td>{{ $adm->email}}</td>
					<td>{{ $adm->telefono}}</td>
					<td><a href="" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a>
						<a href="{{route('administrativos.edit', $adm->id)}}" class="btn btn-warning"><span class="fa fa-edit" aria-hidden="true"></span></a>
						
						<a href="" data-target="#modal-delete-{{ $adm->id }}"" data-toggle="modal" class="btn btn-danger"> <span class="fa fa-trash" aria-hidden="true"></span></a>
				</tr>
				@include('administrativos.modal')
			@endforeach

	</table>
	
@endsection