@if (Auth::guard("administrador")->check() || Auth::guard("administrativo")->check())	

@extends ('layouts.admin')
@section ('content')
@section('title','Asignatura')
    
    <div class="panel panel-default">
        <div class="panel-heading"><b>Información de Asignatura</b></div>
        <div class="panel-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"">
						<div class="form-group">
							<label>Codigo :</label>
							<p>{{ $asignatura->codigo }}</p>
						</div>
					</div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"">
						<div class="form-group">
							<label>Nombre :</label>
							<p>{{ $asignatura->nombre }}</p>
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"">
						<div class="form-group">
							<label>Curso :</label>
							<p>{{ $asignatura->curso->nombre }}</p>
						</div>
					</div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"">
						<div class="form-group">
							<label>Profesor :</label>
							<p>{{ $asignatura->profesor->nombre." ".$asignatura->profesor->apellido_paterno." ".$asignatura->profesor->apellido_materno }}</p>
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"">
						<div class="form-group">
							<label>Sala :</label>
							<p>{{ $asignatura->sala->nombre }}</p>
						</div>
					</div>                   
                    
                </div>
            </div>
        </div>
        
    </div>
  
   

@endsection

@else

@include('layouts.error')

@endif