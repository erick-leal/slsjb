@extends('layouts.admin')

@section('title','Listado de Calificaciones')

@section('content')
	        	
	<a class="btn btn-success" href="{{ route('calificaciones.create') }}"> Registrar Nueva Nota</a><br><br>
	 
	<table class="table table-bordered">
		<tr>
			<th>Fecha</th>
			<th>Rut</th>
			<th>Alumno</th>
			<th>Asignatura</th>
			<th>Tipo</th>
			<th>Opciones</th>	
		</tr>
			@foreach ($calificaciones as $cal)
				<tr>
					<td>{{ $cal->created_at }}</td>
					<td>{{ $cal->alumno->rut}}</td>
					<td>{{ $cal->alumno->nombre." ".$cal->alumno->apellido_paterno." ".$cal->alumno->apellido_materno }}</td>
					<td>{{ $cal->asignatura->nombre}}</td>
					<td>{{ $cal->observacion}}</td>
					<td><a href="{{route('calificaciones.show', $cal->id)}}" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a>
						<a href="{{route('calificaciones.edit', $cal->id)}}" class="btn btn-warning"><span class="fa fa-edit" aria-hidden="true"></span></a>
						
						<a href="" data-target="#modal-delete-{{ $cal->id }}"" data-toggle="modal" class="btn btn-danger"> <span class="fa fa-trash" aria-hidden="true"></span></a>
				</tr>
				@include('calificaciones.modal')
			@endforeach

	</table>
	{!! $calificaciones->render() !!}
@endsection