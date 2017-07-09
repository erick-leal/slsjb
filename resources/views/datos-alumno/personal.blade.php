@if (Auth::guard("alumno")->check())   

@extends('layouts.admin')

@section('title','Informacion Personal')

@section('content')
<br><br>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
			<div class="form-group">
				<label for="foto"></label>
				@if(($alumno->foto)!="")
					<img src="{{ asset('imagenes/alumnos/'.$alumno->foto) }}" height="150px" width="150px">
				@else
					<img src="{{ asset('imagenes/alumnos/default.jpg') }}" height="150px" width="150px">
				@endif
				</div>
		</div> 

		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"">
				<div class="form-group">
					<label for="rut">Rut</label>
					<p>{{ $alumno->rut }}</p>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<p>{{ $alumno->nombre }}</p>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="apellido_paterno">Apellidos</label>
					<p>{{ $alumno->apellido_paterno." ".$alumno->apellido_materno }}</p>
				</div>
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="email">Correo</label>
					<p>{{ $alumno->email}}</p>
				</div>
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label>Sexo</label>
					@if ($alumno->sexo == 'Masculino')
						<p>{{ $alumno->sexo}}</p>
					@else
						<p>{{ $alumno->sexo}}</p>
					@endif			
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="telefono">Telefono</label>
					<p>{{ $alumno->telefono}}</p>
				</div>
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label>Curso</label>
					@if($curso->curso->id == null)
						<p></p>
					@else
						<p> {{ $curso->curso->nombre}}</p> 
					@endif
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label>Apoderado</label>
					@if($alumno->apoderado == null)
						<p></p>
					@else
						<p>{{$alumno->apoderado->nombre." ".$alumno->apoderado->apellido_paterno." ".$alumno->apoderado->apellido_materno}}</p>
					@endif
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="fecha_nacimiento">Fecha Nacimiento</label>
					<p>{{ $alumno->fecha_nacimiento}}</p>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="edad">Edad</label>
					<p>{{ Carbon\Carbon::parse($alumno->fecha_nacimiento)->age}}</p>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="direccion">Direccion</label>
					<p>{{ $alumno->direccion}}</p>
				</div>
			</div>		
		</div>

@endsection

@else

@include('layouts.error')

@endif  