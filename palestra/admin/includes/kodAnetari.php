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
	
	include 'header.php';
	include 'navigation.php';

	///id e anetarit te fundit ne db
	$sql = "SELECT perdorues_id FROM perdorues ORDER BY perdorues_id DESC LIMIT 1";
	$pergjigja = $db->query( $sql );
	$row = $pergjigja->fetch_assoc();
	$id = $row[ 'perdorues_id' ] + 1; /// +1 pasi ky do te jete vendi real i perdoruesit te ri ne db.

	/***
	   * Funksioni per te gjeneruar kodin unik te regjistrimit bazuar ne pozicionin ne databaze te perdoruesit
	   * @param $id, id qe do te kete perdoruesi kur te futet ne databaze.
	   * Hash 6 Alfa Numeric Bits
	   * referenca: http://stackoverflow.com/questions/4681913/substr-md5-collision	
	*/
	$hash = substr(base_convert(md5( $id ), 16, 36), 0, 8);

	///Krijimi i sesionit
	$_SESSION[ 'kod_regjistrimi' ] = $hash;
 ?>

<!-- Side Bar -->
<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="http://localhost/palestra/admin/admin.php" class="text-center"><i class="glyphicon glyphicon-home"></i> <span>Paneli Administratorit</span> <span class="sr-only">(current)</span></a></li>
            <li><a href="#"><i class="glyphicon glyphicon-envelope"></i><span>&nbsp; Inbox( 0 )</span></a></li>
            </ul>

            <ul class="nav nav-sidebar">
                <li><a href="http://localhost/palestra/admin/includes/anetaret.php"><i class="glyphicon glyphicon-user"></i> <span>&nbsp; Anëtarët</span></a></li>
                <li class="active"><a href="http://localhost/palestra/admin/includes/kodAnetari.php"><i class="glyphicon glyphicon-plus"></i> Shto Anetar</a></li>
                <li><a href=""><i class="glyphicon glyphicon-tower"></i> Shto Instruktor</a></li>
          </ul>

          <ul class="nav nav-sidebar">
            <li><a href="#"><i class="glyphicon glyphicon-usd"></i><span>&nbsp; Pagesat</span></a></li>
            <li><a href=""><i class="glyphicon glyphicon-exclamation-sign"></i><span>&nbsp; Pagesat e Antareve</span></a></li>
            <li><a href=""><i class="glyphicon glyphicon-alert"></i>&nbsp;<span> Antaret pa paguar</span></a></li>
            <li><a href="http://localhost/palestra/admin/includes/instruktoret.php"><i class="glyphicon glyphicon-user"></i><span>&nbsp; Instruktoret</span></a></li>

            <li><a href="http:/localhost/palestra/admin/includes/kurset.php"><i class="glyphicon glyphicon-file"></i> Kurset</a></li>
            <li><a href=""><i class="glyphicon glyphicon-calendar"></i><span>&nbsp; Kalendari Sot</span></a></li>
          </ul>

          <ul class="nav nav-sidebar">
            <li><a href="http://localhost/palestra/admin/includes/kurset.php"><i class="glyphicon glyphicon-file"></i><span>&nbsp; Kurset</span></a></li>

            <li><a href="http://localhost/palestra/admin/includes/shtoKurs.php"><i class="glyphicon glyphicon-plus"></i> Shto Kurs</a></li>
          </ul>
        </div>

<!-- Permbajtja Dashboard -->
  	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
     		<h1 class="page-header text-center">Kodi i Anetarit te ri</h1>
			
			<div class="row placeholders">
            <div class="col-xs-2 col-sm-2 placeholder">
            </div>

            <div class="col-xs-12 col-sm-8 placeholder">
                <div class="alert alert-danger">
  					<strong>KUJDES!</strong><br>
  					Ky Kod eshte UNIK. <br>
  					Duhet te gjenerohet nga administratori!<br>
					Duhet te perdoret vetem nga personi i cili kryen pagesen e regjistrimit!
				</div>
				
				<p></p>

				<h2>Kodi i perdoruesit <?= $id ?>: <strong><?= $hash ?></strong></h2>
            </div>

          </div>
 	</div>
 </div>