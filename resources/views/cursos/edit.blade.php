@if (Auth::guard("administrador")->check())

@extends('layouts.admin')

@section('title','Editar Curso: ' . $curso->nombre)

@section('content')

	@if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
            	{!! $message !!}
            @endforeach
        </div>
    @endif

	{!! Form::open(array('route' => ['cursos.update',$curso],'method'=>'PUT')) !!}
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
	            <div class="form-group">
	                {!! Form::label('nombre','Curso')!!}
	                {!! Form::text('nombre', $curso->nombre, array('placeholder' => 'Curso...','class' => 'form-control')) !!}
	            </div>
	      
	            <div class="form-group">
	                {!! Form::label('tipo','Tipo')!!}
	                {!! Form::select('tipo', ['' => 'Modalidad Curso...','Tecnico Profesional' => 'Tecnico Profesional', 'Humanista Cientifico' => 'Cientifico Humanista'], $curso->tipo, ['class' => 'form-control']) !!}
	            </div>

	            @if(($curso->id_profesor) == null)
	            <div class="form-group">
                    {!! Form::label('id_profesor', 'Profesor Jefe') !!}
                    {!! Form::select('id_profesor',$profesores,null,['class' => 'form-control select-profesor', 'placeholder' => 'Seleccione un profesor...']) !!}
                </div>
                @else
                <div class="form-group">
                    {!! Form::label('id_profesor', 'Profesor Jefe') !!}
                    {!! Form::select('id_profesor',$profesores,$curso->profesor->id, array('class' => 'form-control select-profesor', 'placeholder' => 'Seleccione un profesor...')) !!}
                </div>
                @endif

				<button type="submit" class="btn btn-primary">Editar</button>
				<a class="btn btn-danger" href="{{route('cursos.index')}}">Cancelar</a>       	
	        </div>
		</div>
	{!! Form::close() !!}

@endsection

@section('js')
	<script>
		$('.select-profesor').chosen({no_results_text: "Profesor no registrado", max_selected_options: 1});
	</script>
@endsection

@else

@include('layouts.error')

@endif	