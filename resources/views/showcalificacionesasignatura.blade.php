@if (Auth::guard('profesor')->check())	

@extends('layouts.admin')

@section('title','Listado de Alumnos')  

@section('content')


	        	
	 <strong>Asignatura :   </strong>   <a>  {{$asignatura->nombre}}</a><br>
	 @if(($asignatura->id_curso)== null)
	 <strong>Curso  :  </strong><br>
	 @else
	 <strong>Curso : </strong> <a>{{$asignatura->curso->nombre." / ".$asignatura->curso->tipo}}</a><br>
	 @endif
	 <strong>Periodo :	  </strong> <a>{{$asignatura->periodo." - ".$asignatura->created_at->year}}</a><br>
	 @if(($asignatura->horario) == null )
	 <strong>Horario :	  </strong> <a>Sin Horario</a><br><br>
	 @else
	 <strong>Horario : 	  </strong> <a>{{$asignatura->horario}}</a><br><br>
	 @endif
	
	<form name="notas">
	{{ csrf_field() }}
	
	<table class="table table-bordered">
		<tr>
			
			<th width="120">Alumno</th>

			@foreach ($evaluaciones as $e)
				<th width="120">{{$e->nombre}}</th>
			@endforeach
			
			
          
		</tr>

			@foreach ($matriculados as $m)
				<tr>
					<td>{{$m->alumno->apellido_paterno." ".$m->alumno->apellido_materno." ".$m->alumno->nombre}}</td>
					@for($i=0, $length = count($evaluaciones); $i < $length; $i++)
        			<td>
        				<input class="nota" pattern="([1-6](\.[0-9]{1,2})?)|7(\.00?)?" type="text" data-id-matricula="{{ $m->id }}" data-id-evaluacion="{{ $evaluaciones[$i]->id }}" value="{{ (isset($notas[$m->id]))? (isset($notas[$m->id][$evaluaciones[$i]->id]))?$notas[$m->id][$evaluaciones	[$i]->id]: 1.0 : 1.0 }}"/>
        			</td>
        			@endfor	
				</tr>
			@endforeach

	</table>
	<button type="button" class="btn btn-primary" onclick="guardarNotas()">Guardar</button>

	</form>

<script>
	function guardarNotas(){
		var object = [];

		$(".nota").each(function (index, element){
			object.push({
				'idMatricula': $(element).data('idMatricula'),
				'idEvaluacion': $(element).data('idEvaluacion'),
				'nota': $(element).val()
			});
		});

		$.ajax('../savecalificacionesasignatura', {
			contentType: 'aplication/json',
			data: JSON.stringify(object),
			method: 'post',
			headers: {
				'X-CSRF-TOKEN' : $('[name="_token"]').val()
			},
			success: function (data) {
				console.log('se ha guardado');
				window.location.replace("../datos-profesor/vercalificacion/" + {{ $asignatura->id }} );
			},
			error: function (data) {
				console.log('Error:', data)
			}
		});

	}
</script>

@endsection

@else

@include('layouts.error')

@endif	