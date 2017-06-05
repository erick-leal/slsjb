@extends ('layouts.admin')
@section ('content')
@section('title','Apoderado')
	
		<div class="box-header ">
            <h3 class="box-title"><b>Informacion de Apoderado : </b></h3>
        </div>
        <br>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="foto"></label>
					
					@if(($apoderado->foto)!="")
						<img src="{{ asset('imagenes/apoderados/'.$apoderado->foto) }}" height="150px" width="150px">
					@endif
				</div>
			</div>

		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"">
				<div class="form-group">
					<label for="rut">Rut</label>
					<p>{{ $apoderado->rut }}</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<p>{{ $apoderado->nombre }}</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="apellido_paterno">Apellidos</label>
					<p>{{ $apoderado->apellido_paterno." ".$apoderado->apellido_materno }}</p>
				</div>
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="email">Correo</label>
					<p>{{ $apoderado->email}}</p>
				</div>
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label>Sexo</label>
				
				@if ($apoderado->sexo == 'Masculino')
					<p>{{ $apoderado->sexo}}</p>
				@else
					<p>{{ $apoderado->sexo}}</p>
				@endif		
				
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="telefono">Telefono</label>
					<p>{{ $apoderado->telefono}}</p>
				</div>
			</div>
			
			

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="fecha_nacimiento">Fecha Nacimiento</label>
					<p>{{ $apoderado->fecha_nacimiento}}</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="edad">Edad</label>
					<p>{{ Carbon\Carbon::parse($apoderado->fecha_nacimiento)->age}}</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="direccion">Direccion</label>
					<p>{{ $apoderado->direccion}}</p>
				</div>
			</div>

			
			
			
		</div>

			

			

			


@endsection