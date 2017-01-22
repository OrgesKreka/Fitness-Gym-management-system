<?php 
	session_start();
 ?>

<?php 
require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php'?>

<?php 
	
	$emri = siguro( $_POST[ 'emri_a' ] );
	$mbiemri = siguro( $_POST[ 'mbiemri_a' ] );
	$gjinia = $_POST[ 'gjinia_a' ];
	$ndertimi = siguro( $_POST[ 'ndertimi' ]);
	$gjatesia = siguro( $_POST[ 'gjatesia' ] );
	$pesha = siguro( $_POST[ 'pesha' ] );
	$foto = '';
	if( isset( $_FILES[ 'foto_a' ] ) )
	{
		  if ($_FILES["foto_a"]["error"] != 0)
			$foto =  $_FILES["foto_a"]["tmp_name"];
	}


	$kodi = siguro( $_POST[ 'kodi_a' ] );
	$email = siguro( $_POST[ 'email_a' ] );
	$fjalekalim = siguro( $_POST[ 'pass_a1' ] );

	if( isset( $_SESSION[ 'kod_regjistrimi' ] ) )
	{	
		$foo = $_SESSION[ 'kod_regjistrimi' ];
		
		if( $kodi != $foo )
		{
			header( 'Location: http://localhost/palestra/index.php?kodi=' .$kodi );
		}
		else
		{	///Shtimi i antarit ne db dhe drejtimi tek  faqja e tij.
			$imt = ( $pesha / ( $gjatesia * $gjatesia ) ) / 100;
			$sql = "INSERT INTO perdorues( lloji_perdoruesit, emri, mbiemri, gjinia, nr_telefoni, ndertimi_trupit, foto_profili, email, fjalekalim, pesha, gjatesia ) VALUES
				( 3, '$emri', '$mbiemri', '$gjinia', '123456789', '$ndertimi', '$foto', '$email', '$fjalekalim', '$pesha', '$gjatesia' )";

			$result = $db->query( $sql );

			///Shto header per tu drejtuar tek profili antarit----
			if( $result )
			{
				echo "Miresevjen " . $emri;

				unset( $_SESSION[ 'kod_regjistrimi' ] ); //Heq sesionin ne menyre qe ky kod te mos perdoret me.
			}
		}
	}
	else
	{
		header( 'Location: http://localhost/palestra/index.php?kodi=' .$kodi );
	}
	
 ?>