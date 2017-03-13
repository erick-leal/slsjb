@extends ('layouts.admin')
@section ('content')
@section('title','Evento')
	
		<div class="box-header ">
            <h3 class="box-title"><b>{{ $evento->nombre}}</b></h3>
        </div>
        <br>


		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="fecha_nacimiento">Fecha : </label>
					<p>{{ Carbon\Carbon::parse($evento->fecha)->format('d-m-Y')}}</p>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label>Asignatura : </label>
						<p> {{ $evento->asignatura->nombre}}</p>
				</div>
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="direccion">Descripcion : </label>
					{!! Form::textarea('descripcion', $evento->descripcion ,['class' => 'form-control textarea-descripcion' ,'disabled']) !!}
				</div>
			</div>	
		</div>
			<a class="btn btn-info" href="{{route('eventos.index')}}">Volver</a>
@endsection

@section('js')
<script>
	$('.textarea-descripcion').trumbowyg();
</script>

@endsection