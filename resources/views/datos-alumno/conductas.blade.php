@if (Auth::guard("alumno")->check())   


@extends('layouts.admin')

@section('title','Registro de Anotaciones') 
 
@section('content')


           <strong>Alumno : </strong> <a>{{$alumno->nombre." ".$alumno->apellido_paterno." ".$alumno->apellido_materno}}</a><br>
           <strong>Rut: </strong><a>{{$alumno->rut}}</a><br><br>
                            <table class="table table-bordered">
                           
                                <tr>
                                	<th>Fecha : </th>
                                    <th width="370">Asignatura : </th>
                                    
                                    <th>Tipo : </th>
                                    <th>Descripcion : </th>
                                    
                                </tr>
                                @foreach($conductas as $c)
                                <tr>
                                    <td>{{Carbon\Carbon::parse($c->created_at)->format('d-m-Y')}}</td>
                                    <td>{{$c->asignatura->nombre." - ".$c->asignatura->periodo." año ".$c->asignatura->created_at->year}}</td>
                                   
                                    <td>{{$c->tipo}}</td>
                                    <td>{{$c->descripcion}}</td>
                                </tr>
                                @endforeach
                            </table>
                            

@endsection

@else

@include('layouts.error')

@endif  