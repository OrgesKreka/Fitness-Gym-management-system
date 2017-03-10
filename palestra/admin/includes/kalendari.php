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
	
	include 'header.php';
	include 'navigation.php';



	function kalendar( $dita )
	{	
		global $db;

		$tabela = '';

		$ditet = [ 'E HENE', 'E MARTE', 'E MERKURE', 'E ENJTE', 'E PREMTE', 'E SHTUNE', 'E DIELE' ];

		$sql1 = "SELECT * FROM oraret WHERE dita_id = $dita "; 
		$results1 = $db->query( $sql1 );

		$nr_kursesh = mysqli_num_rows( $results1 );

		$tabela .= "<table width=\"100%\" id='orar' class=\"table table-striped table-bordered\" cellspacing=\"0\">";
		$tabela .= "<thead>";
			$tabela .= "<th class='text-center warning' colspan='$nr_kursesh'>". $ditet[ $dita-1 ] . "</th></thead>";

			$tabela .= '<tr>';


				$foo = array();

				while( $kurs = mysqli_fetch_assoc( $results1 ) )
				{	
					$k_id = $kurs[ 'kurs_id' ];
					$sql2 = "SELECT lloji_kursit FROM kurse WHERE kurs_id = $k_id";
					$pergjigja = $db->query( $sql2 );

					$tmp = mysqli_fetch_assoc( $pergjigja );

					$k_emri = $tmp[ 'lloji_kursit' ];

					$tabela .= "<td class='text-center'>". $k_emri . "</td>";


					$sql3 = "SELECT programi FROM programet WHERE kurs_id = $k_id";
					$results2 = $db->query( $sql3 );

					$prog = mysqli_fetch_assoc( $results2 );

					$prog_array = $prog[ 'programi' ];

					$foo[] .= $prog_array;

				}

				$tabela .= "</tr>";

				

	return $tabela;
	}
 ?>

<!-- Paneli anesor -->
 <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="http://localhost:1234/palestra/admin/admin.php" class="text-center"><i class="glyphicon glyphicon-home"></i> <span>Paneli Administratorit</span> <span class="sr-only">(current)</span></a></li>
            </ul>

            <ul class="nav nav-sidebar">
                <li><a href="http://localhost:1234/palestra/admin/includes/inbox.php"><i class="glyphicon glyphicon-envelope"></i><span>&nbsp; Inbox( 0 )</span></a></li>
            </ul>

            <ul class="nav nav-sidebar">
                <li><a href="http://localhost:1234/palestra/admin/includes/anetaret.php"><i class="glyphicon glyphicon-user"></i> <span>&nbsp; Anëtarët</span></a></li>
                <li><a href="http://localhost:1234/palestra/admin/includes/kodAnetari.php"><i class="glyphicon glyphicon-plus"></i> Shto Anetar</a></li>
                <li><a href="http://localhost:1234/palestra/admin/includes/kodInstruktori.php"><i class="glyphicon glyphicon-tower"></i> Shto Instruktor</a></li>
          </ul>

          <ul class="nav nav-sidebar">
            <li><a href="http://localhost:1234/palestra/admin/includes/lista_pagesave.php"><i class="glyphicon glyphicon-usd"></i><span>&nbsp; Pagesat</span></a></li>
            <li><a href="http://localhost:1234/palestra/admin/includes/pagesat_anetareve.php"><i class="glyphicon glyphicon-exclamation-sign"></i><span>&nbsp; Pagesat e Anëtarve</span></a></li>
            <li><a href="http://localhost:1234/palestra/admin/includes/anetaret_pa_paguar.php"><i class="glyphicon glyphicon-alert"></i>&nbsp;<span> &nbsp; Anëtaret pa paguar</span></a></li>
            <li><a href="http://localhost:1234/palestra/admin/includes/instruktoret.php"><i class="glyphicon glyphicon-user"></i><span>&nbsp; Instruktoret</span></a></li>
            <li class="active"><a href="http://localhost:1234/palestra/admin/includes/kalendari.php"><i class="glyphicon glyphicon-calendar"></i><span>&nbsp; Kalendari Sot</span></a></li>
          </ul>

          <ul class="nav nav-sidebar">
            <li><a href="http://localhost:1234/palestra/admin/includes/kurset.php"><i class="glyphicon glyphicon-file"></i><span>&nbsp; Kurset</span></a></li>

            <li><a href="http://localhost:1234/palestra/admin/includes/shtoKurs.php"><i class="glyphicon glyphicon-plus"></i> Shto Kurs</a></li>
          </ul>
        </div>



<!-- Permbajtja Dashboard -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          	<h1 class="page-header text-center">PalestraX</h1>

          	<div class="row placeholders">
           		 <div class="col-xs-2 col-sm-1 placeholder"></div>

            	 <div class="col-xs-12 col-md-10 placeholder">
            	 	
            	 	<?php echo  kalendar( 1 ); ?>

            	 </div>
            </div>
        </div>
    </div>
</div>
