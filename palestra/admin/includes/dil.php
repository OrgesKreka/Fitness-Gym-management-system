<?php  
	session_start();
	unset( $_SESSION[ 'admin' ] );
	header( 'Location: /palestra/index.php' );
	exit();
?>