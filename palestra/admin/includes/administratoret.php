<?php 
	session_start();

	if( !isset( $_SESSION[ 'admin' ] ) )
	{
		header( 'Location: http://localhost:1234/palestra/index.php' );
		exit();
	}

	require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php';
	include 'header.php';
	include 'navigation.php';

	$sql = "SELECT perdorues_id, emri, mbiemri, nr_telefoni, email, gjinia FROM perdorues WHERE lloji_perdoruesit = 1 ORDER BY emri";
	$pergjigja = $db->query( $sql );

 ?>

 <h2 class="text-center">Administratorët e Sistemit</h2><hr />

	<div class="row">
		<div class="col-md-3"></div>

		<div class="col-md-6">
			<table class="table table-bordered">
				<thead class="bg-primary">
					<th class="text-center">Emri</th>
					<th class="text-center">Mbiemri</th>
					<th class="text-center">Telefoni</th>
					<th class="text-center">Email</th>
					<th class="text-center">Gjinia</th>
				</thead>
				<tbody>
				<?php while( $admin = mysqli_fetch_assoc( $pergjigja ) ) : ?>
					<tr class="<?php if( $admin[ 'perdorues_id' ] == $_SESSION[ 'id' ]) echo "danger";?>">
						<td class="text-center"><?= $admin[ 'emri' ]; ?></td>

						<td class="text-center"><?= $admin[ 'mbiemri' ]; ?></td>

						<td class="text-center"><?= $admin[ 'nr_telefoni' ]; ?></td>

						<td class="text-center"><?= $admin[ 'email' ]; ?> &nbsp; <a href="mailto:<?= $admin[ 'email' ]; ?>" target="_self"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></td>

						<td class="text-center"><i class="fa fa-<?= ( $admin[ 'gjinia' ] == 'F' ) ? 'female' : 'male';  ?>" aria-hidden="true"></i></td>
					</tr>
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>

		<div class="col-md-3"></div>
	</div>


<?php 
    include 'footer.php';
 ?>