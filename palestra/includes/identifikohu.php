<?php 
	
	require_once '../baza_te_dhenave/database_handler.php';

	$email = $_POST[ 'email' ];
	$fjalekalim = $_POST[ 'fjalekalimi' ];
	$gabime = array();

	$email = siguro( $email );
	$fjalekalim = siguro( $fjalekalim );


	$sql = "SELECT * FROM perdorues WHERE email = '$email' AND fjalekalim = '$fjalekalim'";

	$result = $db->query( $sql );

	$tmp = mysqli_fetch_assoc( $result );
	

	if( count( $tmp ) > 0  ) /// nese ky perdorues ekziston
	{	
		header("Cache-Control: private, must-revalidate, max-age=0");
      	header("Pragma: no-cache");

		session_start();

		$lloji_id = $tmp[ 'lloji_perdoruesit' ];

		$_SESSION[ 'id' ] = $tmp[ 'perdorues_id' ];

		if( $lloji_id == 1 ) /// nese perdoruesi eshte admin
		{
			header("Location: /palestra/admin/admin.php");
			exit();
		}
		else if( $lloji_id == 2 ) /// nese perdoruesi eshte instruktor
		{
 			header( 'Location: http://localhost/palestra/Instruktor/instruktor.php' );
			exit();
		}
		else /// nese perdoruesi eshte anetar
		{
			
		}

	}///FUND if
	else /// nese ky perdorues nuk ekziston
	{	
		header("Location: http://localhost/palestra/index.php?email=". $email );
		exit();
	}
?>
 