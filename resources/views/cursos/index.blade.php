@extends('layouts.admin')

@section('title','Lista de Cursos')

@section('content')
	        	
	<a class="btn btn-success" href="{{ route('cursos.create') }}"> Registrar Nuevo Curso</a>
	<!-- Buscador -->
	{!! Form::open(['route' => 'cursos.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
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
			<th>Curso</th> 
			<th>Modalidad</th>
			<th>Opciones</th>
				
		</tr>
			@foreach ($cursos as $curso)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $curso->nombre }}</td>
					<td>{{ $curso->tipo }}</td>
					<td><a href="{{route('cursos.show', $curso->id)}}" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a>
					<a href="{{URL('showalumnos', $curso->id)}}" class="btn btn-success" ><span class="fa fa-user" aria-hidden="true"></span></a>
					<a href="{{URL('showasignaturas', $curso->id)}}" class="btn btn-primary" ><span class="fa fa-book" aria-hidden="true"></span></a>
						<a href="{{route('cursos.edit', $curso->id)}}" class="btn btn-warning"><span class="fa fa-edit" aria-hidden="true"></span></a>
						<a href="" data-target="#modal-delete-{{ $curso->id }}"" data-toggle="modal" class="btn btn-danger"> <span class="fa fa-trash" aria-hidden="true"></span></a>
				</tr>
				@include('cursos.modal')
			@endforeach

	</table>
	{!! $cursos->render() !!}
@endsection