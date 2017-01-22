<?php 
	session_start();

	if( !isset( $_SESSION[ 'id' ] ) )
	{
		header( 'Location: http://localhost/palestra/index.php' );
		exit();
	}
?>

<?php require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php'; ?>


<?php 

	///Heqja e nje administratori nga sistemi!!!
	if( isset( $_GET[ 'delete' ] ) )
	{
		$id = siguro( $_GET[ 'delete' ] );

		$sql3 = "DELETE FROM perdorues WHERE perdorues_id = '$id'";
		$sql4 = "DELETE FROM menaxhon WHERE instruktor_id = '$id'";

		 $db->query( $sql3 );
		 $db->query( $sql4 );

		 header( "Location: http:/localhost/palestra/admin/includes/instruktoret.php" );
	}
?>

<?php 

	include 'header.php';
	include 'navigation.php';

	$sql = "SELECT * FROM perdorues WHERE lloji_perdoruesit = 2";

	$results = $db->query( $sql );


	///Funksioni qe do te shfaqe gjithe kurset e nje instruktori
	function shfaqKurset( $id )
	{	

		global $db;

		$output = '<select class="form-control">';

		$sql = "SELECT kurs_id FROM menaxhon WHERE instruktor_id = '$id'";

		$results = $db->query( $sql );

		if(  mysqli_num_rows( $results ) > 0 )
		{
			while( $kurs = $results->fetch_assoc() )
			{	
				$k_id = $kurs[ 'kurs_id' ];

				$sql2 = "SELECT lloji_kursit FROM kurse WHERE kurs_id = '$k_id'";

				$pergjigja = $db->query( $sql2 );

				$kurs = mysqli_fetch_assoc( $pergjigja );


				$output .= '<option style="padding: 0 0 0 20px;" value="'. $kurs[ 'lloji_kursit' ] .'">' . $kurs[ 'lloji_kursit' ]. '</option>';
			}
		}///FUND if
		else
		{
			$output = '<option>Ky instruktor nuk ka kurse per momentin!</option>';
		}

		return $output;
	} ///FUND shfaqKurset
 ?>

<!-- Dashboard specifik dhe tabela e anetareve -->
 <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="http://localhost/palestra/admin/admin.php" class="text-center"><i class="glyphicon glyphicon-home"></i> <span>Paneli Administratorit</span> <span class="sr-only">(current)</span></a></li>
            <li><a href="#"><i class="glyphicon glyphicon-envelope"></i><span>&nbsp; Inbox( 0 )</span></a></li>
            </ul>

            <ul class="nav nav-sidebar">
                <li><a href="http://localhost/palestra/admin/includes/anetaret.php"><i class="glyphicon glyphicon-user"></i> <span>&nbsp; Anëtarët</span></a></li>
          </ul>

          <ul class="nav nav-sidebar">
            <li><a href="#"><i class="glyphicon glyphicon-usd"></i><span>&nbsp;Pagesat</span></a></li>
            <li><a href=""><i class="glyphicon glyphicon-exclamation-sign"></i><span>&nbsp; Pagesat e Anetareve</span></a></li>
            <li><a href=""><i class="glyphicon glyphicon-alert"></i><span>&nbsp; Anetaret pa paguar</span></a></li>
            <li class="active"><a href="http://localhost/palestra/admin/includes/instruktoret.php"><i class="glyphicon glyphicon-user"></i><span>&nbsp; Instruktoret</span></a></li>
            <li><a href=""><i class="glyphicon glyphicon-calendar"></i><span>&nbsp; Kalendari Sot</span></a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="http://localhost/palestra/admin/includes/kurset.php"><i class="glyphicon glyphicon-file"></i><span>&nbsp; Kurset</span></a></li>

            <li><a href="http://localhost/palestra/admin/includes/shtoKurs.php"><i class="glyphicon glyphicon-plus"></i> Shto Kurs</a></li>
          </ul>
        </div>


<!-- Permbajtja Dashboard -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header text-center">Instruktorët e Palestrës</h1>

          <div class="row placeholders">

            <div class="col-xs-12 col-sm-2 placeholder"></div>
			

            <div class="col-xs-12 col-sm-8 placeholder">
              	
    <table id="anetaret" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr class="bg-primary">
			<th class="text-center">Emri</th>
			<th class="text-center">Mbiemri</th>
			<th class="text-center">Gjinia</th>
			<th class="text-center">Telefon</th>
			<th class="text-center">Email</th>
			<th class="text-center">Kurset</th>
			<th class="text-center"> Hiq Instruktor </th>
		</tr>
	</thead>
	
	<tbody>
		<?php while( $perdorues  = mysqli_fetch_assoc( $results ) ) :  ?>
			<tr>
				<td><?= $perdorues[ 'emri' ];  ?></td>
				<td><?= $perdorues[ 'mbiemri' ];  ?></td>
				<td><?= $perdorues[ 'gjinia' ];  ?></td>
				<td><?= $perdorues[ 'nr_telefoni' ];  ?></td>
				<td><a href="mailto:<?= $perdorues[ 'email' ];?>"><?= $perdorues[ 'email' ];?> <i class="	glyphicon glyphicon-envelope"></i></a></td>
				<td><?= shfaqKurset( $perdorues[ 'perdorues_id' ]); ?></td>
        		<td><a href="http://localhost/palestra/admin/includes/instruktoret.php?delete=<?= $perdorues[ 'perdorues_id' ];?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a></td>
			</tr>
		<?php endwhile; ?>
	</tbody>
</table>
 </div>

          </div>
        </div>
