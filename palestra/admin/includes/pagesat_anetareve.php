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


	$sql = "SELECT shuma, anetar_id, kurs_id, data_pageses FROM pagesat";
	$results = $db->query( $sql );

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
            <li class="active"><a href="http://localhost:1234/palestra/admin/includes/pagesat_anetareve.php"><i class="glyphicon glyphicon-exclamation-sign"></i><span>&nbsp; Pagesat e Anëtarve</span></a></li>
            <li><a href="http://localhost:1234/palestra/admin/includes/anetaret_pa_paguar.php"><i class="glyphicon glyphicon-alert"></i>&nbsp;<span> &nbsp; Anëtaret pa paguar</span></a></li>
            <li><a href="http://localhost:1234/palestra/admin/includes/instruktoret.php"><i class="glyphicon glyphicon-user"></i><span>&nbsp; Instruktoret</span></a></li>
            <li><a href="http://localhost:1234/palestra/admin/includes/kalendari.php"><i class="glyphicon glyphicon-calendar"></i><span>&nbsp; Kalendari Sot</span></a></li>
          </ul>

          <ul class="nav nav-sidebar">
            <li><a href="http://localhost:1234/palestra/admin/includes/kurset.php"><i class="glyphicon glyphicon-file"></i><span>&nbsp; Kurset</span></a></li>

            <li><a href="http://localhost:1234/palestra/admin/includes/shtoKurs.php"><i class="glyphicon glyphicon-plus"></i> Shto Kurs</a></li>
          </ul>
        </div>



	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	          <h1 class="page-header text-center">Pagesat e Anetareve</h1>

	          <div class="row placeholders">
		            <div class="col-xs-12 col-sm-2 placeholder"></div>

		            <div class="col-xs-12 col-sm-8 placeholder">
		            	<table id="anetaret" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr class="bg-primary">
									<th class="text-center">Emri Kursit</th>
									<th>Emri Anetarit</th>
									<th class="text-center">Mbiemri</th>
									<th class="text-center">Pagesa</th>
									<th class="text-center">Data pageses</th>
								</tr>
							</thead>

							<tbody>
								<?php 
									while ( $row = mysqli_fetch_assoc( $results ) ) 
									{
										
										$id = $row[ 'anetar_id' ];

										$sql2 = "SELECT emri, mbiemri FROM perdorues WHERE perdorues_id = $id";
										$result2 = $db->query( $sql2 );
										$perdorues = mysqli_fetch_assoc( $result2 );

										$k_id = $row[ 'kurs_id' ];

										$sql3 = "SELECT lloji_kursit FROM kurse WHERE kurs_id = $k_id";
										$result3 = $db->query( $sql3 );
										$kurs = mysqli_fetch_assoc( $result3 );

										echo "<tr>";
											echo "<td class='text-center warning'>" .$kurs[ 'lloji_kursit' ]. "</td>";
											echo "<td class='text-center'>". $perdorues[ 'emri' ]."</td>";
											echo "<td class='text-center'>". $perdorues[ 'mbiemri' ]."</td>";
											echo "<td class='text-center'>". $row[ 'shuma' ]."</td>";
											echo "<td class='text-center'>". $row[ 'data_pageses' ]."</td>";
										echo "</tr>";

									}
									
								 ?>
							</tbody>
						</table>

						<div></div>
						
						<hr>

						<?php 

							$sql4 = "SELECT DISTINCT * FROM kurse";
							$result4 = $db->query( $sql4 );

							$output = '';
							$totali_personave = 0;
							$totali_parave = 0;

							while( $kurs = mysqli_fetch_array( $result4 ) )
							{

								$output .= "<div class=\"panel panel-primary\">
											<div class=\"panel-heading\"><h5>Kursi <strong>". $kurs[ 'lloji_kursit' ]."</strong> ka:</h5></div>
											  <div class=\"panel-body\">
											    <h2>". $kurs[ 'nr_personave' ]." x " . $kurs[ 'cmimi' ]. " = <strong>". ( $kurs[ 'nr_personave' ] * $kurs[ 'cmimi' ] )." Leke</strong> </h2>
											  </div>
											  <div class=\"panel-footer\"></div>
											</div>";

									$totali_personave += $kurs[ 'nr_personave' ];
									$totali_parave += ( $kurs[ 'nr_personave' ] * $kurs[ 'cmimi' ] );
							}


							$output .= "<hr />";
							
							$output .= "<div class=\"panel panel-danger\">
											<div class=\"panel-heading\"><h5>Totali Anetareve: ". $totali_personave."</h5></div>
											  <div class=\"panel-body\">
											    <h2> Te ardhurat totale: " .$totali_parave. "<strong> Leke </strong></h2>
											  </div>
											  <div class=\"panel-footer\"></div>
											</div>";


							echo $output;
						 ?>
		            </div>
			</div>
	</div>
</div>
</div>


<?php
	include 'footer.php';
?>