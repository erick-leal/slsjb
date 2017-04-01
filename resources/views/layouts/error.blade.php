@section('title','Acceso Restringido')

@section('content')

<div class="panel-body">
	<img class="img-responsive center-block" src="{{asset('imagenes/error.png')}}">
	<hr>
	<strong class="text-center">
		<p class="text-center">Usted no tiene acceso a esta zona</p>
		<p>
			<a href="{{url('/')}}">¿Deseas volver al inicio?</a>
		</p>
	</strong>
</div>

@endsection