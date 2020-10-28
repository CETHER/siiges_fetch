<?php
  /**
  * Archivo que gestiona los web services de la clase Usuario
  *
  */

  require_once "../models/modelo-usuario.php";
  require_once "../models/modelo-persona.php";
  require_once "../models/modelo-rol.php";
  require_once "../utilities/utileria-general.php";

  define('PERSONA_DEFAULT',1);
  define('ROL_DEFAULT',1);
  define('DOMICILIO_DEFAULT',1);
  define('FOTO_DEFAULT','uploads/fotos/img-usuario.png');
  session_start( );
	function retornarWebService( $url, $resultado )
	{

    if( $url!="" )
		{
      //session_start( );
      $_SESSION["resultado"] = json_encode( $resultado );

			header( "Location: $url" );
			exit( );
		}
		else
		{
			echo json_encode( $resultado );
			exit( );
		}
	}

	//====================================================================================================

    if( $_POST["webService"]=="validarInicioSesion" )
    {
      $obj = new Usuario( );
      $aux = new Utileria( );
      $_POST = $aux->limpiarEntrada( $_POST );
      $obj->setAttributes( array(
      "usuario"=>$_POST["usuario"],
      "contrasena"=>$_POST["contrasena"] ) );
      $resultado = $obj->validarInicioSesion( );
      /* // Registro en bitacora
      $bitacora = new Bitacora();
      $usuarioId= isset($_SESSION["id"])?$_SESSION["id"]:-1;
      $bitacora->setAttributes(["usuario_id"=>$usuarioId,"entidad"=>"usuarios","accion"=>"validarInicioSesion","lugar"=>"control-usuario"]);
      $result = $bitacora->guardar(); */
      retornarWebService( $_POST["url"], $resultado );
    }
?>