@if (Auth::guard("administrativo")->check() || Auth::guard("administrador")->check())	

		<strong><h2 align="center">Lista de Curso</h2></strong>
		<table class="table table-bordered" >	
			 
			 <tr>
			    <th><font size="3">Establecimiento  </font></th>
			    <td><font size="3">: 4897</font></td>  
			  </tr>

 			<tr>
			    <th>Curso  </th>
			    <td>: {{$curso->nombre." - ".$curso->tipo}}</td>  
			  </tr>
					
			<tr>
			    <th>Profesor Jefe  </th>
			    <td>: {{$curso->profesor->nombre." ".$curso->profesor->apellido_paterno." ".$curso->profesor->apellido_materno}}</td>  
			  </tr>

		</table><br><br>
			
		      	
	
	
	 
	<div class="container">
	<table width="720px" cellpadding="0.5px" cellspacing="0.5px" border="0.5px">
		<tr bgcolor="#CCCCCC">
			
			
			<th width="90px">Rut</th>
			<th width="190px">Nombre</th>
			<th width="50px" >Edad</th>
			<th width="90px">Telefóno</th>
			<th>Observaciones</th>




		</tr>

			@foreach ($alumnos as $a)
                <tr>
                	
                	<td><font size="2">{{$a->rut}}</font></td>
                	<td><font size="2">{{$a->apellido_paterno." ".$a->apellido_materno." ".$a->nombre}}</font></td>
                	<td size="1" style="text-align:center"><font size="2">{{ Carbon\Carbon::parse($a->fecha_nacimiento)->age}}</font></td>
                	<td size="1" style="text-align:center"><font size="2">{{$a->telefono}}</font></td>
                	<td><font size="2"></font></td>
                    
                    
                    
                </tr>
            @endforeach

	</table>
	</div>



@else

@include('layouts.error')

@endif	