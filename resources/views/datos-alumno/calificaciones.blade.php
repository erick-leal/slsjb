@if (Auth::guard("alumno")->check()) 

@extends('layouts.admin')

@section('title','Calificaciones Parciales') 

@section('content')

<strong>Asignatura :</strong> <a>{{$asignatura->nombre}}</a><br>
<strong>Periodo:</strong> <a>{{$asignatura->periodo}}</a><br>
<strong>Año: </strong><a>{{$asignatura->created_at->year}}</a><br><br>
                            


  <table class="table table-bordered">               
    <tr>
      
        @foreach ($evaluaciones as $e)
          <th width="10">{{$e->nombre}} <a href="" data-target="#modal-show-{{ $e->id }}"" data-toggle="modal" class="btn-xs btn-info"> <span class="fa fa-info" aria-hidden="true"></span></a></th>
          @include('datos-alumno.modal') 
        @endforeach
      <th width="100">Promedio </th>
    </tr>
                
    <tr>
     
        @for($i=0, $length = count($evaluaciones); $i < $length; $i++)
          <td><input class="nota" disabled type="text" data-id-matricula="{{ $matricula->id }}" data-id-evaluacion="{{ $evaluaciones[$i]->id }}" value="{{ (isset($notas[$matricula->id]))? (isset($notas[$matricula->id][$evaluaciones[$i]->id]))?$notas[$matricula->id][$evaluaciones[$i]->id]: 1.0 : 1.0 }}"/></td>
        @endfor
      <td></td>
    </tr>

  </table>
                            
@endsection

@else

@include('layouts.error')

@endif  