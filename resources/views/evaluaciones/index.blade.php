@if (Auth::guard('profesor')->check())

@extends('layouts.admin')

@section('title','Lista de Evaluaciones')

@section('content')
	        	
	<a class="btn btn-success" href="{{ route('evaluaciones.create') }}">Nueva Evaluacion</a><br><br>
	
	 
	<table class="table table-bordered">
		<tr>
			<th>N°</th>
			<th>Nombre</th>
			<th>Asignatura</th>
			<th>Fecha</th>
			<th>Opciones</th>
				
		</tr>
			@foreach ($mis_evaluaciones as $eva)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $eva->nombre }}</td>
					<td>{{ $eva->asignatura->nombre." - ".$eva->asignatura->periodo." ".$eva->asignatura->created_at->year }}</td>
					<td>{{ Carbon\Carbon::parse($eva->fecha)->format('d-m-Y') }}</td>
					<td><a href="" data-target="#modal-show-{{ $eva->id }}"" data-toggle="modal" class="btn btn-info"> <span class="fa fa-eye" aria-hidden="true"></span></a>
						<a href="{{route('evaluaciones.edit', $eva->id)}}" class="btn btn-warning"><span class="fa fa-edit" aria-hidden="true"></span></a>
						
						<a href="" data-target="#modal-delete-{{ $eva->id }}"" data-toggle="modal" class="btn btn-danger"> <span class="fa fa-trash" aria-hidden="true"></span></a>
				</tr>
				@include('evaluaciones.modal')
				@include('evaluaciones.modalshow')
			@endforeach

	</table>
	

@endsection

@else

@include('layouts.error')

@endif	