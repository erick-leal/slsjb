@if (Auth::guard("administrador")->check()  || Auth::guard("administrativo")->check())

@extends('layouts.admin')

@section('title','Listado de Asignaturas') 

@section('content')
	        	
	 <strong>Curso : </strong> <a>{{$curso->nombre." / ".$curso->created_at->year}}</a><br><br>
	
	 
	<table class="table table-bordered"> 
		<tr>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Periodo</th>
			<th>Profesor</th>
			<th>Sala</th>
			<th>Opciones</th>	
		</tr>
			@foreach ($asignaturas as $asi)
				<tr>
					<td>{{ $asi->codigo }}</td>
					<td>{{ $asi->nombre}}</td>
					<td>{{ $asi->periodo}}</td>
					@if(($asi->id_profesor) == null)
					<td></td>
					@else
					<td>{{ $asi->profesor->nombre." ".$asi->profesor->apellido_paterno}}</td>
					@endif
					@if(($asi->id_sala) == null)
					<td></td>
					@else
					<td>{{ $asi->sala->nombre}}</td>
					@endif
					<td><a href="{{route('asignaturas.show', $asi->id)}}" class="btn btn-info" title="Informacion Asignatura"><span class="fa fa-eye" aria-hidden="true"></span></a>
					<a href="{{URL('showalumnosasignatura', $asi->id)}}" class="btn btn-success" title="Ver Alumnos"><span class="fa fa-user" aria-hidden="true"></span></a>		
				</tr>
			@endforeach

	</table>
	
@endsection

@else

@include('layouts.error')

@endif	