<?php
	session_start();

	if( !isset( $_SESSION[ 'instruktor' ] ) )
	{
		header( 'Location: http://localhost:1234/palestra/index.php' );
		exit();
	}
require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php';
 ?>


<!--Fshirja e nje kenge-->
 <?php 

 if( isset( $_GET[ 'delete' ] ) )
  {
    $id = siguro( $_GET[ 'delete' ] );

    $sql_fshi = "DELETE FROM kenge WHERE kenge_id = '$id'"; 
    
      $db->query( $sql_fshi );
    

    header( "Location: http://localhost:1234/palestra/Instruktor/includes/music.php?fshirja=true" );

  } 

    	include 'header.php';
 	include 'navigation.php';

 	$sql = "SELECT * FROM kenge;";

 	$rezultat = $db->query( $sql );
 ?>


<h2 class="text-center">Palestra X Playlist</h2><hr />

	<div class="row">
		<div class="col-md-3"></div>

		<div class="col-md-6">
			<table class="table-hover" style="border-collapse:separate;
            border-spacing:6px;">
				<thead class="bg-primary">
				<th class="text-center">Këngëtari</th>
			    <th class="text-center">Titulli i kënges</th>
			    <th class="text-center">YouTube</th>
			    
			</thead>
				<tbody>
				<?php while( $song  = mysqli_fetch_assoc( $rezultat ) ) :  ?>
			<tr>
			   <td class="danger" style="text-align:center;"><b><?= $song[ 'autori' ];  ?></b></td>
				<td class="info" style="text-align:center;"><b><?= $song[ 'titulli' ];  ?></b></td>
				<td class="warning" style="text-align:center;"><a href="<?= $song[ 'link' ];  ?>" target="_blank"><?= $song[ 'link' ];  ?></a></td>
				<td class="text-center"><a href="http://localhost:1234/palestra/Instruktor/includes/music.php?delete=<?= $song[ 'kenge_id' ]; ?>" class="btn btn-danger btn-xs"> <i class="glyphicon glyphicon-remove" ></i></a> &nbsp;</td>
			</tr>
		<?php endwhile; ?>
				</tbody>
			</table>
		</div>

		<div class="col-md-3"></div>
	</div>
	

<!--Forma e futjes se nje kenge ne DB-->
<div style="margin-top:30px;margin-left:250px;margin-bottom:50px;">
<form class="form-inline" action="http://localhost:1234/palestra/Instruktor/includes/musicQuery.php" method="POST" autocomplete="off">
  <div class="form-group">
    <label for="autori">Këngëtari/Banda:</label>
    <input type="text" class="form-control" id="autori" name="autori">
  </div>
  <div class="form-group">
    <label for="titulli">Titulli:</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="form-group">
    <label for="url">URL:</label>
    <input type="text" class="form-control" id="url" name="url">
  </div>
  <button type="submit" class="btn btn-warning" value="regjistro">Regjistro</button>
</form>
</div>


