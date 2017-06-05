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
			<th>Examen</th>
			<th>Final</th>
		</tr>
			@foreach ($alumnos as $a)
				<tr>
					<td>{{$a->rut}}</td>
	        		<td>{!! Form::text('n1', null, array('class' => 'form-control')) !!}</td>
        			<td>{!! Form::text('n2', null, array('class' => 'form-control')) !!}</td>
        			<td>{!! Form::text('n3', null, array('class' => 'form-control')) !!}</td>
        			<td>{!! Form::text('n4', null, array('class' => 'form-control')) !!}</td>  
        			<td>{!! Form::text('n5', null, array('class' => 'form-control')) !!}</td>
        			<td>{!! Form::text('n6', null, array('class' => 'form-control')) !!}</td>
        			<td>{!! Form::text('n7', null, array('class' => 'form-control')) !!}</td>
        			<td>{!! Form::text('n8', null, array('class' => 'form-control')) !!}</td>	 
        			<td>{!! Form::text('promedio', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}</td>
        			<td>{!! Form::text('examen', null, array('class' => 'form-control')) !!}</td>
        			<td>{!! Form::text('final', null, array('class' => 'form-control', 'readonly' => 'readonly')) !!}</td>    		
				</tr>
			@endforeach
	</table>

@endsection

@else

@include('layouts.error')

@endif	