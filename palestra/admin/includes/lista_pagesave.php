<?php 
	session_start();

	if( !isset( $_SESSION[ 'admin' ] ) )
	{
		header( 'Location: http://localhost:1234/palestra/index.php' );
		exit();
	}
?>

<?php 
	
	include 'header.php';
	include 'navigation.php';

 ?>


<!-- Paneli anesor -->
 <div class="container-fluid">
	      <div class="row">
	        <div class="col-sm-3 col-md-2 sidebar">
	          <ul class="nav nav-sidebar">
	            <li class="home"><a href="http://localhost:1234/palestra/admin/admin.php" class="text-center"><i class="glyphicon glyphicon-home"></i> <span>Paneli Administratorit</span> <span class="sr-only">(current)</span></a></li>
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
	            <li class="active"><a href="http://localhost:1234/palestra/admin/includes/lista_pagesave.php"><i class="glyphicon glyphicon-usd"></i><span>&nbsp; Pagesat</span></a></li>
	            <li><a href="http://localhost:1234/palestra/admin/includes/pagesat_anetareve.php"><i class="glyphicon glyphicon-exclamation-sign"></i><span>&nbsp; Pagesat e Anëtarve</span></a></li>
	            <li><a href="http://localhost:1234/palestra/admin/includes/anetaret_pa_paguar.php"><i class="glyphicon glyphicon-alert"></i>&nbsp;<span> &nbsp; Anëtaret pa paguar</span></a></li>
	            <li><a href="http://localhost:1234/palestra/admin/includes/instruktoret.php"><i class="glyphicon glyphicon-user"></i><span>&nbsp; Instruktoret</span></a></li>
	            <li><a href="http://localhost:1234/palestra/admin/includes/kalendari.php"><i class="glyphicon glyphicon-calendar"></i><span>&nbsp; Kalendari Sot</span></a></li>
	          </ul>

	          <ul class="nav nav-sidebar">
	            <li><a href="http://localhost:1234/palestra/admin/includes/kurset.php"><i class="glyphicon glyphicon-file"></i><span>&nbsp; Kurset</span></a></li>

	            <li><a href="http://localhost:1234/palestra/admin/includes/shtoKurs.php"><i class="glyphicon glyphicon-plus"></i> Shto Kurs</a></li>
	          </ul>
	        </div>

	<!-- Permbatja dashboard -->
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			          <h1 class="page-header text-center">Pagesat e Anetareve</h1>

			          <div class="row placeholders">
				            <div class="col-xs-12 col-sm-2 placeholder"></div>

				            <div class="col-xs-12 col-sm-8 placeholder">

				            	<table class="table table-striped table-bordered">
				            		<thead>
				            			<tr class="bg-primary">
				            				<th colspan="8" class="text-center"><h4>Lista e Pagesave</h4></th>
				            			</tr>
				            		</thead>

				            		<tbody>
				            			<tr>
				            				<td></td>
				            				<td class="success">Data e Pagesës</td>
				            				<td class="success">Harxhimi Mesatar</td>
				            				<td class="success">Çmimi ne Lekë</td>
				            				<td class="info">Pagesa</td>
				            				<td class="info">Orët e Punës</td>
				            				<td class="danger">Data e Pagesës</td>
				            				<td class="danger">Çmimi</td>
				            			</tr>

				            			<tr>
				            				<td class="success">Ujë</td>
				            				<td class="success"><?php echo "24-" . date( 'm-Y' ); ?></td>
				            				<td class="success">120 m<sup>3</sup></td>
				            				<td class="success"><?= 120 * 450 + 150 . " Lekë" ?></td>
				            				<td>-</td>
				            				<td>-</td>
				            				<td>-</td>
				            				<td>-</td>
				            			</tr>

				            			<tr>
				            				<td class="success">Energji Elektrike</td>
				            				<td class="success"><?=  "14-" . date( 'm-Y' ); ?></td>
				            				<td class="success">850 kwh</td>
				            				<td class="success"><?= 850 * 16.8 . " Lekë" ?></td>
				            				<td>-</td>
				            				<td>-</td>
				            				<td>-</td>
				            				<td>-</td>
				            			</tr>

				            			<tr>
				            				<td class="info">Instruktorët</td>
				            				<td class="info"><?=  "14-" . date( 'm-Y' ); ?></td>
				            				<td>-</td>
				            				<td>-</td>
				            				<td class="info">45'000 Lekë</td>
				            				<td class="info">8 orë</td>
				            				<td>-</td>
				            				<td>-</td>
				            			</tr>

				            			<tr>
				            				<td class="info">Sanitari</td>
				            				<td class="info"><?=  "14-" . date( 'm-Y' ); ?></td>
				            				<td>-</td>
				            				<td>-</td>
				            				<td class="info">28'000 Lekë</td>
				            				<td class="info">6 orë</td>
				            				<td>-</td>
				            				<td>-</td>
				            			</tr>

				            			<tr>
				            				<td class="info">Mirmbajtësi</td>
				            				<td class="info"><?=  "14-" . date( 'm-Y' ); ?></td>
				            				<td>-</td>
				            				<td>-</td>
				            				<td class="info">28'000 Lekë</td>
				            				<td class="info">2 orë</td>
				            				<td>-</td>
				            				<td>-</td>
				            			</tr>

				            			<tr>
				            				<td class="danger">Vegla</td>
				            				<td>-</td>
				            				<td>-</td>
				            				<td>-</td>
				            				<td>-</td>
				            				<td>-</td>
				            				<td class="danger"><?=  "28-" . date( 'm-Y' ); ?></td>
				            				<td class="danger">5'000 Lekë</td>
				            			</tr>

				            			<tr>
				            				<td class="danger">Të tjera</td>
				            				<td>-</td>
				            				<td>-</td>
				            				<td>-</td>
				            				<td>-</td>
				            				<td>-</td>
				            				<td>-</td>
				            				<td class="danger">75'000 Lekë</td>
				            			</tr>
				            		</tbody>
				            	</table>
				            </div>
				       </div>
		</div>
	</div>
</div>

<?php 
	include 'footer.php';
 ?>