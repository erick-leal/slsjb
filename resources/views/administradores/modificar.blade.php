@extends('layouts.admin')
@section('title','Editar Administrador : ' . $administrador->nombre." ".$administrador->apellido_paterno)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-0">
                <div class="panel panel-default">
                    
                    @if($errors->has())
                        <div class='alert alert-danger'>
                            @foreach ($errors->all('<p>:message</p>') as $message)
                                {!! $message !!}
                            @endforeach
                        </div>
                    @endif
                    <div class="panel-body">
                        {!! Form::open(['route' => ['administradores.update', $administrador], 'method' => 'PUT']) !!}
                         
                         <div class="form-group">
                            {!! Form::label('rut', 'Rut',['class'=>'control-label']) !!}
                            {!! Form::text('rut', $administrador->rut, ['class' => 'form-control']) !!}
                        </div>
                         
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre',['class'=>'control-label']) !!}
                            {!! Form::text('nombre', $administrador->nombre, ['class' => 'form-control']) !!}
                        </div>
                          <div class="form-group">
                            {!! Form::label('apellido_paterno','Apellido Paterno',['class'=>'control-label']) !!}
                            {!! Form::text('apellido_paterno', $administrador->apellido_paterno,['class'=>'form-control']) !!}
                        </div>
                          <div class="form-group">
                            {!! Form::label('apellido_materno','Apellido Materno',['class'=>'control-label']) !!}
                            {!! Form::text('apellido_materno', $administrador->apellido_materno,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email','Correo Electronico',['class'=>'control-label']) !!}
                            {!! Form::text('email', $administrador->email,['class'=>'form-control']) !!}
                        </div>
          
                        <div class="form-group">
                            {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
                            <a class="btn btn-danger" href="{{url('home')}}">Cancelar</a>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $("input#rut").rut();
</script>
@endsection