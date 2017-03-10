<?php session_start(); ?>

<?php  
	
	if( !isset( $_SESSION[ 'klient' ] ) )
	{
		header('Location: http://localhost:1234/palestra/index.php' );

		exit();
	}
?>


<?php
    include 'includes/header.php';
    include 'includes/navigation.php';
    include 'includes/dashboard.php';
?>