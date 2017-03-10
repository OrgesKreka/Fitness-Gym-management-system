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
		$emri = siguro( $_POST[ 'emri' ] );
		$numri = siguro( $_POST[ 'numri' ] );
		$data1 = siguro( $_POST[ 'dFillimi' ] );
		$data2 = siguro( $_POST[ 'dMbarimi' ] );
		$cmimi = siguro( $_POST[ 'cmimi' ] );
		$instruktori = siguro( $_POST[ 'instruktori' ] );

		///Antaret e marre nga select lista
		$antaret = $_POST[ 'antaret' ];

		



		$sql = "INSERT INTO kurse( lloji_kursit, nr_personave, data_fillimit, data_mbarimit, cmimi ) VALUES 
				( '$emri', '$numri', '$data1', '$data2', '$cmimi' )";


		$db->query( $sql ); /// shton kursin ne tabelen e kurseve


		/// merr id e kursit te fundit te shtuar ne tabele
		$sql2 = "SELECT kurs_id FROM kurse
					ORDER BY kurs_id DESC
						LIMIT 1; ";

		$pergjigja = $db->query( $sql2 );

		$kurs = mysqli_fetch_assoc( $pergjigja );
		$kurs_id = $kurs[ 'kurs_id' ];

		$_SESSION[ 'kurs_id' ] = $kurs_id;

		$sql3 = "INSERT INTO menaxhon( instruktor_id, kurs_id ) VALUES 
				 ( '$instruktori', '$kurs_id' )";

		$db->query( $sql3 );



		///Lidh cdo antar te shtuar me id e kursit te krijuar ne tabelen ndjek_kurse
		foreach ( $antaret as $option ) 
		{
			$antar = siguro( $option );

			$sql4 = "INSERT INTO ndjek_kurse( antar_id, kurs_id ) VALUES
					( '$antar', '$kurs_id' )";

			$db->query( $sql4 );

			$data = date( 'Y-m-d' );

			$sql5 = "INSERT INTO pagesat( shuma, anetar_id, kurs_id, data_pageses ) VALUES
					( $cmimi, $antar, $kurs_id, $data )";

			$db->query( $sql5 );
		}

		header( 'Location: http://localhost:1234/palestra/admin/includes/kurset.php?shtimi=true' );
 ?>