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

	///Query per te marre instruktoret
	$sql = "SELECT * FROM perdorues WHERE lloji_perdoruesit = 2";
	$pergjigja = $db->query( $sql );

	//Query per te marre kurset
	$sql_a = "SELECT * FROM perdorues WHERE lloji_perdoruesit = 3";
	$rezultat = $db->query( $sql_a );

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
            <li><a href="http://localhost/palestra/admin/includes/instruktoret.php"><i class="glyphicon glyphicon-user"></i><span>&nbsp; Instruktoret</span></a></li>
            <li><a href=""><i class="glyphicon glyphicon-calendar"></i><span>&nbsp; Kalendari Sot</span></a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="http://localhost/palestra/admin/includes/kurset.php"><i class="glyphicon glyphicon-file"></i><span>&nbsp; Kurset</span></a></li>

            <li class="active"><a href="http://localhost/palestra/admin/includes/shtoKurs.php"><i class="glyphicon glyphicon-plus"></i> Shto Kurs</a></li>
          </ul>
        </div>



<!-- Permbajtja Dashboard -->
<h1 class="page-header text-center">Krijo Kurs te ri</h1>

<div class="col-sm-offset-2 col-md-10  main">

<div class="form-group row col-md-6">

<!-- Forma e shtimit -->
  <form class="form-horizontal col-md-12" role="form" method="POST" action="http://localhost/palestra/admin/includes/shtoKursQuery.php">

	    <div class="form-group">
	        <label for="emri" class="col-sm-4 control-label">Emri i Kursit:</label>

	        <div class="col-md-6">
	            <input type="text" class="form-control" id="emri" name="emri" placeholder="Emri i Kursit">
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="numri" class="col-sm-4 control-label">Numri i Personave:</label>

	        <div class="col-md-6">
	            <input type="number" min="1" max="50" id="numri" name="numri" class="form-control" placeholder="Numri i Personave">
	        </div>
	    </div>

	     <div class="form-group">
	        <label for="dFillimi" class="col-sm-4 control-label">Data e Fillimit:</label>

	        <div class="col-md-6">
	            <input type="date" id="dFillimi" name="dFillimi" class="form-control" placeholder="Data e fillimit">
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="dMbarimi" class="col-sm-4 control-label">Data e Mbarimit:</label>

	        <div class="col-md-6">
	            <input type="date" id="dMbarimi" name="dMbarimi" class="form-control" placeholder="Data e fillimit">
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="cmimi" class="col-sm-4 control-label">Cmimi i Kursit:</label>

	        <div class="col-md-6">
	            <input type="text" id="cmimi" name="cmimi" class="form-control" placeholder="cmimi">
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="instruktori" class="col-sm-4 control-label">Instruktori pergjegjes:</label>

	        <div class="col-md-6">
	            <?php 

	            	$output = "<select class='form-control' id='instruktori' name='instruktori'>";

	            	while( $instruktor = mysqli_fetch_assoc( $pergjigja ) )
	            	{
	            		$option = '<option value='.$instruktor[ 'perdorues_id' ].'>' . $instruktor[ 'emri' ] .'  '. $instruktor[ 'mbiemri' ] . '</option>';

	            		$output .= $option;
	            	}

	            	$output .= '</select>';
	            	echo $output;
	             ?>
	        </div>
	    </div>
		
		<!-- Anetaret e ketij Grupi-->
		<div class="form-group">
			<label for="antaret" class="col-sm-4 control-label">Antaret e Ketij Kursi:</label>

			<div class="col-md-6">
				<select  multiple="multiple" name="antaret[]" id="antaret" class="form-control">
					<option>------ Antaret e Kursit----</option>
				</select>
			</div>
		</div>

		<div class="form-group">
	       <div class="col-sm-4"></div>
	        <div class="col-md-6">
	            <input type="submit" class="btn btn-success" value="Shto Kursin" name="shto">
	            <input type="reset" class="btn btn-info pull-right" value="Pastro" onclick="pastro()">
	        </div>
	    </div>
	</form>
</div>


<!--Tabela e antareve qe do te shtohen-->
<div class="col-md-6">

	<legend  class="text-center">Antaret Aktual</legend>
	<table id="anetaret" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr class="bg-primary">
			<th class="text-center">Emri</th>
			<th class="text-center">Mbiemri</th>
			<th class="text-center">Gjinia</th>
			<th class="text-center">Shto</th>
		</tr>
	</thead>
	
	<tbody>
		<?php while( $perdorues  = mysqli_fetch_assoc( $rezultat ) ) :  ?>
			<tr id="<?= $perdorues[ 'perdorues_id' ];?>">
				<td class="text-center p_<?= $perdorues[ 'perdorues_id' ];?>"><?= $perdorues[ 'emri' ];  ?></td>
				<td class="text-center p_<?= $perdorues[ 'perdorues_id' ];?>"><?= $perdorues[ 'mbiemri' ];  ?></td>
				<td class="text-center"><?= $perdorues[ 'gjinia' ];  ?></td>
      			<td class="text-center"><a class="btn btn-success" onclick="shtoAntar( <?php  echo $perdorues[ 'perdorues_id' ];?>)"><i class="glyphicon glyphicon-ok"></i></a></td>
			</tr>
		<?php endwhile; ?>
	</tbody>
</table>
</div>

</div>
</div>

<script>
	
	///Funksioni qe do te shtoje antaret nga tabela tek select-lista e formes
	///@param id e antarit qe do te shtohet
	function shtoAntar( id )
	{	


		///Krijimi i option dhe shtimi ne select
		var select = document.getElementById( 'antaret' );
		var option = document.createElement( 'option' );
		option.selected = true;
		option.value = id;
		var emri_mbiemri = document.getElementsByClassName( 'p_' + id );
		option.innerHTML = emri_mbiemri[ 0 ].innerHTML + " " + emri_mbiemri[ 1 ].innerHTML;
		select.appendChild( option );

		///Heqja e rreshti qe do te shtohet ne select list
		jQuery( '#' + id ).remove();
	}


	///Funksioni qe do te pastroje select listen
	function pastro()
	{
		jQuery( '#antaret' ).empty(); 

		location.reload();

	}

	///Per te pastruar autocomplete te tageve input
	var autocompleteOFF = document.getElementsByTagName( "input" );
    for( var i = 0; i < autocompleteOFF.length; i++ )
    {
        autocompleteOFF[ i ].autocomplete = "off";
    }
</script>

