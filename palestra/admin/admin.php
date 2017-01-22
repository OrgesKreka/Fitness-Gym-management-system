<?php session_start(); ?>

<?php  
	
	if( !isset( $_SESSION[ 'id' ] ) )
	{
		header('Location: /palestra/index.php' );

		exit();
	}
?>


<?php 
	    include 'includes/header.php';
	    include 'includes/navigation.php';
	    include 'includes/dashboard.php';
 ?>


