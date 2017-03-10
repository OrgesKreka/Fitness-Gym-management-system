<?php 
	
	require_once '../baza_te_dhenave/database_handler.php';
?>

<?php

	$email = $_POST[ 'email' ];
	$fjalekalim = $_POST[ 'fjalekalimi' ];
	$gabime = array();

	$email = siguro( $email );
	$fjalekalim = md5( siguro( $fjalekalim ) );


	$sql = "SELECT * FROM perdorues WHERE email = '$email' AND fjalekalim = '$fjalekalim'";

	$result = $db->query( $sql );

	$tmp = mysqli_fetch_assoc( $result );
	

	if( count( $tmp ) > 0  ) /// nese ky perdorues ekziston
	{	
		header("Cache-Control: private, must-revalidate, max-age=0");
      	header("Pragma: no-cache");

		session_start();

		$lloji_id = $tmp[ 'lloji_perdoruesit' ];


		if( $lloji_id == 1 ) /// nese perdoruesi eshte admin
		{	

			$_SESSION[ 'admin' ] = $tmp[ 'perdorues_id' ];

			header("Location: /palestra/admin/admin.php");
			exit();
		}
		else if( $lloji_id == 2 ) /// nese perdoruesi eshte instruktor
		{	
			$_SESSION[ 'instruktor' ] = $tmp[ 'perdorues_id' ];

 			header( 'Location: http://localhost:1234/palestra/Instruktor/instruktor.php' );
			exit();
		}
		else if ( $lloji_id == 3 ) /// nese perdoruesi eshte anetar
		{
			$_SESSION[ 'klient' ] = $tmp[ 'perdorues_id' ];

 			header( 'Location: http://localhost:1234/palestra/Klient/klient.php' );
			exit();
		}

	}///FUND if
	else /// nese ky perdorues nuk ekziston
	{	
		header("Location: http://localhost:1234/palestra/index.php?email=". $email );
		exit();
	}
?>
 