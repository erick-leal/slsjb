@extends('layouts.admin')

@section('title','Listado de Asignaturas')

@section('content')
	        	
	 <strong>Curso : </strong> <a>{{$curso->nombre}}</a>
	<!-- Buscador -->
	{!! Form::open(['route' => 'asignaturas.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
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
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Curso</th>
			<th>Profesor</th>
			<th>Sala</th>
			<th>Opciones</th>	
		</tr>
			@foreach ($asignaturas as $asi)
				<tr>
					<td>{{ $asi->codigo }}</td>
					<td>{{ $asi->nombre}}</td>
					<td>{{ $asi->curso->nombre}}</td>
					<td>{{ $asi->profesor->nombre." ".$asi->profesor->apellido_paterno}}</td>
					<td>{{ $asi->sala->nombre}}</td>
					<td><a href="{{route('asignaturas.show', $asi->id)}}" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a>
					<a href="" class="btn btn-success" ><span class="fa fa-user" aria-hidden="true"></span></a>		
				</tr>
			@endforeach

	</table>
	
@endsection