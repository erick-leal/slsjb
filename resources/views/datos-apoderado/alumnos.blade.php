@extends('layouts.admin')

@section('title','Alumnos')

@section('content')

<strong>Alumnos:</strong><br><br>
	
				
                <table class="table table-bordered">
                    <tr>
                        <th>Nombre: </th>
                        <th>Apellidos: </th>
                        <th>Correo: </th>
                        <th>Curso : </th>
                        <th>Anotaciones :</th>
                        <th>Calificaciones :</th>
                    </tr>
                        @foreach($alumnos as $a)
                    <tr>
                        <td>{{$a->nombre}}</td>
                        <td>{{$a->apellido_paterno." ".$a->apellido_materno}}</td>
                        <td>{{$a->email}}</td>
                        <td>{{$a->curso->nombre}}</td>
                        <td><a href="{{URL('datos-apoderado/veranotacion',$a->id)}}" class="btn btn-warning" ><span class="fa  fa-clone" aria-hidden="true"> </span></a></td>

                        <td><a href="{{URL('datos-apoderado/vercalificacion',$a->id)}}" class="btn btn-danger" ><span class="fa fa-file-text" aria-hidden="true"> </span></a></td>
                    </tr>
                        @endforeach
                </table>
           

@endsection