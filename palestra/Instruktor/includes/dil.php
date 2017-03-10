<?php  
	session_start();
	unset( $_SESSION[ 'instruktor' ] );
	header( 'Location: /palestra/index.php' );
	exit();
?>