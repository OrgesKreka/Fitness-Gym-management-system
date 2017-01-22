<?php
	
	define( 'HOST', '127.0.0.1' );
	define( 'PERDORUES', 'root' );
	define( 'FJALEKALIMI', '1995' );
	define( 'DATABAZA', 'foo' );

	@$db = mysqli_connect( HOST, PERDORUES, FJALEKALIMI, DATABAZA );
	
	if( mysqli_connect_errno() ) 
	{	
		include $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/CDN.php';

		echo "<h2 class='bg-warning text-center'>Lidhja me bazen e te dhenave deshtoi!</h2><br><h4 class='text-center bg-danger'>Per keto gabime:<p></p> " . mysqli_connect_error() ." </h4></body></html>";

		die();
	}

	define( 'BASEURL', $_SERVER[ 'DOCUMENT_ROOT' ] );
	include BASEURL. '/palestra/helpers/ndihma.php';