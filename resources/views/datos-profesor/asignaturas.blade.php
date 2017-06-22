@if (Auth::guard('profesor')->check())

@extends('layouts.admin')

@section('title','Asignaturas')

@section('content')
    <strong>Profesor :</strong><a> {{$profesor->nombre." ".$profesor->apellido_paterno." ".$profesor->apellido_materno}}</a><br>
    <strong>Rut : </strong><a>{{$profesor->rut}}</a><br><br>

           
                            <table class="table table-bordered">
                           
                                <tr>
                                	<th>Asignatura  </th>
                                    <th>Periodo </th>
                                	<th>Curso  </th>
                                    <th>Ver  </th>
                                    
                                    <th>Alumnos </th>
                                    
                                    
                                </tr>
                                @foreach($mis_asignaturas as $asignatura)
                                <tr>
                                    
                                    <td>{{$asignatura->nombre}}</td>
                                    <td>{{$asignatura->periodo}}</td>
                                    @if(($asignatura->id_curso) == null)
                                    <td>Sin Curso</td>
                                    @else
                                    <td>{{$asignatura->curso->nombre." - ".$asignatura->curso->tipo}}</td>
                                    @endif
                                    <td><a href="" data-target="#modal-show-{{ $asignatura->id }}"" data-toggle="modal" class="btn btn-info"> <span class="fa fa-eye" aria-hidden="true"></span></a></td>

                                    <td><a href="{{URL('showalumnosasignatura', $asignatura->id)}}" class="btn btn-success" ><span class="fa fa-user" aria-hidden="true"></span></a></td>
                                    
                                    <!--<td><a href="{{URL('calificaciones/agregar', $asignatura->id)}}" class="btn btn-warning" ><span class="fa fa-file-text" aria-hidden="true"> </span></a></td>-->

                                    
                                </tr>
                                @include('datos-profesor.modal')
                                @endforeach
                            </table>

    

@endsection

@else

@include('layouts.error')

@endif