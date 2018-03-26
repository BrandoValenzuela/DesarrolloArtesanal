<!DOCTYPE html>
<html lang="es">
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Subsecretaría de Desarrollo Artesanal - Acceso</title>   
        <!-- <meta charset="utf-8" /> -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="assets/css/bootstrap.css" />
        <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
        <!-- <script src="assets/js/jquery.min.js"></script> -->
	</head>
    <body>
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <span class="navbar-brand">Desarrollo Artesanal</span>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>               
            </div>
            <ul class="nav navbar-nav navbar-right collapse navbar-collapse">
                <li>
                    <li><a href="?c=Principal"><span class="glyphicon glyphicon-home"></span> Página Principal</a></li>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="glyphicon glyphicon glyphicon-pencil"></span>
                    Registrar
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?c=Artesano&a=Crud">Artesano</a></li>
                        <li><a href="?c=Taller&a=Crud">Taller de artesano</a></li>
                        <li><a href="?c=Exposicion&a=Crud">Exposición</a></li>
                        <li><a href="?c=Concurso&a=Crud">Concurso</a></li>
                        <!-- <li><a href="#">Comodato</a></li> -->
                        <!-- <li><a href="#">Capacitación</a></li> -->
                    </ul>
                </li>
                <li>
                    <li><a href="?c=Sesion&a=CerrarSesion"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
                </li>
            </ul>
        </div>
    </div>

