@if (Auth::guard('profesor')->check()|| Auth::guard("administrador")->check())

@extends('layouts.admin')

@section('title','Registrar Nota')

@section('content')
	
	@if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
            	{!! $message !!}
            @endforeach
        </div> 
    @endif

	{!! Form::open(array('route' => 'calificaciones.store','method'=>'POST')) !!}
		
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">

				<div class="form-group">
                    {!! Form::label('id_alumno', 'Alumno') !!}
                    {!! Form::select('id_alumno',$alumnos,null,['class' => 'form-control select-alumno', 'placeholder' => 'Seleccione una alumno']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('id_asignatura', 'Asignatura') !!}
                    {!! Form::select('id_asignatura',$asignaturas,null,['class' => 'form-control select-asignatura', 'placeholder' => 'Seleccione una asignatura']) !!}
                </div>

                </div>
                </div>
                <br><br>
                <strong>Calificaciones : </strong><br><br>
               <div class="panel panel-primary">
				<div class="panel-body">
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('n1', 'Nota') !!}
							{!! Form::text('n1', null, array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('n2', 'Nota') !!}
							{!! Form::text('n2', null, array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('n3', 'Nota') !!}
							{!! Form::text('n3', null, array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('n4', 'Nota') !!}
							{!! Form::text('n4', null, array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('n5', 'Nota') !!}
							{!! Form::text('n5', null, array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('n6', 'Nota') !!}
							{!! Form::text('n6', null, array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('n7', 'Nota') !!}
							{!! Form::text('n7', null, array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('n8', 'Nota') !!}
							{!! Form::text('n8', null, array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('promedio', 'Promedio') !!}
							{!! Form::text('promedio', null, array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('examen', 'Examen') !!}
							{!! Form::text('examen', null, array('class' => 'form-control')) !!}
						</div>
					</div>		
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"">
						<div class="form-group">
							{!! Form::label('final', 'Final') !!}
							{!! Form::text('final', null, array('class' => 'form-control')) !!}
						</div>
					</div>

					

				</div>
			</div>

			<div class="form-group">
		                {!! Form::label('observacion','Observaciones : ')!!}
		                {!! Form::textarea('observacion', null,['class' => 'form-control textarea-descripcion']) !!}
	            	</div>


				<button type="submit" class="btn btn-primary">Registrar</button>    
				<a class="btn btn-danger" href="{{route('conductas.index')}}">Cancelar</a>   	
	        
		
	{!! Form::close() !!}

@endsection

@section('js')
<script>
	$('.select-alumno').chosen({no_results_text: "Alumno no registrado", max_selected_options: 1});
	$('.select-asignatura').chosen({no_results_text: "Asignatura no registrada", max_selected_options: 1});
	$('.textarea-descripcion').trumbowyg();
</script>

@endsection

@else

@include('layouts.error')

@endif	