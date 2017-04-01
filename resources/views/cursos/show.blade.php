@if (Auth::guard("administrador")->check()  || Auth::guard("administrativo")->check())

@extends ('layouts.admin')
@section ('content')
@section('title','Curso')
    
    <div class="panel panel-default">
        <div class="panel-heading"><b>Información del Curso</b></div>
        <div class="panel-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"">
						<div class="form-group">
							<label>Curso :</label>
							<p>{{ $curso->nombre }}</p>
						</div>
					</div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"">
						<div class="form-group">
							<label>Tipo :</label>
							<p>{{ $curso->tipo }}</p>
						</div>
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