<?php 
	session_start();

	if( !isset( $_SESSION[ 'klient' ] ) )
	{
		header( 'Location: http://localhost:1234/palestra/index.php' );
		exit();
	}
?>

<?php require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php'; ?>

<?php 
	
	$id = $_SESSION[ 'klient' ];

	$sql0 = "SELECT fjalekalim FROM perdorues WHERE perdorues_id = $id";
	$result0 = $db->query( $sql0 );
	$foo = mysqli_fetch_assoc( $result0 );
	$pass = $foo[ 'fjalekalim' ];


	///Merr te dhenat nga forma e  editimit
	
	$email = siguro( $_POST[ 'email' ] );

	$tel = siguro( $_POST[ 'tel' ] );

	$pesha = siguro( $_POST[ 'pesha' ] );

	$tmp = siguro( $_POST[ 'password' ] );
	if( ! empty( $tmp ) )
	{
		$pass = md5( $tmp );
	}


	$adress = siguro( $_POST[ 'adresa' ] );

    $gj = siguro( $_POST[ 'gjatesia' ] );


    echo $email . "<br>";
    echo $tel . "<br>";
    echo $pesha . "<br>";
    echo $pass;


$sql = "UPDATE perdorues SET
			email = '$email',
			nr_telefoni = $tel,
			pesha = $pesha,
			fjalekalim = '$pass',
			adresa = '$adress',
			gjatesia = $gj
			WHERE perdorues_id = $id";

	$p = $db->query( $sql ); 

    header( 'Location: http://localhost:1234/palestra/Klient/includes/updateprofile.php?kot=kot' );

   ?>