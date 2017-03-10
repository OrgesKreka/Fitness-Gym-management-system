<?php 
        session_start();

        if( !isset( $_SESSION[ 'instruktor' ] ) )
        {
                header( 'Location: http://localhost:1234:1234/palestra/index.php' );
                exit();
        }
?>

<?php require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php'; ?>



<?php 
  
  
  ///Fshirja e nje shenimi
  if( isset( $_GET[ 'delete' ] ) )
  {
    $id = siguro( $_GET[ 'delete' ] );

    $sql_fshi = "DELETE FROM shenime WHERE shenim_id = '$id'"; 
    
      $db->query( $sql_fshi );
    

    header( "Location: http://localhost:1234:1234/palestra/Instruktor/includes/shenime.php?fshirja=true" );

  } 

      include 'header.php';
      include 'navigation.php';


    $sql = "SELECT * FROM shenime";
        $pergjigja = $db->query( $sql );


           
 ?>




<h1 class="page-header text-center">Shkruaj një Shënim</h1>

<div class="col-sm-offset-2 col-md-10  main">

<div class="form-group row col-md-6">

<!-- Forma e shtimit -->
   <form action="http://localhost:1234:1234/palestra/Instruktor/includes/shenimeQuery.php" method="POST" autocomplete="off">
        <div class="form-group col-md-6">
             <label for="titulli">Titulli:</label>
             <input type="text" class="form-control" id="titulli" name="titulli"><br>
             <label for="data">Data:</label>
             <input type="date" id="data" name="data" class="form-control" placeholder="Data"><br>
              <label for="comment">Shënim:</label>
                <textarea class="form-control" rows="20" id="comment" name="shenimet"></textarea>
       
                <input type="submit" class="btn btn-info pull-left" value="Ruaj">
                    <input type="reset" class="btn btn-info pull-right" value="Pastro" onclick="pastro()">
                    </div>
                    </form>
                    
</div>

<?php 
  
    if( isset( $_GET[ 'ruaj' ] ) )
    { 
      echo '
      <div class="alert alert-success col-md-6">
         <strong>Success!</strong> Shenimi u ruajt me Sukses!
      </div> ';
    }

 ?>

<!--Tabela e shenimeve-->
<div class="col-md-6">

        <legend  class="text-center">Shënimet Aktuale</legend>
        <table id="anetaret" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
                <tr class="bg-primary">
                        <th class="text-center">Shënimi</th>
                        <th class="text-center">Data</th>
                        <th class="text-center">Fshi Shënim</th>
                        
                </tr>
        </thead>
        
        <tbody>
                <?php while( $shenim = mysqli_fetch_assoc( $pergjigja ) ) : ?>
					<tr>
						<td class="text-center"><a href="http://localhost:1234:1234/palestra/Instruktor/includes/shenime.php?permbajtja=<?= $shenim[ 'shenim_id' ]; ?>"><?= $shenim[ 'titulli' ]; ?></a></td>
                        <td class="text-center"><?= $shenim[ 'data' ]; ?></td>
                        <td class="text-center"><a href="http://localhost:1234:1234/palestra/Instruktor/includes/shenime.php?delete=<?= $shenim[ 'shenim_id' ]; ?>" class="btn btn-danger"> <i class="glyphicon glyphicon-remove" ></i></a> &nbsp;</td>
                    </tr>
				<?php endwhile; ?>
        </tbody>
</table>
</div>

</div>

<!--  Forma modale e shikueshmerise se shenimit -->
<div class="modal fade" id="modalShenimi" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close"><span aria-hidden="true" onclick="mbyllFormen()">×</span> </button>
      <h3 class="modal-title text-center" id="lineModalLabel">Shënimi</h3>
    </div>
    <div class="modal-body">
      
		<p id="permbajtja_1"></p>


    </div>
    <div class="modal-footer text-center">
          <button type="button" class="btn btn-danger btn-block" role="button" onclick="mbyllFormen()">Mbyll</button>
    </div>
  </div>
  </div>
</div>


<?php	
	if( isset( $_GET[ 'permbajtja' ] ) )
	{
		$id = $_GET[ 'permbajtja' ];

		$sql = "SELECT * FROM shenime WHERE shenim_id = $id";

		$result = $db->query( $sql );

		$shenim = mysqli_fetch_assoc( $result );

		$permbajtja = $shenim[ 'permbajtja' ];

		echo "<script>
				jQuery( '#modalShenimi' ).modal( 'show' );
				jQuery( '#permbajtja_1' ).text( '" . $permbajtja. "' );
				</script>";
	}
?>




<script>
      

        function mbyllFormen()
        {
                jQuery( '#modalShenimi' ).modal( 'hide' );
        }
</script>
