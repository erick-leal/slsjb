@extends('layouts.app')
@section('titulo','Registro Profesor')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de profesor</div>
                @if($errors->has())
                    <div class='alert alert-danger'>
                        @foreach ($errors->all('<p>:message</p>') as $message)
                            {!! $message !!}
                        @endforeach
                    </div>
                @endif
                <div class="panel-body">

                    {!! Form::open(['url'=>'/profesores/register']) !!}
                    <div class="form-group">
                        {!! Form::label('rut','RUT',['class'=>'control-label']) !!}
                        {!! Form::text('rut',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('nombre','Nombre',['class'=>'control-label']) !!}
                        {!! Form::text('nombre',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('apellido_paterno','Apellido Paterno',['class'=>'control-label']) !!}
                        {!! Form::text('apellido_paterno',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('apellido_materno','Apellido Materno',['class'=>'control-label']) !!}
                        {!! Form::text('apellido_materno',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email','Correo electronico',['class'=>'control-label']) !!}
                        {!! Form::text('email',null,['class'=>'form-control']) !!}
                    </div>

                    
                    <div class="form-group">
                        {!! Form::label('password','Contraseña',['class'=>'control-label']) !!}
                        {!! Form::password('password',['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password','Confirme Contraseña',['class'=>'control-label']) !!}
                        {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Registrarme',['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!--<script>
    $('#rut').Rut();
</script>-->
@endsection
