<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Cupon Matrícula </title>
</head>
 
<body>
 
<h1>Cupon Matricula N° {{$matricula->id}}</h1>
<table class="table table-bordered">

  <tr>
    <th>Rut : </th>
    <td>{{$matricula->alumno->rut}}</td>  
  </tr>

  <tr>
    <th>Nombre : </th>
    <td>{{$matricula->alumno->nombre." ".$matricula->alumno->apellido_paterno." ".$matricula->alumno->apellido_materno}}</td>
  </tr>
 
  <tr>
    <th>Fecha Registro : </th>
    <td>{{$matricula->created_at}}</td>
  </tr>
 
  <tr>
    <th>Estado de Matricula : </th>
    <td>{{$matricula->estado}}</td>
  </tr>

  <tr>
    <th scope="row">Monto: </th>
    <td>$ <strong>{{$matricula->monto}}</strong></td>
  </tr>
</table>
 
</body>
 
</html>