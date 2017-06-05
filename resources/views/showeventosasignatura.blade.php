@if (Auth::guard('alumno')->check())	

@extends('layouts.admin')

@section('title','Listado de Eventos')

@section('content')

		
	        	
	<strong>Asignatura :   </strong>   <a>  {{$asignatura->nombre}}</a><br>
	 @if(($asignatura->id_curso)== null)
	 <strong>Curso  :  </strong><br>
	 @else
	 <strong>Curso : </strong> <a>{{$asignatura->curso->nombre." / ".$asignatura->curso->tipo}}</a><br>
	 @endif
	
	<strong>Periodo :	  </strong> <a>{{$asignatura->periodo." - ".$asignatura->created_at->year}}</a><br>
	<strong>Horario : 	  </strong> <a>{{$asignatura->horario}}</a><br><br>

	
	 
	<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>N°</th>
			<th>Fecha</th>
			<th>Titulo</th>
			<th>Faltan</th>
			<th>Ver</th>
			
				
		</tr>

			@foreach ($eventos as $e)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ Carbon\Carbon::parse($e->fecha)->format('d-m-Y') }}</td>
					<td>{{ $e->nombre}}</td>
					<td>{{ Carbon\Carbon::parse($e->fecha)->diffForHumans()}}</td>
					

					<td><a href="{{route('eventos.show', $e->id)}}" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a><br><br></td>
					
					

				</tr>
			@endforeach

	</table>
	</div>
@endsection

@else

@include('layouts.error')

@endif	