@if (Auth::guard("administrativo")->check())

@extends('layouts.admin')

@section('title','Reportes')

@section('content')

	{!! Form::open(['URL' => 'matriculas/reportes', 'method' => 'GET', 'class' => 'navbar-form pull-left']) !!}
	
			{!! Form::label('fecha','Mes ')!!}<br>
			{!! Form::select('fecha', [
			'0' => 'Seleccionar...',
			'1' => 'Enero',
			'2' => 'Febrero',
			'3' => 'Marzo',
			'4' => 'Abril',
			'5' => 'Mayo',
			'6' => 'Junio',
			'7' => 'Julio',
			'8' => 'Agosto',
			'9' => 'Septiembre',
			'10' => 'Octubre',
			'11' => 'Noviembre',
			'12' => 'Diciembre'
			], null, ['class' => 'form-control']) !!}

	    	
		
		<button type="submit" class="btn btn-primary">Buscar</button><br><br><br>
	{!! Form::close() !!}


	

<table class="table table-responsive">
		<tr>
			<th>Fecha</th>
			<th>Rut</th>
			<th>Estado</th>
			<th>Monto</th>
			<th>Opciones</th>
			
		</tr>
			@foreach ($matriculas as $m)
				@if($m->estado == 'Matriculado')
				<tr>
					<td>{{Carbon\Carbon::parse($m->fecha)->format('d-m-Y') }}</td>
					<td>{{ $m->alumno->rut }}</td>
					<td>{{ $m->estado}}</td>
					<td>$ {{ $m->monto }}</td>
					<td><a href="{{route('matriculas.show', $m->id)}}" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a></td>

						
				</tr>
				@endif
				@include('matriculas.modal')
			@endforeach

	</table>
	

	
				<div class="panel-body">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"">
						<div class="form-group">
							{!! Form::label('', '') !!}
							
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"">
						<div class="form-group">
							{!! Form::label('Alumnos Matriculados', 'Alumnos Matriculados: ') !!}
							{!! Form::text('n1', $alumnos, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"">
						<div class="form-group">
							{!! Form::label('Total', 'Total (monto): ') !!}
							{!! Form::text('Total', $total, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
						</div>
					</div>
				</div>
		
	
	

@endsection

@else
	
@include('layouts.error')

@endif	