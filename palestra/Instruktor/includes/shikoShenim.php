<?php 
	session_start();

	if( !isset( $_SESSION[ 'instruktor' ] ) )
	{
		header( 'Location: http://localhost:1234/palestra/index.php' );
		exit();
	}
?>

<?php require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php'; ?>


<?php 
	///Merr id e shenimit qe do te ndryshohet
	
	$id = siguro( $_GET[ 'id' ] );

	///Merr te dhenat nga forma e  editimit
	
	$sh = siguro( $_POST[ 'FMshenimi' ] );

$sql = "SELECT permbajtja FROM shenime";

	$db->query( $sql );

	header( "Location: http://localhost:1234/palestra/admin/includes/shenime.php" );
?>