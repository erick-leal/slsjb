@extends('layouts.admin')

@section('title','Asignaturas')

@section('content')

        <strong>Alumno : </strong><a>{{$alumno->nombre." ".$alumno->apellido_paterno." ".$alumno->apellido_materno}}</a><br>
        <strong>Rut : </strong><a>{{$alumno->rut}}</a><br>
        @if($alumno->curso == null)
            <strong>Curso : </strong><br><br>
        @else
            <strong>Curso : </strong><a>{{$alumno->curso->nombre." / ".$alumno->curso->tipo}}</a><br><br>
        @endif  
                            
            <table class="table table-bordered">               
                <tr>
                	<th>Código : </th>
                	<th>Asignatura : </th>
                	<th>Profesor : </th>
                    <th>Sala : </th>
                    <th>Horario : </th>
                    <th>Eventos</th>
                </tr>
                @foreach($mis_asignaturas as $asignatura)
                <tr>
                    <td>{{$asignatura->codigo}}</td>
                    <td>{{$asignatura->nombre}}</td>
                    <td>{{$asignatura->profesor->nombre." ".$asignatura->profesor->apellido_paterno}}</td>
                    <td>{{$asignatura->sala->nombre}}</td>
                    <td>{{$asignatura->horario}}</td>
                    <td><a href="{{URL('showeventosasignatura', $asignatura->id)}}" class="btn btn-success" ><span class="fa fa-calendar" aria-hidden="true"></span>  Calendario</a></td>
                </tr>
                @endforeach
            </table>

@endsection