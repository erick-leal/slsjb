@if (Auth::guard("administrador")->check() || Auth::guard("administrativo")->check())

@extends('layouts.admin')

@section('title','Lista de Cursos')

@section('content')
	@if (Auth::guard("administrador")->check())       	
	<a class="btn btn-success" href="{{ route('cursos.create') }}"> Registrar Nuevo Curso</a>
	@endif
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
			<th>Cupos</th>
			<th>Opciones</th>
				
		</tr>
			@foreach ($cursos as $curso)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $curso->nombre }}</td>
					<td>{{ $curso->tipo }}</td>
					<td>{{ $curso->alumnos_count }} / 45</td>
					<td><a href="{{route('cursos.show', $curso->id)}}" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a>
					<a href="{{URL('showalumnoscurso', $curso->id)}}" class="btn btn-success" ><span class="fa fa-user" aria-hidden="true"></span></a>
					<a href="{{URL('showasignaturascurso', $curso->id)}}" class="btn btn-primary" ><span class="fa fa-book" aria-hidden="true"></span></a>
						@if (Auth::guard("administrador")->check()) 
						<a href="{{route('cursos.edit', $curso->id)}}" class="btn btn-warning"><span class="fa fa-edit" aria-hidden="true"></span></a>
						<a href="" data-target="#modal-delete-{{ $curso->id }}"" data-toggle="modal" class="btn btn-danger"> <span class="fa fa-trash" aria-hidden="true"></span></a>
						@endif
				</tr>
				@include('cursos.modal')
			@endforeach

	</table>
	{!! $cursos->render() !!}
@endsection

@else

@include('layouts.error')

@endif	