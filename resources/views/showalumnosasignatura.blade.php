@if (Auth::guard('profesor')->check() || Auth::guard("administrativo")->check() || Auth::guard("administrador")->check())	

@extends('layouts.admin')

@section('title','Listado de Alumnos')

@section('content')

	{!! Form::open( ['class' => 'navbar-form pull-right']) !!}
        <a href="{{URL('showcalificacionesasignatura', $asignatura->id)}}" class="btn btn-success" ><span class="fa fa-file-text " aria-hidden="true"> Calificaciones</span></a>
	{!! Form::close()!!}	
	        	
	<strong>Asignatura :   </strong>   <a>  {{$asignatura->nombre}}</a><br>
	@if(($asignatura->id_curso) == null)
	<strong>Curso  :</strong><br>
	@else
	<strong>Curso : </strong> <a>{{$asignatura->curso->nombre." / ".$asignatura->curso->tipo}}</a><br>
	@endif
	<strong>Periodo :	  </strong> <a>{{$asignatura->periodo." - ".$asignatura->created_at->year}}</a><br>
	<strong>Horario : 	  </strong> <a>{{$asignatura->horario}}</a><br><br>

	
	 
	<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>N°</th>
			<th>Rut</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Correo</th>
			<th>Información</th>
			<th>Anotaciones</th>
			<th>Notas</th>	
		</tr>

			@foreach ($alumnos as $alu)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $alu->rut }}</td>
					<td>{{ $alu->nombre}}</td>
					<td>{{ $alu->apellido_paterno." ".$alu->apellido_materno}}</td>
					<td>{{ $alu->email}}</td>

					<td><a href="{{route('alumnos.show', $alu->id)}}" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a><br><br></td>
					
					<td><a href="{{URL('datos-profesor/veranotacion',array($alu->id, $asignatura->id ))}}" class="btn btn-warning" ><span class="fa  fa-clone" aria-hidden="true"> </span></a></td>

					<td><a href="{{URL('datos-profesor/vercalificacion',array($alu->id, $asignatura->id ))}}" class="btn btn-danger" ><span class="fa fa-file-text" aria-hidden="true"> </span></a></td>

				</tr>
			@endforeach

	</table>
	</div>
@endsection

@else

@include('layouts.error')

@endif	