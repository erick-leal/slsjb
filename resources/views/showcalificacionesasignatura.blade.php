@if (Auth::guard('profesor')->check())	

@extends('layouts.admin')

@section('title','Listado de Alumnos') 

@section('content')

	{!! Form::open( ['class' => 'navbar-form pull-right']) !!}
        <a href="{{ URL('pdfcalificaciones', $asignatura->id) }}" class="btn btn-danger" ><span class="fa fa-print " aria-hidden="true"> Imprimir PDF</span></a>
	{!! Form::close()!!}
	        	
	 <strong>Asignatura :   </strong>   <a>  {{$asignatura->nombre}}</a><br>
	 @if(($asignatura->id_curso)== null)
	 <strong>Curso  :  </strong><br>
	 @else
	 <strong>Curso : </strong> <a>{{$asignatura->curso->nombre." / ".$asignatura->curso->tipo}}</a><br>
	 @endif
	 <strong>Periodo :	  </strong> <a>{{$asignatura->periodo." - ".$asignatura->created_at->year}}</a><br>
	 <strong>Horario : 	  </strong> <a>{{$asignatura->horario}}</a><br><br>
	
	<form action="{{ url ('showcalificacionesasignatura' . $asignatura->id) }}" method="post">
	{{ csrf_field() }}
	
	<table class="table table-bordered">
		<tr>
			
			<th width="120">Rut</th>

			@foreach ($evaluaciones as $e)
				<th width="120">{{$e->nombre}}</th>
			@endforeach
			
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