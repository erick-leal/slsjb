@extends('layouts.admin')

@section('title','Lista de Cursos')

@section('content')
	        	
	<a class="btn btn-success" href="{{ route('cursos.create') }}"> Registrar Nuevo Curso</a><hr>
	 
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
					<td><a href="" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a>
						<a href="{{route('cursos.edit', $curso->id)}}" class="btn btn-warning"><span class="fa fa-edit" aria-hidden="true"></span></a>
						<!--<a href="{{route('cursos.destroy', $curso->id)}}" class="btn btn-danger" onclick="return confirm('Seguro deseas eliminar?')"> <span class="fa fa-trash" aria-hidden="true"></span></a></td>-->
						<a href="" data-target="#modal-delete-{{ $curso->id }}"" data-toggle="modal" class="btn btn-danger"> <span class="fa fa-trash" aria-hidden="true"></span></a>
				</tr>
				@include('cursos.modal')
			@endforeach

	</table>
	{!! $cursos->render() !!}
@endsection