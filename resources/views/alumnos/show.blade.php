@extends ('layouts.admin')
@section ('content')
@section('title','Alumno')
	
		<div class="box-header ">
            <h3 class="box-title"><b>Informacion de Alumno : </b></h3>
        </div>
        <br>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label for="foto"></label>
					
					@if(($alumno->foto)!="")
						<img src="{{ asset('imagenes/alumnos/'.$alumno->foto) }}" height="150px" width="150px">
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
			
			@if($alumno->id_curso == null)
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label>Curso</label>
						<p></p>
				</div>
			</div>
			@else
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label>Curso</label>
						<p>{{$alumno->curso->nombre}}</p>
				</div>
			</div>
			@endif

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

			@if($alumno->id_apoderado == null)
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					<label>Apoderado</label>
						<p></p>
				</div>
			</div>
			@else
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">
				<div class="form-group">
					
					<a href="#" data-id="1" data-toggle="modal" data-target="#myModal" class="btn btn-success ">Apoderado</a> 
					<!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <label>Apoderado: </label>
										<p>{{$alumno->apoderado->nombre." ".$alumno->apoderado->apellido_paterno." ".$alumno->apoderado->apellido_materno}}</p>
										<p><span class="fa fa-phone" aria-hidden="true"></span> {{$alumno->apoderado->telefono}}</p>
										<p><span class="fa fa-home" aria-hidden="true"></span> {{$alumno->apoderado->direccion}}</p>
                                </div>

                            <div class="modal-footer">
                            	<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>

                           </div><!-- modal content -->
                        </div><!-- modal dialog -->
                    </div><!-- modal fade -->
             		<!-- Cierra Modal -->

				</div>
			</div>
			@endif
			
			
		</div>

			

			

			


@endsection