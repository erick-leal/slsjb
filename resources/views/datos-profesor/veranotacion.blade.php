@if (Auth::guard('profesor')->check() || Auth::guard("administrativo")->check() || Auth::guard("administrador")->check())

@extends('layouts.admin')

@section('title','Listado de Alumnos')

@section('content')
		
        @if (Auth::guard('profesor')->check())
        {!! Form::open( ['class' => 'navbar-form pull-right']) !!}
        <a class="btn btn-success" href="{{URL('agregar/anotacion', array($alumno->id, $asignatura->id ))}}"> Registrar Nueva Anotacion</a>
	    {!! Form::close()!!}
        @endif
        

           <strong>Alumno : </strong><a>{{$alumno->nombre." ".$alumno->apellido_paterno." ".$alumno->apellido_materno}}</a><br>
           <strong>Rut: </strong><a>{{$alumno->rut}}</a><br><br>
                            <table class="table table-bordered">
                           
                                <tr>
                                	<th>Fecha : </th>
                                    
                                	<th>Asignatura : </th>
                                    <th>Periodo : </th>
                                	
                                    <th>Tipo : </th>
                                    <th>Descripción : </th>
                                    
                                    
                                    
                                </tr>
                                @foreach($mis_anotaciones as $anotacion)
                                <tr>
                                    <td>{{Carbon\Carbon::parse($anotacion->fecha)->format('d-m-Y')}}</td>
                                    
                                    <td>{{$anotacion->asignatura->nombre}}</td>
                                    <td>{{$anotacion->asignatura->periodo}}</td>
                                    
                                    <td>{{$anotacion->tipo}}</td>
                                    <td>{{$anotacion->descripcion}}</td>

                                    
                                </tr>
                                @endforeach
                            </table>


@endsection

@else

@include('layouts.error')

@endif