@if (Auth::guard('profesor')->check())

@extends('layouts.admin')

@section('title','Informacion Personal')

@section('content')
<br><br>


<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="foto"></label>
					@if(($profesor->foto)!="")
						<img src="{{ asset('imagenes/profesores/'.$profesor->foto) }}" height="150px" width="150px">
					@else
						<img src="{{ asset('imagenes/profesores/default.jpg') }}" height="150px" width="150px">
					@endif
				</div>
			</div>

		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"">
				<div class="form-group">
					<label for="rut">Rut</label>
					<p>{{ $profesor->rut }}</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<p>{{ $profesor->nombre }}</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="apellido_paterno">Apellidos</label>
					<p>{{ $profesor->apellido_paterno." ".$profesor->apellido_materno }}</p>
				</div>
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="email">Correo</label>
					<p>{{ $profesor->email}}</p>
				</div>
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label>Sexo</label>
				
				@if ($profesor->sexo == 'Masculino')
					<p>{{ $profesor->sexo}}</p>
				@else
					<p>{{ $profesor->sexo}}</p>
				@endif		
				
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="telefono">Telefono</label>
					<p>{{ $profesor->telefono}}</p>
				</div>
			</div>
			

			
			

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="fecha_nacimiento">Fecha Nacimiento</label>
					<p>{{ $profesor->fecha_nacimiento}}</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="edad">Edad</label>
					<p>{{ Carbon\Carbon::parse($profesor->fecha_nacimiento)->age}}</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="direccion">Direccion</label>
					<p>{{ $profesor->direccion}}</p>
				</div>
			</div>
			
			
		</div>

@endsection

@else

@include('layouts.error')

@endif