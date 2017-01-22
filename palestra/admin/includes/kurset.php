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
  
  
  ///Fshirja e nje kursi
  if( isset( $_GET[ 'delete' ] ) )
  {
    $id = siguro( $_GET[ 'delete' ] );

    $sql_delete1 = "DELETE FROM kurse WHERE kurs_id = '$id'"; 
    $sql_delete2 = "DELETE FROM menaxhon WHERE kurs_id = '$id'"; 
    $sql_delete3 = "DELETE FROM ndjek_kurse WHERE kurs_id = '$id'"; 
    $sql_delete4 = "DELETE FROM oraret WHERE kurs_id = '$id'"; 
    $sql_delete5 = "DELETE FROM programet WHERE kurs_id = '$id'"; 


    $db->query( $sql_delete1 );
    $db->query( $sql_delete2 );
    $db->query( $sql_delete3 );
    $db->query( $sql_delete4 );
    $db->query( $sql_delete5 );

    header( "Location: http://localhost/palestra/admin/includes/kurset.php?fshirja=true" );

  }


	include 'header.php';
	include 'navigation.php';


	$sql = "SELECT * FROM kurse";

	$results = $db->query( $sql );

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
            <li class="active"><a href="http://localhost/palestra/admin/includes/kurset.php"><i class="glyphicon glyphicon-file"></i><span>&nbsp; Kurset</span></a></li>

            <li><a href="http://localhost/palestra/admin/includes/shtoKurs.php"><i class="glyphicon glyphicon-plus"></i> Shto Kurs</a></li>
          </ul>
        </div>


        <!-- Permbajtja Dashboard -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header text-center">Kurset Aktuale</h1>
        
            
            <?php 

                  ///Afishon mesazhin e suksesit kur krijohet nje kurs i ri
                 if( isset( $_GET[ 'shtimi' ] ) )
                 {

                    echo "<div class='alert alert-success text-center'>
                            <strong>Success!</strong> Kursi i ri u krijua!.
                          </div>" ;
                 }

                 ///Afishon mesazhin e suksesit kur fshihet nje kurs
                 if( isset( $_GET[ 'fshirja' ] ) )
                 {
                    echo "<div class='alert alert-success text-center'>
                            <strong>Success!</strong> Kursi u fshi!.
                          </div>" ;
                 }

             ?>

          <div class="row placeholders">

            <div class="col-xs-12 col-sm-1 placeholder"></div>
			

            <div class="col-xs-12 col-sm-10 placeholder">
              	
    <table id="anetaret" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr class="bg-primary">
			<th class="text-center">Emri Kursit</th>
			<th class="text-center">Numri personave</th>
			<th class="text-center">Data Fillimit</th>
			<th class="text-center">Data Mbarimit</th>
			<th class="text-center">Cmimi</th>
      <th class="text-center">Anetaret</th>
			<th></th>
		</tr>
	</thead>
	
	<tbody>
		<?php while( $kurs  = mysqli_fetch_assoc( $results ) ) :  ?>
			<tr>
				<td  class="text-center <?= $kurs[ 'kurs_id' ];?>"> <?= $kurs[ 'lloji_kursit' ]; ?></td>
				<td  class="text-center <?= $kurs[ 'kurs_id' ];?>"> <?= $kurs[ 'nr_personave' ]; ?></td>
				<td  class="text-center <?=$kurs[ 'kurs_id' ];;?>"> <?= $kurs[ 'data_fillimit' ]; ?></td>
				<td  class="text-center <?= $kurs[ 'kurs_id' ];?>"> <?= ($kurs[ 'data_mbarimit' ] == "0000-00-00") ? 'nuk ka' : $kurs[ 'data_mbarimit' ] ?></td>
				<td  class="text-center <?= $kurs[ 'kurs_id' ];?>"><?= $kurs[ 'cmimi' ]; ?> leke</td>

        <td>
        <?php 

            $select = "<select class='form-control'>";

            $id = $kurs[ 'kurs_id' ];
            $sql2 = "SELECT * FROM ndjek_kurse WHERE kurs_id = '$id'";

            $pergjigja2 = $db->query( $sql2 );

            ///Nese nuk ka antare ky grup
            if( mysqli_num_rows( $pergjigja2 ) == 0 )
            {
               $select = "Ky Grup nuk ka antare per momentin!";
            }



            while( $k = mysqli_fetch_assoc( $pergjigja2 ) )
            {   
                $p_id = $k[ 'antar_id' ];
                $sql3 = "SELECT emri, mbiemri FROM perdorues WHERE perdorues_id = '$p_id'";
                $pergjigja3 = $db->query( $sql3 );

                while( $row = $pergjigja3->fetch_assoc() )
                {
                  $select .= "<option>" . $row[ 'emri' ]. " " . $row[ 'mbiemri' ] . "</option>";
                }
            }

            $select .= '</select>';

            echo $select;

         ?>
         </td>

				<td><a href="http://localhost/palestra/admin/includes/kurset.php?delete=<?= $kurs[ 'kurs_id' ]; ?>" class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i></a> &nbsp;<a class="btn btn-default" onclick="edito( <?= $kurs[ 'kurs_id' ]; ?>)"> <i class="glyphicon glyphicon-pencil"></i></a></td>
			</tr>
		<?php endwhile; ?>
	</tbody>
</table>
 </div>

          </div>
        </div>




<!--  Forma modale e editimit -->
<div class="modal fade" id="modalEditimi" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close"><span aria-hidden="true" onclick="mbyllFormen()">×</span> </button>
      <h3 class="modal-title text-center" id="lineModalLabel">Ndrysho te Dhenat</h3>
    </div>
    <div class="modal-body">
      

      <!-- fushat qe do te editohen -->
      <form id="ndrysho" method="POST" action="http://localhost/palestra/admin/includes/updateKurset.php">  
               <div class="form-group text-center">
                <label for="emri">Emri Kursit:</label>
                <input type="text" class="form-control" id="emri" name="emri" placeholder="emri">
              </div>  
                  
                  <hr />

               <div class="form-group text-center">
                <label for="numri">Numri:</label><br />
                <input type="number" min="1" max="50" id="numri" name="numri" class="form-control">
              </div>

                <hr />

              <div class="form-group text-center">
                <label for="dataFillimit:">Data Fillimit:</label>
                <input type="date" id="dataFillimit" name="dataFillimit" class="form-control">
              </div>
          
              <hr />

              <div class="form-group text-center">
                <label for="dataMbarimit:">Data Mbarimit:</label>
                <input type="date" id="dataMbarimit" name="dataMbarimit" class="form-control">
              </div>
			  
			  <div class="form-group text-center">
			  	<label for="cmimi">Cmimi:</label>
			  	<input type="text" id="cmimi" name="cmimi" class="form-control">	
			  </div>


              <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Ndrysho</button>
              </div>
      </form>

    </div>
    <div class="modal-footer text-center">
          <button type="button" class="btn btn-danger btn-block" role="button" onclick="mbyllFormen()">Mbyll</button>
    </div>
  </div>
  </div>
</div>

<script>
	

	function edito( id )
	{	
		jQuery( '#modalEditimi' ).modal( 'show' );
		 
		 var elementet = document.getElementsByClassName( id );

		 var emri = elementet[ 0 ].innerHTML;
		 var nr = elementet[ 1 ].innerHTML;
		 var data1 = elementet[ 2 ].innerHTML;
		 var data2 =  elementet[ 3 ].innerHTML;
		 var cmimi = elementet[ 4 ].innerHTML;

       console.log( data1 );

		 jQuery( '#emri' ).val( emri );
		 jQuery( '#numri' ).val( nr );
		 document.getElementById( 'dataFillimit').defaultValue = data1;
		 jQuery( '#dataMbarimit' ).val( data2 );
		 jQuery( '#cmimi' ).val( cmimi );

		 document.getElementById( 'ndrysho' ).action = "http://localhost/palestra/admin/includes/updateKurset.php?id=" + id;
	}///FUND edito


	function mbyllFormen()
	{
		jQuery( '#modalEditimi' ).modal( 'hide' );
	}
</script>