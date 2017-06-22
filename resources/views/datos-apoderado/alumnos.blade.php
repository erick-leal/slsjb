@if (Auth::guard('apoderado')->check())

@extends('layouts.admin')

@section('title','Mis Alumnos') 

@section('content')
    
	
				<br>
                <table class="table table-bordered">
                    <tr>
                        <th>N°</th>
                        <th>Nombres: </th>
                        <th>Apellidos: </th>
                        <th>Correo: </th>
                        <th>Curso : </th>
                       
                    </tr>
                        @foreach($alumnos as $a)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$a->nombre}}</td>
                        <td>{{$a->apellido_paterno." ".$a->apellido_materno}}</td>
                        <td>{{$a->email}}</td>
                        <td>{{$a->curso." - ".$a->tipo}}</td>

                        <td><a href="{{URL('datos-apoderado/veranotacion',$a->id)}}" class="btn btn-warning" ><span class="fa  fa-clone" aria-hidden="true"> </span> Anotaciones</a></td>

                        <td><a href="{{URL('datos-apoderado/asignaturas',array($a->id,$a->id_alumno))}}" class="btn btn-info" ><span class="fa fa-book" aria-hidden="true"> </span> Asignaturas</a></td>
                    </tr>
                        @endforeach
                </table>
           

@endsection

@else

@include('layouts.error')

@endif