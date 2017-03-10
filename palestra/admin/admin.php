<?php session_start(); ?>

<?php  
	
	if( !isset( $_SESSION[ 'admin' ] ) )
	{
		header('Location: /palestra/index.php' );

		exit();
	}
?>

<?php  require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php'; ?>


<?php 

		
	    $sql = "SELECT kurs_id, data_mbarimit, lloji_kursit FROM kurse";
	    $result = $db->query( $sql );

	    $data = date( 'Y-m-d', strtotime(' +1 day') );

	    $njoftim = '';


	    while( $row = mysqli_fetch_assoc( $result ) )
	    {	
	    	if( $data > $row[ 'data_mbarimit' ] ) ///Nese ka kaluar dita tjeter
	    	{	

	    		///Fshi te dhenat  e anetareve nga ndjek kurse
	    		$sql3 = "DELETE FROM ndjek_kurse WHERE kurs_id = $k_id";
	    		$db->query( $sql3 );

	    		///Fshi te dhenat e kursit nga tabela menaxherit
	    		$sql4 = "DELETE FROM menaxhon WHERE kurs_id = $k_id";
	    		$db->query( $sql4);

	    		///Ruaj id e kursit
	    		 $njoftim = $row[ 'kurs_id' ];
	    	}
	    }


	   

	    if(  $njoftim == '' ) //shfaq faqen normalisht
	    {	
	    	 include 'includes/header.php';
	   		 include 'includes/navigation.php';
	    	 include 'includes/dashboard.php';
	    	 include 'includes/footer.php';
	    }
	    else
	    {	///Drejtohu tek anetaret_pa_paguar
	    	$_SESSION[ 'kurs_i_mbaruar' ] = $njoftim;
	    	header("Location: includes/anetaret_pa_paguar.php" );
	    }


	    
 ?>


