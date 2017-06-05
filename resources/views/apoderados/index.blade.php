@extends('layouts.admin')

@section('title','Lista de Apoderados')

@section('content')
	        	
	<a class="btn btn-success" href="{{ route('apoderados.create') }}"> Registrar Nuevo Apoderado</a>
	<!-- Buscador -->
	{!! Form::open(['route' => 'apoderados.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
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
			@foreach ($apoderados as $apo)
				<tr>
					<td>{{ $apo->rut }}</td>
					<td>{{ $apo->nombre}}</td>
					<td>{{ $apo->apellido_paterno.' '.$apo->apellido_materno}}</td>
					<td>{{ $apo->email}}</td>
					<td>{{ $apo->telefono}}</td>
					<td><a href="{{route('apoderados.show', $apo->id)}}" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a>
						<a href="{{route('apoderados.edit', $apo->id)}}" class="btn btn-warning"><span class="fa fa-edit" aria-hidden="true"></span></a>
						
						<a href="" data-target="#modal-delete-{{ $apo->id }}"" data-toggle="modal" class="btn btn-danger"> <span class="fa fa-trash" aria-hidden="true"></span></a>
				</tr>
				@include('apoderados.modal')
			@endforeach

	</table>
	{!! $apoderados->render() !!}
@endsection