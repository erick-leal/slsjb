@if (Auth::guard("administrativo")->check() || Auth::guard("administrador")->check())

@extends('layouts.admin')

@section('title','Listado de Matriculas')

@section('content') 
	@if (Auth::guard("administrativo")->check())       	
	<a class="btn btn-success" href="{{ route('matriculas.create') }}"> Registrar Nueva Matricula</a>
	<a class="btn btn-warning" href="{{ URL('matriculas/reportes')}}"><span class="fa  fa-bar-chart" aria-hidden="true"></span> Estadisticas</a>
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
			<th>Curso</th>
			
			<th>Estado</th>
			<th>Opciones</th>	
		</tr>
			@foreach ($matriculas as $m)
				<tr>
					<td>{{Carbon\Carbon::parse($m->updated_at)->format('d-m-Y') }}</td>
					<td>{{ $m->alumno->rut }}</td>
					@if(($m->id_curso) == null)
					<td>Sin Curso</td>
					@else
					<td>{{ $m->curso->nombre." - ".$m->curso->tipo}}</td>
					@endif
					
					
					@if(Carbon\Carbon::parse($m->fecha)->age == 1)
					<td>No Matriculado</td>
					@else
					<td>{{ $m->estado }}</td>
					@endif
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