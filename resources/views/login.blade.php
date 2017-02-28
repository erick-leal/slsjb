

<html>
<head>
<div id="loadOverlay" style="background-color:#333; position:absolute; top:0px; left:0px; width:100%; height:100%; z-index:2000;"></div>
<title>San Juan Bautista | Consulta de Datos</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="estilo/default.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="icon" type="image/gif" href="images/favicon.ico" />
<style type="text/css">
h1{display: block; text-align: center; margin-top: 6%; color:#D79B11;}
ul.thumb {list-style: none;margin: 0 auto 0 auto; padding: 10px;height:300px;width: 480px;}
ul.thumb li {margin: 60px; padding: 5px;float: left;position: relative;width: 110px;height: 110px;}
ul.thumb li img {width: 100px; height: 100px;border: 1px solid #ddd;padding: 5px;background: #f0f0f0;position: absolute;left: 0; top: 0;-ms-interpolation-mode: bicubic; }
ul.thumb li img.hover {margin-top:15px;background:url() no-repeat center center;border: none;}
.title{position:absolute;width:185px;height:35px;margin:0;font-weight:bold;background:url(img/blue.png) no-repeat center center;padding:17px 0 0 0;text-align:center; color: #fff; font-size:15px;}
#loadOverlay{display: none;}
</style>

</head>

<body>
<h1>Consulta de Datos</h1>
<ul class="thumb">

<li><a href="{{url('alumnos/login')}}"><img src="img/estudiante.png" alt="ALUMNO" /></a></li>
<li><a href="{{url('profesores/login')}}"><img src="img/docente.png" alt="PROFESOR" /></a></li>
<li><a href="{{url('administrativos/login')}}"><img src="img/administrativo.png" alt="ADMINISTRATIVO" /></a></li>
<li><a href="{{url('apoderados/login')}}"><img src="img/apoderado.png" alt="APODERADO" /></a></li>

</ul>
<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/zoomer.js"></script> 
<script type="text/javascript">
jQuery(document).ready(function(){jQuery('ul.thumb li').Zoomer({speedView:500,speedRemove:400,altAnim:true,speedTitle:400,debug:false});});
</script>
</body>
</html>
