<!DOCTYPE html>
<html lang="es">
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Subsecretaría de Desarrollo Artesanal - Acceso</title>   
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
                <?php if ($_SESSION['permisos'] == '0'): ?>
                <a href="?Principal"><span class="navbar-brand">Desarrollo Artesanal</span></a>                    
                <?php else: ?>
                <span class="navbar-brand">Desarrollo Artesanal</span>                    
                <?php endif ?>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>               
            </div>
            <ul class="nav navbar-nav navbar-right collapse navbar-collapse">
                <?php if ($_SESSION['permisos'] == '0'): ?>                    
                <li>
                    <a href="?c=Principal&a=IndexApoyosCompras"><span class="glyphicon glyphicon-usd"></span> Apoyos y compras</a>
                </li>
                <li>
                    <a href="?c=Principal&a=IndexArtesanos"><span class="glyphicon glyphicon-user"></span> Artesanos</a>
                </li>
                <li>
                    <a href="?c=Principal&a=IndexCapacitaciones"><span class="glyphicon glyphicon-education"></span> Capacitaciones</a>
                </li>
                <li>
                    <a href="?c=Principal&a=IndexConcursosExposiciones"><span class="glyphicon glyphicon-globe"></span> Concursos y exposiciones</a>
                </li>
                <?php endif ?>
                <li class="dropdown hidden-xs">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)"><span class="glyphicon glyphicon-option-vertical"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="?c=Sesion&a=CerrarSesion"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a>
                        </li>
                    </ul>
                </li>
                <li class="hidden-sm hidden-md hidden-lg">
                    <a href="?c=Sesion&a=CerrarSesion"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>


