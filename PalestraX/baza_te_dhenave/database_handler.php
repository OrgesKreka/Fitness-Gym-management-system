<?php
	

	@$db = mysqli_connect( '127.0.0.1', 'root', '1995', 'palestrax' );
	
	if( mysqli_connect_errno() ) 
	{	
		include 'CDN.php';

		echo "<h2 class='bg-warning text-center'>Lidhja me bazen e te dhenave deshtoi!</h2><br><h4 class='text-center bg-danger'>Per keto gabime:<p></p> " . mysqli_connect_error() ." </h4></body></html>";

		die();
	}