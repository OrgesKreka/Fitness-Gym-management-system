<?php require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php'; ?>

<?php 
	
	if( isset( $_POST[ 'vlera_kerkuar' ] ) && !empty( $_POST[ 'vlera_kerkuar' ] ) )
	{	

		echo "1";

		$vlera = siguro( $_POST[ 'vlera_kerkuar' ] );

		$sql= "SELECT * FROM fjale_kerkimi WHERE fjala = '$vlera'";

		$results = $db->query( $sql );

		echo "1";

		if( mysqli_num_rows( $results ) > 0 )
		{
			$link = mysqli_fetch_assoc( $results );

			header( "Location: " . $link[ 'link' ] );
			exit();
		}
		else
		{

			header( "Location: http://localhost/palestra/index.php?ugjet=false"  );
			exit();
		}
	}
	else
	{
		header( "Location: http://localhost/palestra/index.php?ugjet=false"  );
			exit();
	}
 ?>