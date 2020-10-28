<?php 
  require_once "../models/base-general.php";

  class Utileria extends General
  {
    //Constructor
    public function __construct()
    {
      parent::__construct();
    }

    // M�todo para validar sesi�n
		public static function validarSesion( $file )
		{
			session_start( ['cookie_lifetime' => 86400,]);

			if( !isset( $_SESSION["id"] ) || $_SESSION["id"]==null || $_SESSION["id"]=="" )
			{
				header( "Location: ../index.php?error=1" );
				exit( );
			}

			// Programar validaci�n de $file...
    }
    
    // M�todo para limpiar texto nocivo
		function limpiarTexto( $entrada )
		{
			$buscar = array(
				'@<script[^>]*?>.*?</script>@si', // Elimina javascript
				'@<[\/\!]*?[^<>]*?>@si',          // Elimina las etiquetas HTML
				'@<style[^>]*?>.*?</style>@siU',  // Elimina las etiquetas de estilo
				'@<![\s\S]*?--[ \t\n\r]*>@'       // Elimina los comentarios multi-l�nea revisar para la app m�vil
			);

      $salida = preg_replace( $buscar, '', $entrada );
      return $salida;
    }

    // M�todo para limpiar entrada (input)
		function limpiarEntrada( $entrada )
		{
      if( is_array( $entrada ) )
			{
        foreach( $entrada as $var=>$val )
				{
          $salida[$var] = $this->limpiarEntrada( $val );
        }
      }
      else
			{
        if( get_magic_quotes_gpc( ) )
				{
          $entrada = stripslashes( $entrada );
        }
        $entrada  = $this->limpiarTexto( $entrada );
        $salida = mysqli_real_escape_string( $this->mysqli, $entrada );
      }
      return $salida;
		}

    
  }
  

?>