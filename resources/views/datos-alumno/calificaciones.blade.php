@extends('layouts.admin')

@section('title','Registro de Calificaciones') 

@section('content')


           <strong>Alumno :</strong> <a>{{$alumno->nombre." ".$alumno->apellido_paterno." ".$alumno->apellido_materno}}</a><br>
           <strong>Rut:</strong> <a>{{$alumno->rut}}</a><br><br>
                            <table class="table table-bordered">
                           
                                <tr>
                                	
                                	<th>Asignatura</th>
									<th>N1</th>
						            <th>N2</th>
						            <th>N3</th>
						            <th>N4</th>
						            <th>N5</th>
						            <th>N6</th>
						            <th>N7</th>
						            <th>N8</th>
						            <th>Promedio</th>
						            <th>Examen</th>
						            <th>Final</th>	
                                </tr>
                                @foreach($mis_calificaciones as $n)
                                <tr>
                                    
                                    <td>{{$n->asignatura->nombre}}</td>
									@if($n->n1 == 0.0)<td></td>@else<td>{{$n->n1}}</td>@endif
									@if($n->n2 == 0.0)<td></td>@else<td>{{$n->n2}}</td>@endif
									@if($n->n3 == 0.0)<td></td>@else<td>{{$n->n3}}</td>@endif
									@if($n->n4 == 0.0)<td></td>@else<td>{{$n->n4}}</td>@endif
				                    @if($n->n5 == 0.0)<td></td>@else<td>{{$n->n5}}</td>@endif
				                    @if($n->n6 == 0.0)<td></td>@else<td>{{$n->n6}}</td>@endif
				                    @if($n->n7 == 0.0)<td></td>@else<td>{{$n->n7}}</td>@endif
				                    @if($n->n8 == 0.0)<td></td>@else<td>{{$n->n8}}</td>@endif
				                    <td>{{$n->promedio}}</td>
				                    @if($n->examen == 0.0)<td></td>@else<td>{{$n->examen}}</td>@endif
				                    <td>{{$n->final}}</td>
                                </tr>
                                @endforeach
                            </table>
                            

@endsection