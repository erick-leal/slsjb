@if (Auth::guard('profesor')->check())

	<strong>Asignatura :   </strong>   <a>  {{$asignatura->nombre}}</a><br>
	<strong>Curso : </strong> <a>{{$asignatura->curso->nombre." / ".$asignatura->curso->tipo}}</a><br>
	<strong>Periodo :	  </strong> <a>{{$asignatura->periodo." - ".$asignatura->created_at->year}}</a><br><br>
	<strong>Calificaciones Parciales</strong><br><br>
	
	
	<div class="container">
	<table width="720px" cellpadding="5px" cellspacing="5px" border="1">
		<tr bgcolor="#CCCCCC">
			
			<th width="120">Alumnos</th>

			@foreach ($evaluaciones as $e)
                <th width="30">{{$e->nombre}}</th>
            @endforeach

            <th width="80">Promedio</th>

		</tr>

			@foreach ($alumnos as $a)
                <tr>
                    <td>{{$a->apellido_paterno." ".$a->apellido_materno." ".$a->nombre}}</td>
                    @for($i=0, $length = count($evaluaciones); $i < $length; $i++)
                    <td>
                        <input  type="text" size="1" style="text-align: center" value="{{ (isset($notas[$a->id]))? (isset($notas[$a->id][$evaluaciones[$i]->id]))?$notas[$a->id][$evaluaciones[$i]->id]: 1.0 : 1.0 }}"/>
                    </td>
                    @endfor

                    <td> <input type="text" size="1" style="text-align:center" disabled value="{{ number_format($promedios[$a->id]['promedio'],1) }}" /></td> 
                    
                </tr>
            @endforeach

	</table>
	</div>

@else

@include('layouts.error')

@endif