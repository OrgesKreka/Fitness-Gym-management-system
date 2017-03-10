<?php
	session_start();

	if( !isset( $_SESSION[ 'instruktor' ] ) )
	{
		header( 'Location: http://localhost:1234/palestra/index.php' );
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

<h2 class="text-center">Instruktoret e Palestrës</h2><hr />

	<div class="row">
		<div class="col-md-3"></div>

		<div class="col-md-6">
			<table class="table table-bordered">
				<thead class="bg-primary">
					<th class="text-center">Emri</th>
			<th class="text-center">Mbiemri</th>
			<th class="text-center">Gjinia</th>
			<th class="text-center">Telefon</th>
				</thead>
				<tbody>
				<?php while( $perdorues  = mysqli_fetch_assoc( $rezultat ) ) :  ?>
			<tr>
			   <td><?= $perdorues[ 'emri' ];  ?></td>
				<td><?= $perdorues[ 'mbiemri' ];  ?></td>
				<td class="text-center"><i class="fa fa-<?= ( $perdorues[ 'gjinia' ] == 'F' ) ? 'female' : 'male';  ?>" aria-hidden="true"></i></td>
				<td><?= $perdorues[ 'nr_telefoni' ];  ?></td>
			</tr>
		<?php endwhile; ?>
				</tbody>
			</table>
		</div>

		<div class="col-md-3"></div>
	</div>
	

<!-- Permbajtja Dashboard -->
       

<script>
	$(document).ready(function(){
    $('#anetaret').DataTable();
});
</script>
