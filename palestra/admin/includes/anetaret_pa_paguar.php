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
	
	///Nese do te fshije anetaret pa kurs.
	if( isset( $_GET[ 'delete' ] ) )
	{
		$id = siguro( $_GET[ 'delete' ] );

		$sql = "DELETE FROM perdorues WHERE perdorues_id = $id";
	    $db->query( $sql );

		header( 'Location: http://localhost:1234/palestra/admin/includes/anetaret_pa_paguar.php' );
	}


	include 'header.php';
	include 'navigation.php';
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
            <li class="active"><a href="http://localhost:1234/palestra/admin/includes/anetaret_pa_paguar.php"><i class="glyphicon glyphicon-alert"></i>&nbsp;<span> &nbsp; Anëtaret pa paguar</span></a></li>
            <li><a href="http://localhost:1234/palestra/admin/includes/instruktoret.php"><i class="glyphicon glyphicon-user"></i><span>&nbsp; Instruktoret</span></a></li>
            <li><a href="http://localhost:1234/palestra/admin/includes/kalendari.php"><i class="glyphicon glyphicon-calendar"></i><span>&nbsp; Kalendari Sot</span></a></li>
          </ul>

          <ul class="nav nav-sidebar">
            <li><a href="http://localhost:1234/palestra/admin/includes/kurset.php"><i class="glyphicon glyphicon-file"></i><span>&nbsp; Kurset</span></a></li>

            <li><a href="http://localhost:1234/palestra/admin/includes/shtoKurs.php"><i class="glyphicon glyphicon-plus"></i> Shto Kurs</a></li>
          </ul>
        </div>



        <!-- Permbajtja Dashboard -->
        <div class="col-sm-9  col-md-10 col-md-offset-1 main">
          <h1 class="page-header text-center">Anëtarët pa paguar</h1>

          <div class="row placeholders">
            <div class="col-xs-2 col-sm-2 placeholder">
            </div>

            <div class="col-xs-12 col-sm-10 placeholder">

            <?php if( isset( $_SESSION[ 'kurs_i_mbaruar' ] ) ) : ?>
				
				<?php 	
					$id = $_SESSION[ 'kurs_i_mbaruar' ];
					$sql1 = "SELECT * FROM kurse WHERE kurs_id = $id";
					$row  = $db->query( $sql1 );
					$kurs = mysqli_fetch_assoc( $row );

							///Fshi kursin
			    	$k_id = $id;
			    	$sql2 = "DELETE FROM kurse WHERE kurs_id = $k_id";
			    	$db->query( $sql2 );
				 ?>

              <div class="alert alert-danger">
  				<strong class="glyphicon glyphicon-warning-sign"></strong> 
  				Ju keni Anetare pa paguar! <br/ >
  				Kursi <?= $kurs[ 'lloji_kursit' ]; ?> ka perfunduar!
			  </div>
				
			<?php  ///Tabela e anetareve pa paguar

				$sql2 = "SELECT * FROM perdorues 
						WHERE lloji_perdoruesit = 3
						AND perdorues_id NOT IN 
						( SELECT antar_id FROM ndjek_kurse )";

				$result = $db->query( $sql2 );

			 ?>
				
			<table id="anetaret" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr class="bg-primary">
						<th class="text-center">Emri</th>
						<th class="text-center">Mbiemri</th>
						<th class="text-center">Gjinia</th>
						<th class="text-center">Telefon</th>
						<th class="text-center">Email</th>
						<th class="text-center">Hiq - Shto</th>
						
					</tr>
				</thead>

				<tbody>
				<?php if( mysqli_num_rows( $result ) > 0 ) : ?>
					<?php while( $row = mysqli_fetch_assoc( $result ) ) : ?>
						<tr class="table-info">
							<td><?= $row[ 'emri' ];  ?></td>
							<td><?= $row[ 'mbiemri' ];  ?></td>
							<td><?= $row[ 'gjinia' ];  ?></td>
							<td><?= $row[ 'nr_telefoni' ];  ?></td>
							<td><?= $row[ 'email' ]; ?></td>
							<td class="text-center">
								<a href="http://localhost:1234/palestra/admin/includes/anetaret_pa_paguar.php?delete=<?= $row[ 'perdorues_id' ]; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a> - 
								<a href="" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i></a>
							</td>
						</tr>
					<?php endwhile; ?>

				<?php else: ?>
					<td colspan="5"> Nuk ka anetare pa kurs!</td>
				<?php endif; ?>
				</tbody>

			<?php else: ?>

				<?php 
        			$sql_else = "SELECT * FROM perdorues 
						WHERE lloji_perdoruesit = 3
						AND perdorues_id NOT IN 
						( SELECT antar_id FROM ndjek_kurse )";

				$result4 = $db->query( $sql_else );


				if( mysqli_num_rows( $result4 ) > 0 )
				{	
					echo '<table id="anetaret" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr class="bg-primary">
						<th class="text-center">Emri</th>
						<th class="text-center">Mbiemri</th>
						<th class="text-center">Gjinia</th>
						<th class="text-center">Telefon</th>
						<th class="text-center">Email</th>
						<th class="text-center">Hiq - Shto</th>
						
					</tr>
					<tbody>';

					 while( $row = mysqli_fetch_assoc( $result4 ) ) 
					 { 
					 	echo "
						<tr class='table-info'>
							<td> " . $row[ 'emri' ] . "</td>
							<td> " . $row[ 'mbiemri' ] . "</td>
							<td> " . $row[ 'gjinia' ] ."</td>
							<td> " . $row[ 'nr_telefoni' ] . "</td>
							<td> " . $row[ 'email' ] . "</td>
							<td class='text-center'>
								<a href='http://localhost:1234/palestra/admin/includes/anetaret_pa_paguar.php?delete=" . $row[ 'perdorues_id' ] ."' class='btn btn-danger'><i class='glyphicon glyphicon-remove'></i></a> - 
								<a href='' class='btn btn-success'><i class='glyphicon glyphicon-plus'></i></a>
							</td>
						</tr>";
					}///FUND while
					echo "</tbody></table>";
				}///FUND if
				else
				{
						echo '<div class="alert alert-success">
		  				<strong class="glyphicon glyphicon-warning-sign"></strong> 
		  				Ju nuk keni Anetare pa paguar! <br/ >
					  </div>';
				}
				 ?>	
			<?php endif; ?>
            </div>

          </div>
        </div>

  
        <?php 
        	unset( $_SESSION[ 'kurs_i_mbaruar' ] );
         ?>