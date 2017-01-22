<?php 
	session_start();

	if( !isset( $_SESSION[ 'id' ] ) )
	{
		header( 'Location: http://localhost/palestra/index.php' );
		exit();
	}
?>

<?php require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php'; ?>

<?php 
	///Merr id e kursit qe do te ndryshohet
	
	$id = siguro( $_GET[ 'id' ] );

	///Merr te dhenat nga forma e  editimit
	
	$emri = siguro( $_POST[ 'emri' ] );

	$numri = siguro( $_POST[ 'numri' ] );

	$data1 = $_POST[ 'dataFillimit' ];

	$data2 = $_POST[ 'dataMbarimit' ];

	$cmimi = $_POST[ 'cmimi' ];

	$cmimi = str_replace( 'leke', '', $cmimi );

	$cmimi = siguro( $cmimi );

	$sql = "UPDATE kurse SET
			lloji_kursit = '$emri',
			nr_personave = '$numri',
			data_fillimit = '$data1',
			data_mbarimit = '$data2',
			cmimi = '$cmimi'
			WHERE kurs_id = '$id'";

	$db->query( $sql );

	header( "Location: http://localhost/palestra/admin/includes/kurset.php" );


 ?>