@extends('layouts.admin')

@section('title','Calificaciones Parciales')

@section('content')
	
					@if($errors->has())
                        <div class='alert alert-danger'>
                            @foreach ($errors->all('<p>:message</p>') as $message)
                                {!! $message !!}
                            @endforeach
                        </div>
                   @endif
	
	
	{{ Form::open(array('url' => ['modificar/calificacion', $calificacion], 'method'=>'PUT')) }}
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">

				<div class="form-group">
                    {!! Form::hidden('id_alumno', $alumno->id) !!}
					{!! Form::text('nombre_alumno', $alumno->nombre." ".$alumno->apellido_paterno." ".$alumno->apellido_materno, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
                </div>

                <div class="form-group">
                    {!! Form::hidden('id_asignatura', $asignatura->id) !!}
					{!! Form::text('nombre', $asignatura->nombre, array('class' => 'form-control','readonly' => 'readonly')) !!}
                </div>

            </div>
        </div>
<br>
                <strong>Calificaciones : </strong><br><br>
               <div class="panel panel-primary">
				<div class="panel-body">
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('n1', 'N1') !!}
							{!! Form::text('n1', $calificacion->n1, array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('n2', 'N2') !!}
							{!! Form::text('n2', $calificacion->n2, array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('n3', 'N3') !!}
							{!! Form::text('n3', $calificacion->n3, array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('n4', 'N4') !!}
							{!! Form::text('n4', $calificacion->n4, array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('n5', 'N5') !!}
							{!! Form::text('n5', $calificacion->n5, array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('n6', 'N6') !!}
							{!! Form::text('n6', $calificacion->n6, array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('n7', 'N7') !!}
							{!! Form::text('n7', $calificacion->n7, array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('n8', 'N8') !!}
							{!! Form::text('n8', $calificacion->n8, array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('promedio', 'Promedio') !!}
							{!! Form::text('promedio', $calificacion->promedio, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('examen', 'Examen') !!}
							{!! Form::text('examen', $calificacion->examen, array('class' => 'form-control')) !!}
						</div>
					</div>		
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('final', 'Final') !!}
							{!! Form::text('final', $calificacion->final, array('class' => 'form-control', 'readonly' => 'readonly')) !!}
						</div>
					</div>

					

				</div>
			</div>

			<div class="form-group">
		                {!! Form::label('observacion','Observaciones : ')!!}
		                {!! Form::textarea('observacion', $calificacion->observacion,['class' => 'form-control textarea-descripcion']) !!}
	            	</div>

	    

				<button type="submit" class="btn btn-primary">Registrar</button>    
				<a class="btn btn-danger" href="{{URL('showalumnosasignatura', $asignatura->id)}}">Cancelar</a>   	
	        </div>
		</div>
	{{ Form::close() }}

@endsection

@section('js')
<script>
	$('.textarea-descripcion').trumbowyg();
</script>

@endsection