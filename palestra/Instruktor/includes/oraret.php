<?php
	session_start();

	if( !isset( $_SESSION[ 'id' ] ) )
	{
		header( 'Location: http://localhost/palestra/index.php' );
		exit();
	}

	require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php';
	include 'header.php';
	include 'navigation.php';
    

	$sql = "SELECT dita_id, dita, data, ora_fillmit, ora_mbarimit FROM ditet";
	$pergjigja = $db->query( $sql );
    
 ?>
  <h2 class="text-center">Oraret e Pergjithshme te Palestres</h2><hr />

	<div class="row">
		<div class="col-md-3"></div>

		<div class="col-md-6">
			<table class="table table-bordered">
				<thead class="bg-primary">
					<th class="text-center">Dita</th>
					<th class="text-center">Data</th>
					<th class="text-center">Ora e Hapjes</th>
					<th class="text-center">Ora e Mbylljes</th>
				</thead>
				<tbody>
				<?php while( $admin = mysqli_fetch_assoc( $pergjigja ) ) : ?>
					<tr class="<?php if( $admin[ 'dita_id' ] == $_SESSION[ 'id' ]) echo "danger";?>">
						<td class="text-center"><?= $admin[ 'dita' ]; ?></td>
                        <td class="text-center"><?= $admin[ 'data' ]; ?></td>
                        <td class="text-center"><?= $admin[ 'ora_fillimit' ]; ?></td>
						<td class="text-center"><?= $admin[ 'ora_mbarimit' ]; ?></td>
                     </tr>
				<?php endwhile; ?>
				
				</tbody>
			</table>
		</div>

		<div class="col-md-3"></div>
	</div>
	