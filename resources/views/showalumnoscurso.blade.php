@if (Auth::guard("administrativo")->check() || Auth::guard("administrador")->check())	

@extends('layouts.admin')

@section('title','Listado de Alumnos') 

@section('content')

	{!! Form::open( ['class' => 'navbar-form pull-right']) !!}
        <a href="{{ URL('pdfcursos', $curso->id) }}" class="btn btn-danger" ><span class="fa fa-print " aria-hidden="true"> Imprimir PDF</span></a>
    {!! Form::close()!!}
	        	
	 <strong>Curso : </strong> <a>{{$curso->nombre." - ".$curso->tipo}}</a><br>
	 <strong>Año : </strong><a>{{$curso->created_at->year}}</a><br>
	 <strong>Profesor Jefe: </strong><a>{{$curso->profesor->nombre." ".$curso->profesor->apellido_paterno." ".$curso->profesor->apellido_materno}}</a><br><br>
	
	 
	<table class="table table-bordered">
		<tr>
			<th>N°</th>
			<th>Rut</th>
			<th>Apellidos</th> 
			<th>Nombres</th>
			
			
			<th>Correo</th>
			<th>Opciones</th>	
		</tr>

			@foreach ($alumnos as $alu)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $alu->rut }}</td>
					<td>{{ $alu->apellido_paterno." ".$alu->apellido_materno}}</td>
					<td>{{ $alu->nombre}}</td>
					
					
					<td>{{ $alu->email}}</td>

					<td><a href="{{route('alumnos.show', $alu->id)}}" class="btn btn-info" title="Informacion Alumno"><span class="fa fa-eye" aria-hidden="true"></span></a>	
				</tr>
			@endforeach

	</table>

@endsection

@else

@include('layouts.error')

@endif	