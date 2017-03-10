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

	

	include 'header.php';
	include 'navigation.php';

	///Query per te marre instruktoret
	$sql = "SELECT * FROM perdorues WHERE lloji_perdoruesit = 2";
	$pergjigja = $db->query( $sql );

	//Query per te marre kurset
	$sql_a = "SELECT * FROM perdorues WHERE lloji_perdoruesit = 3";
	$rezultat = $db->query( $sql_a );
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
            <li><a href="http://localhost:1234/palestra/admin/includes/anetaret_pa_paguar.php"><i class="glyphicon glyphicon-alert"></i>&nbsp;<span> &nbsp; Anëtaret pa paguar</span></a></li>
            <li><a href="http://localhost:1234/palestra/admin/includes/instruktoret.php"><i class="glyphicon glyphicon-user"></i><span>&nbsp; Instruktoret</span></a></li>
            <li><a href="http://localhost:1234/palestra/admin/includes/kalendari.php"><i class="glyphicon glyphicon-calendar"></i><span>&nbsp; Kalendari Sot</span></a></li>
          </ul>

          <ul class="nav nav-sidebar">
            <li><a href="http://localhost:1234/palestra/admin/includes/kurset.php"><i class="glyphicon glyphicon-file"></i><span>&nbsp; Kurset</span></a></li>

            <li class="active"><a href="http://localhost:1234/palestra/admin/includes/shtoKurs.php"><i class="glyphicon glyphicon-plus"></i> Shto Kurs</a></li>
          </ul>
        </div>


<!-- Permbajtja Dashboard -->
<h1 class="page-header text-center">Krijo Kurs te ri</h1>

<div class="col-sm-offset-2 col-md-10  main">

<div class="form-group row col-md-6">

<!-- Forma e shtimit -->
  <form class="form-horizontal col-md-12" role="form" id="forme_shtimi" action="http://localhost:1234/palestra/admin/includes/shtoKursQuery.php" method="POST">

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
			<label for="antaret" class="col-sm-4 control-label">Anëtarët e  Kursit:</label>

			<div class="col-md-6">
				<select  multiple="multiple" name="antaret[]" id="antaret" class="form-control">
					<option>------ Anëtarët e Kursit----</option>
				</select>
			</div>
		</div>
	</form>
</div>


<!--Tabela e antareve qe do te shtohen-->
<div class="col-md-6">

	<legend  class="text-center">Anëtarët Aktual</legend>
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

<div class="col-sm-offset-2 col-md-10  main">

	<h1 class="text-center">Programi i kursit</h1>

	<table id="programi" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr class="bg-primary">
			<th class="text-center" colspan="7">Dita</th>
		</tr>

		<tr class="info">
			<th></th>
			<th class="text-center">E Hene</th>
			<th class="text-center">E marte</th>
			<th class="text-center">E merkure</th>
			<th class="text-center">E enjte</th>
			<th class="text-center">E premte</th>
			<th class="text-center">E Shtune</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td class="text-center info">Orari:</td>

			<td onclick="">
				Ora Fillimit:<input   type="number" minlength="9" maxlength="22"  class="form-control" id="ora_f_1">
				Ora Perfundimit:<input  type="number" minlength="9" maxlength="22"   class="form-control" id="ora_m_1">
			</td>

			<td>
				Ora Fillimit:<input  type="number" minlength="9" maxlength="22"   class="form-control" id="ora_f_2">
				Ora Perfundimit:<input  type="number" minlength="9" maxlength="22"   class="form-control" id="ora_m_2">
			</td>

			<td>
				Ora Fillimit:<input  type="number" minlength="9" maxlength="22"  class="form-control" id="ora_f_3">
				Ora Perfundimit:<input  type="number" minlength="9" maxlength="22"   class="form-control" id="ora_m_3">
			</td>

			<td>
				Ora Fillimit:<input   type="number" minlength="9" maxlength="22"  class="form-control" id="ora_f_4">
				Ora Perfundimit:<input  type="number" minlength="9" maxlength="22"  class="form-control" id="ora_m_4">
			</td>

			<td>
				Ora Fillimit:<input  type="number" minlength="9" maxlength="22"  class="form-control" id="ora_f_5">
				Ora Perfundimit:<input  type="number" minlength="9" maxlength="22"   class="form-control" id="ora_m_5">
			</td>

			<td>
				Ora Fillimit:<input type="number" minlength="9" maxlength="22"   class="form-control" id="ora_f_6">
				Ora Perfundimit:<input type="number" minlength="9" maxlength="22"   class="form-control" id="ora_m_6">
			</td>
		</tr>

		<tr>
			<td class="text-center info">
				Programi:
			</td>

			<td>
				<input type="text" class="form-control" id="programi_1">
			</td>

			<td>
				<input type="text" class="form-control" id="programi_2">
			</td>

			<td>
				<input type="text" class="form-control" id="programi_3">
			</td>

			<td>
				<input type="text" class="form-control" id="programi_4">
			</td>

			<td>
				<input type="text" class="form-control" id="programi_5">
			</td>

			<td>
				<input type="text" class="form-control" id="programi_6">
			</td>
		</tr>
		<tr>
			<td></td>
			<td class="text-center">
				<button class="btn btn-success" id="btn_1" onclick="shto( 1 )"><i class="glyphicon-plus"></i></button>
			</td>

			<td class="text-center">
				<button class="btn btn-success" id="btn_2" onclick="shto( 2 )"><i class="glyphicon-plus"></i></button>
			</td>

			<td class="text-center">
				<button class="btn btn-success" id="btn_3" onclick="shto( 3 )"><i class="glyphicon-plus"></i></button>
			</td>

			<td class="text-center">
				<button class="btn btn-success" id="btn_4" onclick="shto( 4 )"><i class="glyphicon-plus"></i></button>
			</td>

			<td class="text-center">
				<button class="btn btn-success" id="btn_5" onclick="shto( 5 )"><i class="glyphicon-plus"></i></button>
			</td>

			<td class="text-center">
				<button class="btn btn-success" id="btn_6" onclick="shto( 6 )"><i class="glyphicon-plus"></i></button>
			</td>
		</tr>
	</tbody>
	</table>
	
	<p></p>

	<div class="col-md-6">
		<input type="button" class="btn btn-success pull-right col-md-4" value="Shto Kursin" onclick="dergo()">
	</div>
	
	<div class="col-md-6">
		<input type="reset" class="btn btn-info pull-left col-md-4" value="Pastro" onclick="pastro()">
	</div>
	
</div>
 </div>

<script>

var id = new Array();


	///Funksioni qe do te shtoje antaret nga tabela tek select-lista e formes
	///@param id e antarit qe do te shtohet
	function shtoAntar( id )
	{	

		var numri = jQuery( '#numri' ).val();
		var anetaret_e_shtuar = jQuery( '#antaret option' ).length;

		if( anetaret_e_shtuar <= numri )
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
	}


	///Funksioni qe ruan id e dites se programit
	///@param _id, id e fushes se shtuar
	function shto( _id )
	{
		id.push( _id );

		jQuery( '#btn_' + _id ).replaceWith( '<p> Orari u ruajt! </p>' );
	}


	///Funksioni qe merr vlerat e fushes se orarit
	///@param id
	function ruaj_orar( id )
	{

		var ora_fillimit = jQuery( '#ora_f_' + id ).val();
		var ora_mbarimit = jQuery( '#ora_m_' + id ).val();
		var program = jQuery( '#programi_' + id ).val();

		var data = { "dita_id": id, "ora_fillimit": ora_fillimit, "ora_mbarimit": ora_mbarimit, "programi" : program };
	
		jQuery.ajax(
		{
			method: "POST",
			url: "http://localhost:1234/palestra/admin/includes/shtoOrar.php",
			success: function( response )
			{ },
			data: data,
			error: function( response )
			{ alert( 'G A B I M' ); }
		});

	}



	function dergo()
	{	
		document.getElementById( 'forme_shtimi' ).submit();

		for( var i = 0; i < id.length; i++ )	
			ruaj_orar( id[ i ] );
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

