@if (Auth::guard("administrativo")->check())

@extends('layouts.admin')

@section('title','Listado de Matriculas')

@section('content')
	 @if (Auth::guard("administrativo")->check())       	
	<a class="btn btn-success" href="{{ route('matriculas.create') }}"> Registrar Nueva Matricula</a>
	@endif
	<!-- Buscador -->
	{!! Form::open(['route' => 'matriculas.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
		<div class="input-group">
			{!! Form::text('fecha', null, ['class' => 'form-control', 'placeholder' => 'Buscar...', 'aria-describedby' => 'search']) !!}
			<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
		</div>
	{!! Form::close() !!}
	<!-- fin -->
	 
	<table class="table table-bordered">
		<tr>
			<th>Fecha</th>
			<th>Rut</th>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Estado</th>
			<th>Opciones</th>	
		</tr>
			@foreach ($matriculas as $m)
				<tr>
					<td>{{ $m->created_at }}</td>
					<td>{{ $m->alumno->rut }}</td>
					<td>{{ $m->alumno->nombre}}</td>
					<td>{{ $m->alumno->apellido_paterno.' '.$m->alumno->apellido_materno}}</td>
					<td>{{ $m->estado}}</td>
					<td><a href="{{route('matriculas.show', $m->id)}}" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a>
						@if (Auth::guard("administrativo")->check())
						<a href="{{route('matriculas.edit', $m->id)}}" class="btn btn-warning"><span class="fa fa-edit" aria-hidden="true"></span></a>
						
						<a href="" data-target="#modal-delete-{{ $m->id }}"" data-toggle="modal" class="btn btn-danger"> <span class="fa fa-trash" aria-hidden="true"></span></a>
						@endif
				</tr>
				@include('matriculas.modal')
			@endforeach

	</table>
	{!! $matriculas->render() !!}
@endsection

@else

@include('layouts.error')

@endif	