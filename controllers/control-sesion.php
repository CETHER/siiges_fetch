<?php
	session_start( );

	if( isset( $_SESSION["id"] ) )
	{
		header( "Location: views/home.php" );
		exit( );
	}

	$resultado = "";
	if( isset( $_SESSION["resultado"] ) && $_SESSION["resultado"] )
	{
		$resultado = json_decode( $_SESSION["resultado"] );
		unset( $_SESSION["resultado"] );
	}
?>