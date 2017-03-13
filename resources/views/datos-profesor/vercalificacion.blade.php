@extends('layouts.admin')

@section('title','Calificaciones Parciales')

@section('content')
		
        @if(count($mis_notas) == 0)
        {!! Form::open( ['class' => 'navbar-form pull-right']) !!}
        <a class="btn btn-success" href="{{URL('agregar/calificacion', array($alumno->id, $asignatura->id ))}}"> Agregar Nota</a>
	    {!! Form::close()!!}
	    @endif
        

           <strong>Alumno :</strong> <a> {{$alumno->nombre." ".$alumno->apellido_paterno." ".$alumno->apellido_materno}}</a><br>
           <strong>Rut :</strong> <a>{{$alumno->rut}}</a><br>
           <strong>Asignatura :</strong> <a>{{$asignatura->nombre}}</a><br><br>
                            <table class="table table-bordered">
                           
                                <tr>
                                	
                                    <th>N1</th>
                                    <th>N2</th>
                                    <th>N3</th>
                                    <th>N4</th>
                                    <th>N5</th>
                                    <th>N6</th>
                                    <th>N7</th>
                                    <th>N8</th>
                                	<th>Promedio  </th>
                                	<th>Examen  </th>
                                    <th>Final  </th>
                                    <th>Observacion  </th>
                                    <th>Opciones  </th>
    
                                </tr>
                                
                                <tr>
                                  @foreach($mis_notas as $mis_notas)  
                                    <td>{{$mis_notas->n1}}</td>
                                    <td>{{$mis_notas->n2}}</td>
                                    <td>{{$mis_notas->n3}}</td>
                                    <td>{{$mis_notas->n4}}</td>
                                    <td>{{$mis_notas->n5}}</td>
                                    <td>{{$mis_notas->n6}}</td>
                                    <td>{{$mis_notas->n7}}</td>
                                    <td>{{$mis_notas->n8}}</td>
                                    <td>{{$mis_notas->promedio}}</td>
                                    <td>{{$mis_notas->examen}}</td>
                                    <td>{{$mis_notas->final}}</td>
                                    <td>{{$mis_notas->observacion}}</td>
                                    <td><a class="btn btn-warning" href="{{URL('modificar/calificacion', array($mis_notas->id_alumno, $mis_notas->id_asignatura, $mis_notas->id ))}}"> Agregar Notas</a></td>
                                </tr>
                               @endforeach
                            </table>

 
@endsection