<?php  
	session_start();
	unset( $_SESSION[ 'klient' ] );
	header( 'Location: /palestra/index.php' );
	exit();
?>