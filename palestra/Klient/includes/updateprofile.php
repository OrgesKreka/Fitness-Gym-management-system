<?php 
        session_start();

        if( !isset( $_SESSION[ 'klient' ] ) )
        {
                header( 'Location: http://localhost:1234/palestra/index.php' );
                exit();
        }


 require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php';

  include 'header.php';
	include 'navigation.php';

    $id = $_SESSION[ 'klient' ];

	$sql = "SELECT * FROM perdorues WHERE perdorues_id = $id";

	$pergjigja = $db->query( $sql );

  $info = mysqli_fetch_assoc( $pergjigja );
?>



<h1 class="page-header text-center">Përditëso Profilin</h1>

<div class="row">
  <div class="col-lg-3"></div>
  


<!--Forma-->
<div class="form-group row col-md-6">

 
	<div class="row" id="content">
	<form action="http://localhost:1234/palestra/Klient/includes/updateQuery.php" method="POST" autocomplete="off" id="updateform">
  <div class="col-lg-6">
   <label for="email">Ndrysho email:</label>
    <div class="input-group">
      <div class="input-group-btn">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a onclick="pastroE()" class="btn btn-default" role="button">Pastro</a></li>
          
        </ul>
      </div><!-- /btn-group -->
      
      <input type="email" class="form-control" id="email" name="email" value="<?= $info[ 'email' ];?>"><br>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  
  
  <div class="col-lg-6">
    <label for="email">Ndrysho Fjalëkalim:</label>
     <div class="input-group">
      <div class="input-group-btn">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a onclick="pastroPass()" class="btn btn-default" role="button">Pastro</a></li>
          
        </ul>
      </div><!-- /btn-group -->
      <input minlength="4" title="Fjalekalimi duhet te kete te pakten 4 karaktere" type="password" class="form-control" id="password" name="password"  placeholder="Shkruani fjalekalimin e ri">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  
  <div class="col-lg-6">
    <label for="email">Ndrysho Numër Telefoni:</label>
     <div class="input-group">
      <div class="input-group-btn">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a onclick="pastroT()" class="btn btn-default" role="button">Pastro</a></li>
          
        </ul>
      </div><!-- /btn-group -->
      <input type="text" class="form-control" id="tel" name="tel" value="<?= $info[ 'nr_telefoni' ]; ?>">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  
  <div class="col-lg-6">
    <label for="email">Ndrysho Adresë:</label>
     <div class="input-group">
      <div class="input-group-btn">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a onclick="pastroA()" class="btn btn-default" role="button">Pastro</a></li>
          
        </ul>
      </div><!-- /btn-group -->
      <input type="text" class="form-control" id="adresa" name="adresa" value="<?= $info[ 'adresa' ];?>">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  
  <div class="col-lg-6">
    <label for="email">Ndrysho Peshën:</label>
     <div class="input-group">
      <div class="input-group-btn">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a onclick="pastroP()" class="btn btn-default" role="button">Pastro</a></li>
          
        </ul>
      </div><!-- /btn-group -->
      <input type="text" class="form-control" id="pesha" name="pesha" value="<?= $info[ 'pesha' ];?>">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  
  <div class="col-lg-6">
    <label for="email">Ndrysho Gjatesinë:</label>
     <div class="input-group">
      <div class="input-group-btn">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a onclick="pastroGj()" class="btn btn-default" role="button">Pastro</a></li>
        </ul>
      </div><!-- /btn-group -->
      <input type="text" class="form-control" id="gjatesia" name="gjatesia" value="<?= $info[ 'gjatesia' ];?>">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  
  <input type="submit" value="Ruaj" class="btn btn-success">
		</form>
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
</div>
 
                  
	</div> <!--FUND FORM-->
	
	<hr>
	<h1 class="page-header text-center">Të dhënat aktuale</h1>
	<!--Tabela e Te Dhenave-->
	<div class="row">
		<div class="col-md-5"></div>

		<div class="col-md-6">
			<table class="table-hover" style="border-collapse:separate;
            border-spacing:6px;">
				
				<tbody>
			<tr>
		   <td><b>Emri:</b></td>
			  <td><?= $info[ 'emri' ]; ?></td>
			</tr>
			<tr>
				<td><b>Mbiemri:</b></td>
				<td><?= $info[ 'mbiemri' ]; ?></td>
			</tr>
			<tr>
				<td><b>Gjinia</b></td>
				<td><?= $info[ 'gjinia' ]; ?></td>
			</tr>
			<tr>
				<td><b>Nr Tel:</b></td>
				<td><?= $info[ 'nr_telefoni' ]; ?></td>
			</tr>
			<tr>
				<td><b>Ndertimi i trupit:</b></td>
				<td><?= $info[ 'ndertimi_trupit' ]; ?></td>
			</tr>
			<tr>
				<td><b>Adresa</b></td>
				<td><?= $info[ 'adresa' ]; ?></td>
			</tr>
			<tr>
				<td><b>Profesioni:</b></td>
				<td><?= $info[ 'profesioni' ]; ?></td>
			</tr>
			<tr>
				<td><b>Email:</b></td>
				<td><?= $info[ 'email' ]; ?></td>
			</tr>
		<tr>
			<td><b>Pesha:</b></td>
			<td><?= $info[ 'pesha' ]; ?></td>
		</tr>
		<tr>
			<td><b>Gjatesia:</b></td>
			<td><?= $info[ 'gjatesia' ]; ?></td>
		</tr>
		<tr>
			<td><b>IMT:</b></td>
			<td><?= $info[ 'imt' ]; ?></td>
		</tr>
		
			
				</tbody>
			</table>
		</div>

		<div class="col-md-3"></div>
	</div>
	

<script>
	function pastroGj(){
	document.getElementById( 'gjatesia' ).value = '';}
		function pastroP(){
		document.getElementById( 'pesha' ).value = '';}
	function pastroA(){
		document.getElementById( 'adresa' ).value = '';}
	function pastroT(){
		document.getElementById( 'tel' ).value = '';}
	function pastroE(){
		document.getElementById( 'email' ).value = '';}
	function pastroPass(){
		document.getElementById( 'password' ).value = '';
	}

</script>
	
<style>
	tr {font-size: 20px;}
</style>

<?php 
    
      if( isset( $_GET[ 'kot' ] ) )
      {
        echo "<script>
                  pastroGj();
                  pastroP();
                  pastroA();
                  pastroT();
                  pastroE();
                  pastroPass();

                  jQuery( '#updateform' ).hide();
              </script>";

          $div = '"<div class=\"alert alert-success text-center\"><strong>Success!</strong> Te dhenat u ndryshuan</div>"';

        echo "<script>
                  jQuery( '#content' ).html( ". $div ." );
              </script>";
      }
 ?>