@if (Auth::guard('profesor')->check()|| Auth::guard("administrador")->check())

@extends('layouts.admin')

@section('title','Listado de Calificaciones')

@section('content')<br>

	<strong>Asignatura :   </strong>   <a>  {{$asignatura->nombre}}</a><br>
	@if(($asignatura->id_curso)== null)
	<strong>Curso  :  </strong><br>
	@else
	<strong>Curso : </strong> <a>{{$asignatura->curso->nombre." / ".$asignatura->curso->tipo}}</a><br>
	@endif
	<strong>Periodo :	  </strong> <a>{{$asignatura->periodo." - ".$asignatura->created_at->year}}</a><br>
	<strong>Horario : 	  </strong> <a>{{$asignatura->horario}}</a><br><br>

	<form action="{{ url ('calificaciones/agregar/' . $asignatura->id) }}" method="post">
	{{ csrf_field() }}
	        	
	<table class="table table-bordered table-responsive"> 
		<tr>
			<th width="120">Rut</th>
			<th>n1</th>
			<th>n2</th>
			<th>n3</th>
			<th>n4</th>
			<th>n5</th>
			<th>n6</th>
			<th>n7</th>
			<th>n8</th>
			<th>Promedio</th>
			
			
		</tr>
			@foreach ($alumnos as $a)
				<tr>
					<td>{{$a->alumno->rut}}</td>
        					
				</tr>
			@endforeach
	</table>

		<button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection

@else

@include('layouts.error')

@endif	