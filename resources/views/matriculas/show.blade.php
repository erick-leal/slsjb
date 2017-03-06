@extends ('layouts.admin')
@section ('content')
@section('title','Matrícula')
    
    <div class="panel panel-default">
        <div class="panel-heading"><b>Información de Alumno</b></div>
        <div class="panel-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"">
						<div class="form-group">
							<label>Rut :</label>
							<p>{{ $matricula->alumno->rut }}</p>
						</div>
					</div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"">
						<div class="form-group">
							<label>Nombre :</label>
							<p>{{ $matricula->alumno->nombre }}</p>
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"">
						<div class="form-group">
							<label>Apellidos :</label>
							<p>{{ $matricula->alumno->apellido_paterno." ".$matricula->alumno->apellido_materno }}</p>
						</div>
					</div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"">
						<div class="form-group">
							<label>Fecha Registro :</label>
							<p>{{ $matricula->created_at }}</p>
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"">
						<div class="form-group">
							<label>Estado Matrícula :</label>
							<p>{{ $matricula->estado }}</p>
						</div>
					</div>                   
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"">
						<div class="form-group">
							<label>Monto :</label>
							<p>$ {{ $matricula->monto }}</p>
						</div>
					</div>   
                </div>
            </div>
        </div>
        
    </div>
   <a class="btn btn-primary" href="{{ route('matriculas.index') }}">Volver</a>
   <a class="btn btn-danger" href="{{ URL('pdf', $matricula->id) }}"><span class="fa  fa-print" aria-hidden="true"></span> Imprimir</a>
   

@endsection