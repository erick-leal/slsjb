@extends('layouts.admin')
@section('title','Inicio')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                   @if(Auth::guard('profesor')->check())
                    Hello profesor
                    @elseif(Auth::guard('apoderado')->check())
                    Hello apoderado
                    @elseif(Auth::guard('administrativo')->check())
                    Hello administrativo
                    @elseif(Auth::guard('alumno')->check())
                    Hello alumno
                    @elseif(Auth::guard('administrador')->check())
                    Hello Administrador
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 