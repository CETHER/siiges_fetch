<?php require_once "controllers/control-sesion.php"; ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIIGES</title>
  <!-- CSS GOB.MX -->
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="https://framework-gb.cdn.gob.mx/assets/styles/main.css">
  <!-- CSS SIIGES -->
  <link rel="stylesheet" href="css/estilos.css" type="text/css">
</head>
<body class="fondo-imagen">
  <!-- HEADER Y BARRA DE NAVEGACION -->
  <?php require_once "menu.php"; ?>

  <!-- REACUADRO DE LOGIN -->
  <div class="container">
    <section class="main row margins-section-login tamano-pantalla">
      <div class="col-md-4 col-md-offset-4">
        <!-- HEADER DEL RECUADRO DE LOGIN -->
        <div class="header-login">
          <h6>Iniciar Sesión</h6>
          <p class="small">Ingresa tus credenciales para <br>acceder al portal web</p>
        </div>

        <!-- CUERPO DEL RECUADRO DE LOGIN -->
        <div class="body-login">
          <form id="login" name="form1" method="post">
            <input type="hidden" name="webService" value="validarInicioSesion" />
            <input type="hidden" name="url" value="../views/home.php" />

            <div class="input-group">
              <span class="input-group-addon btn-sm"><i class="glyphicon glyphicon-user"></i></span>
              <input type="text" class="form-control input-sm" id="usuario" name="usuario" placeholder="Nombre de Usuario" required>
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon btn-sm"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" class="form-control input-sm" id="contrasena" name="contrasena" placeholder="Contraseña de acceso" required>
            </div>
            <p></p>
            <div class="form-group row">
              <div class="col-sm-12 text-center">
                <a href="#" class="small" data-toggle="modal" data-target="#modal-Recuperar-Contrasena">¿Olvidaste tu contraseña?</a>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 text-center">
                <input type="submit" class="btn btn-primary btn-block btn-sm" name="submit" value="Ingresar" />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 text-center">
                <p class="small">¿No tienes una cuenta? <a href="registro.php">Regístrate</a></p>
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
  <!-- SCRIPTS PROPIOS -->
  <script src="js/login.js"></script>
</body>
</html>