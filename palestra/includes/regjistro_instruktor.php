<?php 
	session_start();
 ?>

<?php 
	require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php'
?>

<?php 
	

	$emri = siguro( $_POST[ 'emri_i' ] );
	$mbiemri = siguro( $_POST[ 'mbiemri_i' ] );
	$gjinia = $_POST[ 'gjinia_i' ];
	$foto = '';
	if( isset( $_FILES[ 'foto_i' ] ) )
	{
		  if ($_FILES["foto_i"]["error"] != 0)
			$foto =  $_FILES["foto_i"]["tmp_name"];
	}

	$kodi = siguro( $_POST[ 'kodi_i' ] );
	$email = siguro( $_POST[ 'email_i' ] );
	$fjalekalim = md5( siguro( $_POST[ 'pass_i1' ] ) );

	if( isset( $_SESSION[ 'kod_regjistrimi_instruktori' ] ) )
	{	
		$foo = $_SESSION[ 'kod_regjistrimi_instruktori' ];
		
		if( $kodi != $foo )
		{
			header( 'Location: http://localhost:1234/palestra/index.php?kod_instruktori_pavlefshem=' .$kodi );
		}
		else
		{	///Shtimi i Instruktorit ne db dhe drejtimi tek  faqja e tij.
			$sql = "INSERT INTO perdorues( lloji_perdoruesit, emri, mbiemri, gjinia, nr_telefoni, foto_profili, email, fjalekalim ) VALUES
				( 2, '$emri', '$mbiemri', '$gjinia', '123456789', '$foto', '$email', '$fjalekalim' )";

			$result = $db->query( $sql );

			///Shto header per tu drejtuar tek Instruktorit----
			if( $result )
			{
				echo "Miresevjen " . $emri;

				unset( $_SESSION[ 'kod_regjistrimi_instruktori' ] ); //Heq sesionin ne menyre qe ky kod te mos perdoret me.
			}
		}
	}
	else
	{
		header( 'Location: http://localhost:1234/palestra/index.php?kod_instruktori_pavlefshem=' .$kodi );
	}
	
 ?>