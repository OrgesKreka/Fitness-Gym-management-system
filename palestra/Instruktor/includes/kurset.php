<?php
	session_start();

	if( !isset( $_SESSION[ 'instruktor' ] ) )
	{
		header( 'Location: http://localhost:1234:1234/palestra/index.php' );
		exit();
	}

	require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php';
	include 'header.php';
	include 'navigation.php';
    

	$sql = "SELECT kurse.lloji_kursit, kurse.nr_personave, kurse.data_fillimit, kurse.data_mbarimit, kurse.cmimi, oraret.ora_fillimit, oraret.ora_perfundimit FROM kurse JOIN oraret ON kurse.kurs_id = oraret.kurs_id";
	$pergjigja = $db->query( $sql );
    
 ?>
 

 <h2 class="text-center">Kurset</h2><hr />

	<div class="row">
		<div class="col-md-3"></div>

		<div class="col-md-6">
			<table class="table table-bordered">
				<thead class="bg-primary">
					<th class="text-center">Lloji Kursit</th>
					<th class="text-center">Numer Personash</th>
					<th class="text-center">Date Fillimi</th>
					<th class="text-center">Date Mbarimi</th>
					<th class="text-center">Cmimi</th>
					<th class="text-center">Ora e Fillimit</th>
					<th class="text-center">Ora e Perfundimit</th>
				</thead>
				<tbody>
				<?php while( $admin = mysqli_fetch_assoc( $pergjigja ) ) : ?>
					<tr class="<?php if( $admin[ 'kurs_id' ] == $_SESSION[ 'id' ]) echo "danger";?>">
						<td class="text-center"><?= $admin[ 'lloji_kursit' ]; ?></td>

						<td class="text-center"><?= $admin[ 'nr_personave' ]; ?></td>

						<td class="text-center"><?= $admin[ 'data_fillimit' ]; ?></td>

						<td class="text-center"><?= $admin[ 'data_mbarimit' ]; ?></td>
						<td class="text-center"><?= $admin[ 'cmimi' ]; ?></td>
                       <td class="text-center"><?= $admin[ 'ora_fillimit' ]; ?></td>
                       <td class="text-center"><?= $admin[ 'ora_perfundimit' ]; ?></td>
                        
					</tr>
				<?php endwhile; ?>
				
				</tbody>
			</table>
		</div>

		<div class="col-md-3"></div>
	</div>
	
	
