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
  

  ///Fshirja e nje antari nga palestra
  if( isset( $_GET[ 'delete' ] ) )
  {
    $id = $_GET[ 'delete' ];
    $id = siguro( $id );

    $id = ( int ) $id;

    $sql2 = "DELETE FROM perdorues WHERE perdorues_id = '$id'";

    $db->query( $sql2 );

    header( 'Location: http://localhost/palestra/admin/includes/anetaret.php' );
  } 

 	include 'header.php';
 	include 'navigation.php';

 	$sql = "SELECT * FROM perdorues WHERE lloji_perdoruesit = 3";

 	$rezultat = $db->query( $sql );

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
                <li class="active"><a href="http://localhost/palestra/admin/includes/anetaret.php"><i class="glyphicon glyphicon-user"></i> <span>&nbsp; Anëtarët</span></a></li>
                <li><a href="#"><i class="glyphicon glyphicon-plus-sign"></i><span>&nbsp; Shto Anëtar</span></a></li>
                <li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i><span>&nbsp; Hiq Anëtar</span></a></li>
          </ul>

          <ul class="nav nav-sidebar">
            <li><a href="#"><i class="glyphicon glyphicon-usd"></i><span>&nbsp;Pagesat</span></a></li>
            <li><a href=""><i class="glyphicon glyphicon-exclamation-sign"></i><span>&nbsp;Pagesat e Anetareve</span></a></li>
            <li><a href=""><i class="glyphicon glyphicon-alert"></i><span>&nbsp;Anetaret pa paguar</span></a></li>
            <li><a href="http://localhost/palestra/admin/includes/instruktoret.php"><i class="glyphicon glyphicon-user"></i><span>&nbsp; Instruktoret</span></a></li>
            <li><a href=""><i class="glyphicon glyphicon-calendar"></i><span>&nbsp; Kalendari Sot</span></a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="http://localhost/palestra/admin/includes/kurset.php"><i class="glyphicon glyphicon-file"></i><span>&nbsp; Kurset</span></a></li>

            <li><a href="http://localhost/palestra/admin/includes/shtoKurs.php"><i class="glyphicon glyphicon-plus"></i> Shto Kurs</a></li>
          </ul>
        </div>

    
    <!-- Permbajtja Dashboard -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header text-center">Antarët e Palestrës</h1>

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
      <th></th>
		</tr>
	</thead>
	
	<tbody>
		<?php while( $perdorues  = mysqli_fetch_assoc( $rezultat ) ) :  ?>
			<tr>
				<td><?= $perdorues[ 'emri' ];  ?></td>
				<td><?= $perdorues[ 'mbiemri' ];  ?></td>
				<td><?= $perdorues[ 'gjinia' ];  ?></td>
				<td><?= $perdorues[ 'nr_telefoni' ];  ?></td>
        <td><a href="http://localhost/palestra/admin/includes/anetaret.php?delete=<?= $perdorues[ 'perdorues_id' ]; ?>"><i class="glyphicon glyphicon-remove btn btn-danger"></i></a> &nbsp; <a onclick="formaEditimit( <?= $perdorues[ 'perdorues_id' ]; ?>)"><i class="glyphicon glyphicon-pencil btn btn-default"></i></a></td>
			</tr>
		<?php endwhile; ?>
	</tbody>
</table>
 </div>

          </div>
        </div>



<!--  Forma modale e editimit -->
<div class="modal fade" id="modalEditimi" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      <h3 class="modal-title text-center" id="lineModalLabel">Ndrysho te Dhenat</h3>
    </div>
    <div class="modal-body">
      

      <!-- fushat qe do te editohen -->
      <form>  

               <div class="form-group">
                <label for="emri">Emri:</label>
                <input type="email" class="form-control" id="emri" placeholder="emaili">
              </div>  
                  
                  <hr />

               <div class="form-group text-center">
                <label for="gjinia">Gjinia:</label><br />
                <input type="radio" name="gjinia" value="mashkull" checked> <i class="fa fa-male" aria-hidden="true"></i> Mashkull <p></p>
                <input type="radio" name="gjinia" value="femer"> <i class="fa fa-female" aria-hidden="true"></i> Femer <p></p>
                <input type="radio" name="gjinia" value="tjeter"> <i class="  fa fa-genderless"></i> Tjeter
              </div>

                <hr />

              <div class="form-group text-center">
                <label for="trupi:">Ndertimi trupit:</label>
                <select name="trupi" id="trupi">
                  <option value="Endomorf">Endomorf</option>
                  <option value="Ektomorf">Ektomorf</option>
                  <option value="Ezomorf">Ezomorf</option>
                </select>
              </div>
          
              <hr>
              <div class="form-group">
                <label for="fjalekalim">Fjalekalimi</label>
                <input type="password" class="form-control" id="fjalekalim" placeholder="Fjalekalimi i ri">
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Ndrysho</button>
              </div>
      </form>

    </div>
    <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-default pull-left" data-dismiss="modal"  role="button">Mbyll</button>
    </div>
  </div>
  </div>
</div>




<script>

///Funksioni qe hap formen e editimit
///@param id, id e antarit qe do te editohet
function formaEditimit( id ) 
{

  jQuery( '#modalEditimi' ).modal( "show" );
}


  ///Kur faqja mbaron se ngarkuari, tabelen shfaqe si datatable
	$(document).ready(function(){
    $('#anetaret').DataTable();
});

  ///
</script>
<?php
 	include 'footer.php';
  ?>