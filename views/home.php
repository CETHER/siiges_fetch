<?php 
  //Validar los permisos del usuario de la sesión
  require_once "../utilities/utileria-general.php";
  Utileria::validarSesion( basename( __FILE__ ) );

  //=================
  $resultado = "";
  if (isset($_SESSION["resultado"])) {
    $resultado = json_encode($_SESSION["resultado"]);
    unset($_SESSION["resultado"]);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIIGES</title>
  <!-- CSS GOB.MX -->
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://framework-gb.cdn.gob.mx/assets/styles/main.css">
  <!-- CSS DATATABLE -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css" type="text/css">
  <!-- CSS PROPIO -->
  <link rel="stylesheet" href="../css/estilos.css" type="text/css">
</head>
<body>
  <!-- HEADER Y MENU -->
  <?php require_once "menu.php"; ?>

  <!-- CUERPO DE PANTALLA -->
  <div class="container">
    <section class="main row margin-section-formularios">

      <!-- BARRA DE INFORMACION -->
      <div class="row" style="padding-left: 15px; padding-right: 15px;">
        <div class="col-sm-12 col-md-12 col-lg-12">

        <!-- BARRA DE USUARIO -->
        <ol class="breadcrumb pull-right">
          <li><i class="icon icon-user"></i></li>
          <li><?php echo $_SESSION["nombre_rol"]; ?></li>
          <li class="active">SIIGES</li>
        </ol>

        </div>
      </div>
    </section>
  </div>
</body>
</html>