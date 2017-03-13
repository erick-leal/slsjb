@extends('layouts.admin')

@section('title','Registro de Anotaciones') 

@section('content')


           <strong>Alumno : </strong> <a>{{$alumno->nombre." ".$alumno->apellido_paterno." ".$alumno->apellido_materno}}</a><br>
           <strong>Rut: </strong><a>{{$alumno->rut}}</a><br><br>
                            <table class="table table-bordered">
                           
                                <tr>
                                	<th>Fecha : </th>
                                    <th>Periodo : </th>
                                	<th>Asignatura : </th>
                                	<th>Profesor : </th>
                                    <th>Tipo : </th>
                                    <th>Descripcion : </th>
                                    
                                </tr>
                                @foreach($mis_anotaciones as $anotacion)
                                <tr>
                                    <td>{{$anotacion->created_at}}</td>
                                    <td>{{$anotacion->asignatura->periodo." - ".$anotacion->created_at->year}}</td>
                                    <td>{{$anotacion->asignatura->nombre}}</td>
                                    <td>{{$anotacion->profesor->nombre." ".$anotacion->profesor->apellido_paterno}}</td>
                                    <td>{{$anotacion->tipo}}</td>
                                    <td>{{$anotacion->descripcion}}</td>
                                </tr>
                                @endforeach
                            </table>
                            

@endsection