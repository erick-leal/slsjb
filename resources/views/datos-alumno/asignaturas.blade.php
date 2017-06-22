@if (Auth::guard("alumno")->check())   

@extends('layouts.admin')

@section('title','Asignaturas')

@section('content')

        <strong>Alumno : </strong><a>{{$alumno->nombre." ".$alumno->apellido_paterno." ".$alumno->apellido_materno}}</a><br>
        <strong>Rut : </strong><a>{{$alumno->rut}}</a><br>
        
        <strong>Curso : </strong><a>{{$matricula->curso->nombre." / ".$matricula->curso->tipo}}</a><br><br>
          
                            
            <table class="table table-bordered">               
                <tr>
                	
                	<th>Asignatura : </th>
                    <th>Periodo : </th>
                	<th>Información : </th>
                    <th>Eventos: </th>
                    <th>Notas: </th>
                </tr>
                @foreach($mis_asignaturas as $asignatura)
                <tr>
                   
                    <td>{{$asignatura->nombre}}</td>
                    <td>{{$asignatura->periodo." año ".$asignatura->created_at->year}}</td>  
                    <td><a href="" data-target="#modal-show-{{ $asignatura->id }}"" data-toggle="modal" class="btn btn-info"> <span class="fa fa-eye" aria-hidden="true"></span></a></td>
                    <td><a href="{{URL('showeventosasignatura', $asignatura->id)}}" class="btn btn-success" ><span class="fa fa-calendar" aria-hidden="true"></span></a></td>
                    <td><a href="{{URL('datos-alumno/calificaciones', $asignatura->id)}}" class="btn btn-warning" ><span class="fa fa-file-text" aria-hidden="true"></span> </a></td>

                </tr>
                @include('datos-alumno.modalver')
                @endforeach
            </table>

@endsection

@else

@include('layouts.error')

@endif  