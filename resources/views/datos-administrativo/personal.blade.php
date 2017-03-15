@extends('layouts.admin')

@section('title','Informacion Personal')

@section('content')
<br><br>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
			<div class="form-group">
				<label for="foto"></label>
				@if(($administrativo->foto)!="")
					<img src="{{ asset('imagenes/administrativos/'.$administrativo->foto) }}" height="150px" width="150px">
				@else
					<img src="{{ asset('imagenes/administrativos/default.jpg') }}" height="150px" width="150px">
				@endif
				</div>
		</div> 

		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"">
				<div class="form-group">
					<label for="rut">Rut</label>
					<p>{{ $administrativo->rut }}</p>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<p>{{ $administrativo->nombre }}</p>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="apellido_paterno">Apellidos</label>
					<p>{{ $administrativo->apellido_paterno." ".$administrativo->apellido_materno }}</p>
				</div>
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="email">Correo</label>
					<p>{{ $administrativo->email}}</p>
				</div>
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label>Sexo</label>
					@if ($administrativo->sexo == 'Masculino')
						<p>{{ $administrativo->sexo}}</p>
					@else
						<p>{{ $administrativo->sexo}}</p>
					@endif			
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="telefono">Telefono</label>
					<p>{{ $administrativo->telefono}}</p>
				</div>
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label>Cargo</label>
					@if($administrativo->cargo == null)
						<p></p>
					@else
						<p> {{ $administrativo->cargo->nombre}}</p>
					@endif
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="fecha_nacimiento">Fecha Nacimiento</label>
					<p>{{ $administrativo->fecha_nacimiento}}</p>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="edad">Edad</label>
					<p>{{ $administrativo->edad}}</p>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="direccion">Direccion</label>
					<p>{{ $administrativo->direccion}}</p>
				</div>
			</div>		
		</div>

@endsection