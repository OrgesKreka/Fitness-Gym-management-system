<?php
	session_start();

	if( !isset( $_SESSION[ 'instruktor' ] ) )
	{
		header( 'Location: http://localhost:1234/palestra/index.php' );
		exit();
	}

	require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php';
	include 'header.php';
	include 'navigation.php';
    

	$sql = "SELECT oraret.dita_id, oraret.ora_fillimit, oraret.ora_perfundimit, ditet.dita_jave FROM oraret JOIN ditet ON oraret.dita_id = ditet.dita_id ";
	
    $pergjigja = $db->query( $sql );
    
 ?>
  <h2 class="text-center">Oraret e Pergjithshme te Palestres</h2><hr />

	<div class="row">
		<div class="col-md-3"></div>

		<div class="col-md-6">
			<table class="table table-bordered">
				<thead class="bg-primary">
                    <th class="text-center">Dita</th>
				    <th class="text-center">Ora e Hapjes</th>
					<th class="text-center">Ora e Mbylljes</th>
					
				</thead>
				<tbody>
				<?php while( $admin = mysqli_fetch_assoc( $pergjigja ) ) : ?>
					<tr class="<?php if( $admin[ 'orar_id' ] == $_SESSION[ 'id' ]) echo "danger";?>">
					    <td class="text-center"><?= $admin[ 'dita_jave' ]; ?></td>
						<td class="text-center"><?= $admin[ 'ora_fillimit' ]; ?></td>
                        <td class="text-center"><?= $admin[ 'ora_perfundimit' ]; ?></td>
					</tr>
				<?php endwhile; ?>
				
				</tbody>
			</table>
		</div>

		<div class="col-md-3"></div>
	</div>
	