@extends('layouts.admin')

@section('title','Asignaturas')

@section('content')
    <strong>Profesor :</strong><a> {{$profesor->nombre." ".$profesor->apellido_paterno." ".$profesor->apellido_materno}}</a><br>
    <strong>Rut : </strong><a>{{$profesor->rut}}</a><br><br>

           
                            <table class="table table-bordered">
                           
                                <tr>
                                	<th>Código : </th>
                                	<th>Asignatura : </th>
                                	<th>Curso : </th>
                                    <th>Sala : </th>
                                    <th>Horario : </th>
                                    <th>Opciones :</th>
                                    
                                </tr>
                                @foreach($mis_asignaturas as $asignatura)
                                <tr>
                                    <td>{{$asignatura->codigo}}</td>
                                    <td>{{$asignatura->nombre}}</td>
                                    @if(($asignatura->id_curso) == null)
                                    <td>Sin Curso</td>
                                    @else
                                    <td>{{$asignatura->curso->nombre." - ".$asignatura->curso->tipo}}</td>
                                    @endif
                                    @if(($asignatura->id_sala) == null)
                                    <td>Sin Sala</td>
                                    @else
                                    <td>{{$asignatura->sala->nombre}}</td>
                                    @endif
                                    <td>{{$asignatura->horario}}</td>
                                    <td><a href="{{URL('showalumnosasignatura', $asignatura->id)}}" class="btn btn-success" ><span class="fa fa-user" aria-hidden="true"> Alumnos</span></a>
                                    <a href="{{URL('calificaciones/agregar', $asignatura->id)}}" class="btn btn-warning" ><span class="fa fa-file-text" aria-hidden="true"> Notas</span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>

    

@endsection