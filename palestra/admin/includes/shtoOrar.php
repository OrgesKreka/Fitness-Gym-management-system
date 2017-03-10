<?php 
	session_start();

	if( !isset( $_SESSION[ 'admin' ] ) )
	{
		header( 'Location: http://localhost:1234/palestra/index.php' );
		exit();
	}
?>

<?php require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php'; ?>

<?php 
	
	$kurs_id = $_SESSION[ 'kurs_id' ];
	
	$dita_id = $_POST[ 'dita_id' ];
	$programi = $_POST[ 'programi' ];
	$ora_fillimit = $_POST[ 'ora_fillimit' ].":00:00";
	$ora_perfundimit = $_POST[ 'ora_mbarimit' ].":00:00";

	$date1 = date_create( $ora_fillimit );
	$ora_fillimit =  date_format( $date1,"H:i:s" );

	$date2 = date_create( $ora_perfundimit );
	$ora_perfundimit =  date_format( $date2 ,"H:i:s" );

	
	///Shton te dhenat ne tabelen oraret
	$sql1 = "INSERT INTO oraret ( kurs_id, dita_id, ora_fillimit, ora_perfundimit ) VALUES
			 ( $kurs_id, $dita_id, '$ora_fillimit', '$ora_perfundimit' )";

	$db->query( $sql1 );


	///Shton te dhenat ne tabelen programet
	$sql2 = "INSERT INTO programet( kurs_id, programi ) VALUES 
			 ( $kurs_id, '$programi' )";

	$db->query( $sql2 );
 ?>