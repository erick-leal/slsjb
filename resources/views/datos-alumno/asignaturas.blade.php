@extends('layouts.admin')

@section('title','Asignaturas')

@section('content')

<div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="row">

           <strong>Alumno : {{$alumno->nombre." ".$alumno->apellido_paterno." ".$alumno->apellido_materno}}</strong><br>
           <strong>Rut : {{$alumno->rut}}</strong><br>
           <strong>Curso : {{$alumno->curso->nombre." / ".$alumno->curso->tipo}}</strong><br><br>
                            <table class="table table-bordered">
                           
                                <tr>
                                	<th>Código : </th>
                                	<th>Asignatura : </th>
                                	<th>Profesor : </th>
                                    <th>Sala : </th>
                                    <th>Horario : </th>
                                    
                                </tr>
                                @foreach($mis_asignaturas as $asignatura)
                                <tr>
                                    <td>{{$asignatura->codigo}}</td>
                                    <td>{{$asignatura->nombre}}</td>
                                    <td>{{$asignatura->profesor->nombre." ".$asignatura->profesor->apellido_paterno}}</td>
                                    <td>{{$asignatura->sala->nombre}}</td>
                                    <td>{{$asignatura->horario}}</td>
                                </tr>
                                @endforeach
                            </table>

            </div>
           
        </div>
    </div>

@endsection