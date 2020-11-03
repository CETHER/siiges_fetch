<?php
  session_start();
  $resultado = "";
  if (isset($_SESSION["resultado"])) {
    $resultado = json_decode($_SESSION["resultado"]);

    if ($resultado->status == "200") {
      $_SESSION["resultado"] = json_encode($resultado);
      header("Location: index.php");
      exit();
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" contet="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIIGES</title>

  <!-- CSS GOB.MX -->
	<link href="favicon.ico" rel="shortcut icon">
	<link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
	<!-- CSS SIIGES -->
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body class="fondo-imagen">
  <!-- HEADER Y BARRA DE NAVEGACION -->
  <?php require_once "menu.php"; ?>

  <!-- RECUADRO DE REGISTRO -->
  <div class="container">
		<section class="main row margins-section-login tamano-pantalla">
			<div class="col-md-4 col-md-offset-4">

				<!-- HEADER DEL RECUADRO DE REGISTRO -->
				<div class="header-login">
					<h6>Registrate</h6>
					<p class="small">Es necesario registrarte para<br>poder realizar tus tramites</p>
				</div>


				<!-- CUERPO DEL RECUADRO DE REGISTRO -->
				<div class="body-login">
          <?php if($resultado && isset($resultado->status) && $resultado->status != "200"): ?>
            <div class="alert alert-danger">
              <p><?= $resultado->message ?> </p>
            </div>
          <?php endif; ?>
          <div class="alert alert-danger" id="registro-mensaje" hidden></div>
					<form class="" id="registro-formulario"  method="post" action="controllers/control-usuario.php">
						<input type="hidden"  name="webService" value="registro">
						<input type="hidden"  name="url" value="../registro.php">
						<div class="input-group">
							<span class="input-group-addon btn-sm"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" id="registro-usuario" name="usuario" class="form-control input-sm" placeholder="Nombre de usuario" required>
						</div>
						<p></p>
						<div class="input-group">
							<span class="input-group-addon btn-sm"><i class="glyphicon glyphicon-envelope"></i></span>
							<input type="text" id="registro-correo" name="correo" class="form-control input-sm" placeholder="Correo electrónico" required>
						</div>
						<p></p>
						<div class="input-group">
							<span class="input-group-addon btn-sm"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password" id="registro-contrasena" name="contrasena" class="form-control input-sm" placeholder="Contraseña de acceso" required>
              <span id="mostrar-registro-contrasena" class="input-group-addon btn-sm"><i class="glyphicon glyphicon-eye-open"></i></span>
						</div>
						<p class="text-muted small">Mínimo 5 caracteres y máximo 20</p>
            <div class="input-group">
              <span class="input-group-addon btn-sm"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" id="registro-confirmacion-contrasena" name="confirmacionContrasena" class="form-control input-sm" placeholder="Repite la contraseña anterior" required>
              <span id="mostrar-registro-confirmacion-contrasena" class="input-group-addon btn-sm"><i class="glyphicon glyphicon-eye-open"></i></span>
            </div>
						<br>

						<!-- TERMINOS Y CONDICIONES -->
						<div class="form-group row">
							<div class="col-sm-12">
								<div class="form-check small">
									<input class="form-check-input" type="checkbox" id="registro-chkTerminos"> Al registrarme acepto los <a href="#" data-toggle="modal" data-target="#registro-modalCondiciones">Términos y condiciones de uso</a>
								</div>
							</div>
						</div>

						<!-- BOTON DE REGISTRO -->
						<div class="form-group row">
							<div class="col-sm-12">
								<button id="registro-btnRegistrarse" type="submit" class="btn btn-primary btn-sm btn-block">Registrarme</button>
							</div>
						</div>

					</form>
        </div>
			</div>
		</section>
	</div>

  <!-- JS DE GOB.MX -->
	<script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
	<!-- JS JQUERY -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/registro.js"></script>

	<!-- SECCION DE SCRIPTS -->
</body>
</html>