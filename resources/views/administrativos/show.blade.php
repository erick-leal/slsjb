@extends ('layouts.admin')
@section ('content')
@section('title','Administrativo')
	
		<div class="box-header ">
            <h3 class="box-title"><b>Informacion de Administrativo : </b></h3>
        </div>
        <br>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="foto"></label>
					
					@if(($administrativo->foto)!="")
						<img src="{{ asset('imagenes/administrativos/'.$administrativo->foto) }}" height="150px" width="150px">
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
			
			@if($administrativo->id_cargo == null)
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label>Cargo</label>
						<p></p>
				</div>
			</div>
			@else
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label>Cargo</label>
						<p>{{$administrativo->cargo->nombre}}</p>
				</div>
			</div>
			@endif


			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="fecha_nacimiento">Fecha Nacimiento</label>
					<p>{{ $administrativo->fecha_nacimiento}}</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="edad">Edad</label>
					<p>{{ Carbon\Carbon::parse($administrativo->fecha_nacimiento)->age}}</p>
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