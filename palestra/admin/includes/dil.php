<?php  
	session_start();
	session_destroy();
	header( 'Location: /palestra/index.php' );
	exit();
?>