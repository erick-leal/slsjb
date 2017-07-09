@if (Auth::guard('profesor')->check())

@extends('layouts.admin')

@section('title','Calificaciones Parciales')

@section('content')
		
        

          
    {!! Form::open( ['class' => 'navbar-form pull-right']) !!}
        <a href="{{ URL('pdfcalificaciones', $asignatura->id) }}" class="btn btn-danger" ><span class="fa fa-print " aria-hidden="true"> Imprimir PDF</span></a>
    {!! Form::close()!!}
                
     <strong>Asignatura :   </strong>   <a>  {{$asignatura->nombre}}</a><br>
     @if(($asignatura->id_curso)== null)
     <strong>Curso  :  </strong><br>
     @else
     <strong>Curso : </strong> <a>{{$asignatura->curso->nombre." / ".$asignatura->curso->tipo}}</a><br>
     @endif
     <strong>Periodo :    </strong> <a>{{$asignatura->periodo." - ".$asignatura->created_at->year}}</a><br>
     @if(($asignatura->horario) == null )
     <strong>Horario :    </strong> <a>Sin Horario</a><br><br>
     @else
     <strong>Horario :    </strong> <a>{{$asignatura->horario}}</a><br><br>
     @endif
    
    <form name="notas">
    {{ csrf_field() }}
    
    <table class="table table-bordered">
        <tr>
            
            <th width="120">Alumnos</th>

            @foreach ($evaluaciones as $e)
                <th width="120">{{$e->nombre}}</th>
            @endforeach
            
            <th width="80">Promedio</th>
          
        </tr>

            @foreach ($alumnos as $a)
                <tr>
                    <td>{{$a->apellido_paterno." ".$a->apellido_materno." ".$a->nombre}}</td>
                    @for($i=0, $length = count($evaluaciones); $i < $length; $i++)
                    <td>
                        <input class="nota" size="1" style="text-align:center" disabled type="text" data-id-matricula="{{ $a->id }}" data-id-evaluacion="{{ $evaluaciones[$i]->id }}" value="{{ (isset($notas[$a->id]))? (isset($notas[$a->id][$evaluaciones[$i]->id]))?$notas[$a->id][$evaluaciones[$i]->id]: 1.0 : 1.0 }}"/>
                    </td>
                    @endfor

                    <td> <input class="nota" size="1" style="text-align:center" disabled value="{{ number_format($promedios[$a->id]['promedio'],1) }}" /></td>
                    
                </tr>
            @endforeach

    </table>
   

    </form>
                            

 
@endsection

@else

@include('layouts.error')

@endif