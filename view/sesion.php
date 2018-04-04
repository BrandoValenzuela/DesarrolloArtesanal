<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Subsecretaría de Desarrollo Artesanal</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script> -->
    <script src="assets/js/jquery.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row"  id="renglon-formulario">
			<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-4 formulario">
				<img class="img img-responsive" src="assets/images/Logo.png" class="img-rounded" width="460" height="345">
				<h3 class="text-center">Iniciar sesión</h3>
				<hr>
				<form id="login-form" action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id"/>
					<div class="form-group">
						<label>Usuario:</label>
						<input type="text" name="usuario" id="usuario" tabindex="1" class="form-control" placeholder="Usuario" value="" data-validacion-tipo="requerido">
					</div>
					<div class="form-group">
						<label>Contraseña:</label>
						<input type="password" name="contraseña" id="contraseña" tabindex="2" class="form-control" placeholder="Contraseña" data-validacion-tipo="requerido">
					</div>
					<br>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6 col-sm-offset-3">
								<input type="submit" name="login-submit" id="login-submit" class="form-control btn btn-success" value="Iniciar sesión">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/js/ini.js"></script>
    <script src="assets/js/sha256.min.js"></script>
    <script src="assets/js/jquery.anexsoft-validator.js"></script>
    <script src="assets/js/funciones-apoyo.js"></script>
</body>
</html>