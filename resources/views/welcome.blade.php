@extends('layouts.app')
@section('titulo','Bienvenido')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">            
            <div class="jumbotron" style="min-height: 300px">
                <h2>Bienvenido al sistema de gestión de furgones</h2>                
                <div class="col-md-6">
                    <h3>Este sistema permitirá a los choferes:</h3>
                    <h3>Registrar sus furgones y colegios</h3>
                </div>
                <div class="col-md-6">
                    <h3>Este sistema permitirá a los apoderados:</h3>
                    <h3>Registrar sus alumnos</h3>
                </div>
            </div>            
        </div>
    </div>
</div>



@endsection
