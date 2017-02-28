@extends('layouts.admin')

@section('title','Lista de Cargos')

@section('content')
	        	
	<a class="btn btn-success" href="{{ route('cargos.create') }}"> Registrar Nuevo Cargo</a>
	<!-- Buscador -->
	{!! Form::open(['route' => 'cargos.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
		<div class="input-group">
			{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Buscar Cargo..', 'aria-describedby' => 'search']) !!}
			<span class="btn input-group-addon" id="search"><span class="fa fa-search" aria-hidden="true"></span></span>
		</div>
	{!! Form::close() !!}
	<!-- fin -->
	 
	<table class="table table-bordered">
		<tr>
			<th>N°</th>
			<th>Nombre</th>
			<th>Desripcion</th>
			<th>Opciones</th>
				
		</tr>
			@foreach ($cargos as $cargo)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $cargo->nombre }}</td>
					<td>{{ $cargo->descripcion }}</td>
					<td><a href="" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a>
						<a href="{{route('cargos.edit', $cargo->id)}}" class="btn btn-warning"><span class="fa fa-edit" aria-hidden="true"></span></a>
						<a href="" data-target="#modal-delete-{{ $cargo->id }}"" data-toggle="modal" class="btn btn-danger"> <span class="fa fa-trash" aria-hidden="true"></span></a>
				</tr>
				@include('cargos.modal')
			@endforeach

	</table>
	{!! $cargos->render() !!}
@endsection