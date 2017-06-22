@if (Auth::guard("apoderado")->check())   

@extends('layouts.admin')

@section('title','Asignaturas')

@section('content')

        <strong>Alumno : </strong><a>{{$alumno->nombre." ".$alumno->apellido_paterno." ".$alumno->apellido_materno}}</a><br>
        <strong>Rut : </strong><a>{{$alumno->rut}}</a><br><br>
        
        
                      
            <table class="table table-bordered">               
                <tr>
                	
                	<th>Asignatura : </th>
                    <th>Periodo : </th>
                	
                </tr>
                @foreach($mis_asignaturas as $asignatura)
                <tr>
                   
                    <td>{{$asignatura->nombre}}</td>
                    <td>{{$asignatura->periodo." - ".$asignatura->created_at->year}}</td>  
                    <td><a href="" data-target="#modal-show-{{ $asignatura->id }}"" data-toggle="modal" class="btn btn-info"> <span class="fa fa-eye" aria-hidden="true"></span> Información</a></td>
                    <td><a href="{{URL('showeventosasignatura', $asignatura->id)}}" class="btn btn-success" ><span class="fa fa-calendar" aria-hidden="true"></span>  Eventos</a></td>
                    <td><a href="{{URL('datos-apoderado/vercalificacion', array($asignatura->id,$alumno->id))}}" class="btn btn-warning" ><span class="fa fa-file-text" aria-hidden="true"></span> Notas</a></td>

                </tr>
                @include('datos-alumno.modalver')
                @endforeach
            </table>

@endsection

@else

@include('layouts.error')

@endif  