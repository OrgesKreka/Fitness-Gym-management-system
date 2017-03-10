<?php require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php'; ?>

<?php 
	
	$pergjigja = array();

	$vlera = $_POST[ 'vlera' ];

	$vlera = siguro( $vlera );

	$sql = "SELECT * FROM fjale_kerkimi WHERE fjala LIKE '$vlera%'";

	$results = $db->query( $sql );


	while( $foo = mysqli_fetch_assoc( $results ) )
	{
		$pergjigja[] .= $foo[ 'fjala' ];
	}  

	if( count( $pergjigja ) == 0 )
	{	
		$pergjigja[] = '-1';
	}

	echo json_encode( $pergjigja );
 ?>