@extends ('layouts.admin')
@section ('content')
@section('title','Conductas')
	
		<div class="box-header ">
            <h3 class="box-title"><b>Anotacion : {{ $conducta->alumno->nombre." ".$conducta->alumno->apellido_paterno." ".$conducta->alumno->apellido_materno}}</b></h3>
        </div>
        <br>


		<div class="row">

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="fecha_nacimiento">Fecha : </label>
					<p>{{ $conducta->fecha}}</p>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"">
				<div class="form-group">
					<label for="rut">Rut : </label>
					<p>{{ $conducta->alumno->rut }}</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="nombre">Nombre : </label>
					<p>{{ $conducta->alumno->nombre }}</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="apellido_paterno">Apellidos : </label>
					<p>{{ $conducta->alumno->apellido_paterno." ".$conducta->alumno->apellido_materno }}</p>
				</div>
			</div>
			
	

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label>Asignatura : </label>
						<p> {{ $conducta->asignatura->nombre}}</p>
				</div>
			</div>

			

			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="edad">Tipo : </label>
					<p>{{ $conducta->tipo}}</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="direccion">Descripcion : </label>
					{!! Form::textarea('descripcion', $conducta->descripcion ,['class' => 'form-control textarea-descripcion' ,'disabled']) !!}
				</div>
			</div>
			
			
		</div>
			
@endsection

@section('js')
<script>
	$('.textarea-descripcion').trumbowyg();
</script>

@endsection