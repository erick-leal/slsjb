@extends('layouts.admin')
@section('title','Noticias')

@section('content')
    
    @if (Auth::guard('profesor')->check()|| Auth::guard("apoderado")->check() || Auth::guard("administrativo")->check() || Auth::guard("alumno")->check())

    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="row"><br><br>

            @foreach($noticias as $noticia)

                <div class="col-md-8 ">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="text-center">{{$noticia->nombre}}</h3>
                            <hr>
                            <a href="#" class="thumbail">
                            @if(($noticia->foto)!="")
                                <center><img class="img-responsive img-noticia" src="{{ asset('imagenes/noticias/'.$noticia->foto) }}" height="200px" width="200px"></center>
                            @endif
                            </a> 
                            <br><br>
                            <div class = "caption">
                                {{$noticia->descripcion}}
                            </div>
                            <br><br>
                            <i class="fa fa-user"></i>  <a>{{$noticia->administrativo->cargo->nombre}}</a>
                                <div class="pull-right">
                                    <i class="fa fa-clock-o"></i> {{Carbon\Carbon::parse($noticia->created_at)->format('d-m-Y') }} 
                                </div>
                        </div>
                    </div>
                </div>

            @endforeach

            </div>
            {{$noticias->render()}}
        </div>
    </div>
    
    @elseif(Auth::guard("administrador")->check())

        <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$cantidadAlumnos}}</h3>

              <p>Alumnos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('alumnos.index')}}" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$cantidadApoderados}}</h3>

              <p>Apoderados</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('apoderados.index')}}" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$cantidadAdministrativos}}</h3>

              <p>Administrativos</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('administrativos.index')}}" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$cantidadProfesores}}</h3>

              <p>Profesores</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('profesores.index')}}" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div><br><br>
      <!-- /.row -->
       <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="row">

               @foreach($noticias as $noticia)

                <div class="col-md-8 ">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="text-center">{{$noticia->nombre}}</h3>
                            <hr>
                            <a href="#" class="thumbail">
                            @if(($noticia->foto)!="")
                                <center><img class="img-responsive img-noticia" src="{{ asset('imagenes/noticias/'.$noticia->foto) }}" height="200px" width="200px"></center>
                            @endif
                            </a> 
                            <br><br>
                            <div class = "caption">
                                {{$noticia->descripcion}}
                            </div>
                            <br><br>
                            <i class="fa fa-user"></i>  <a>{{$noticia->administrativo->nombre." ".$noticia->administrativo->apellido_paterno}}</a>
                                <div class="pull-right">
                                    <i class="fa fa-clock-o"></i> {{$noticia->fecha}} 
                                </div>
                        </div>
                    </div>
                </div>

            @endforeach

            </div>
            {{$noticias->render()}}
        </div>
    </div>
      
    @endif

               

@endsection
 

