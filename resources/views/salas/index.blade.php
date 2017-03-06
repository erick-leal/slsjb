@extends('layouts.admin')

@section('title','Lista de Salas')

@section('content')
	        	
	<a class="btn btn-success" href="{{ route('salas.create') }}"> Registrar Nueva Sala</a>
	<!-- Buscador -->
	{!! Form::open(['route' => 'salas.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
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
			<th>N°</th>
			<th>Sala</th>
			<th>Capacidad</th>
			<th>Ubicacion</th>
			<th>Opciones</th>
				
		</tr>
			@foreach ($salas as $sala)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $sala->nombre }}</td>
					<td>{{ $sala->capacidad }}</td>
					<td>{{ $sala->ubicacion }}</td>
					<td><a href="" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a>
						<a href="{{route('salas.edit', $sala->id)}}" class="btn btn-warning"><span class="fa fa-edit" aria-hidden="true"></span></a>
						<a href="" data-target="#modal-delete-{{ $sala->id }}"" data-toggle="modal" class="btn btn-danger"> <span class="fa fa-trash" aria-hidden="true"></span></a>
				</tr>
				@include('salas.modal')
			@endforeach

	</table>
	{!! $salas->render() !!}
@endsection