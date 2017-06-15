@if (Auth::guard("administrativo")->check() || Auth::guard("administrador")->check())	

@extends('layouts.admin')

@section('title','Listado de Alumnos')

@section('content')
	        	
	 <strong>Curso : </strong> <a>{{$curso->nombre." / ".$curso->created_at->year}}</a><br><br>
	
	 
	<table class="table table-bordered">
		<tr>
			<th>N°</th>
			<th>Rut</th>
			<th>Nombre</th>
			<th>Apellido Paterno</th> 
			<th>Apellido Materno</th>
			<th>Correo</th>
			<th>Opciones</th>	
		</tr>

			@foreach ($alumnos as $alu)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $alu->alumno->rut }}</td>
					<td>{{ $alu->alumno->nombre}}</td>
					<td>{{ $alu->alumno->apellido_paterno}}</td>
					<td>{{ $alu->alumno->apellido_materno}}</td>
					<td>{{ $alu->alumno->email}}</td>

					<td><a href="{{route('alumnos.show', $alu->alumno->id)}}" class="btn btn-info" title="Informacion Alumno"><span class="fa fa-eye" aria-hidden="true"></span></a>	
				</tr>
			@endforeach

	</table>

@endsection

@else

@include('layouts.error')

@endif	