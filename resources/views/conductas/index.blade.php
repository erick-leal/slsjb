@extends('layouts.admin')

@section('title','Listado de Anotaciones')

@section('content')
	        	
	<br>
	 
	<table class="table table-bordered">
		<tr>
			<th>Fecha</th>
			<th>Rut</th>
			<th>Alumno</th>
			<th>Asignatura</th>
			<th>Profesor</th>
			<th>Opciones</th>	
		</tr>
			@foreach ($mis_conductas as $con)
				<tr>
					<td>{{ $con->created_at }}</td>
					<td>{{ $con->alumno->rut}}</td>
					<td>{{ $con->alumno->nombre." ".$con->alumno->apellido_paterno." ".$con->alumno->apellido_materno }}</td>
					<td>{{ $con->asignatura->nombre}}</td>
					<td>{{ $con->profesor->nombre." ".$con->profesor->apellido_paterno}}</td>
					<td><a href="{{route('conductas.show', $con->id)}}" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a>
						<a href="{{route('conductas.edit', $con->id)}}" class="btn btn-warning"><span class="fa fa-edit" aria-hidden="true"></span></a>
						
						<a href="" data-target="#modal-delete-{{ $con->id }}"" data-toggle="modal" class="btn btn-danger"> <span class="fa fa-trash" aria-hidden="true"></span></a>
				</tr>
				@include('conductas.modal')
			@endforeach

	</table>
	
@endsection