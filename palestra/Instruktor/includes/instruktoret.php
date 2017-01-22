<?php
	session_start();

	if( !isset( $_SESSION[ 'id' ] ) )
	{
		header( 'Location: http://localhost/palestra/index.php' );
		exit();
	}
require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php';
 ?>

 <?php

 	include 'header.php';
 	include 'navigation.php';

 	$sql = "SELECT * FROM perdorues WHERE lloji_perdoruesit = 2;";

 	$rezultat = $db->query( $sql );


    

?>

<!-- Dashboard specifik dhe tabela e anetareve -->
 <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="http://localhost/palestra/Instruktor/includes/instruktoret.php" class="text-center"><i class="glyphicon glyphicon-home"></i> <span>Paneli i Instruktorit</span> <span class="sr-only">(current)</span></a></li>
            <li><a href="#"><i class="glyphicon glyphicon-envelope"></i><span>&nbsp; Inbox( 0 )</span></a></li>
            </ul>

        <ul>
            <li><a href=""><i class="glyphicon glyphicon-user"></i><span>&nbsp; Instruktoret</span></a></li>
            <li><a href=""><i class="glyphicon glyphicon-calendar"></i><span>&nbsp; Kalendari Sot</span></a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href=""><i class="glyphicon glyphicon-file"></i><span>&nbsp; Kurset</span></a></li>
          </ul>
        </div>


    <!-- Permbajtja Dashboard -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header text-center">Antarët e Palestrës</h1>

          <div class="row placeholders">

            <div class="col-xs-12 col-sm-2 placeholder"></div>


            <div class="col-xs-12 col-sm-8 placeholder">

    <table id="instruktoret" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr class="bg-primary">
			<th class="text-center">Emri</th>
			<th class="text-center">Mbiemri</th>
			<th class="text-center">Gjinia</th>
			<th class="text-center">Telefon</th>
			<th class="text-center">Konstrukti</th>
		</tr>
	</thead>

	<tbody>
		<?php while( $perdorues  = mysqli_fetch_assoc( $rezultat ) ) :  ?>
			<tr>
				<td><?= $perdorues[ 'emri' ];  ?></td>
				<td><?= $perdorues[ 'mbiemri' ];  ?></td>
				<td><?= $perdorues[ 'gjinia' ];  ?></td>
				<td><?= $perdorues[ 'nr_telefoni' ];  ?></td>
				<td><?= $perdorues[ 'ndertimi_trupit' ];  ?></td>
				
			</tr>
		<?php endwhile; ?>
	</tbody>
</table>
 </div>

          </div>
        </div>

<script>
	$(document).ready(function(){
    $('#anetaret').DataTable();
});
</script>
