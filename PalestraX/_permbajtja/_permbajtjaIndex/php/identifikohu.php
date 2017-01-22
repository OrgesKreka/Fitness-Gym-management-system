<?php 

	require_once '../../../baza_te_dhenave/database_handler.php';

	$email = $_POST[ 'email' ];

	$fjalekalim = $_POST[ 'fjalekalimi' ];

	$sql = "SELECT * FROM perdorues WHERE email = '$email' AND fjalekalim = '$fjalekalim'";

	$result = $db->query( $sql );

	$tmp = mysqli_fetch_assoc( $result );

	
	 if( count( $tmp ) == 0 ) 
	{
	

			$forma = '
			<!-- Forma Modale e Identifikimit-->
	      <div class="modal fade" id="modalIdentifikimi" role="dialog">
	        <div class="modal-dialog">

	          <div class="modal-content">
	            <div class="modal-header" style="padding:35px 50px;">
	              <button type="button" class="close" data-dismiss="modal">&times;</button>
	              <h4><span class="glyphicon glyphicon-lock"></span> Identifikohu</h4>
	            </div>
	            <div class="modal-body" style="padding:40px 50px;">

	                                     <!--Forma-->
	              <form role="form" method="POST" action="_permbajtja/_permbajtjaIndex/php/identifikohu.php" onsubmit="return verifiko()">
	     
	                  <div class="form-group" id="divEmaili">
	                     <label class="control-label" for="email">Email:</label>
	                      <input type="text" class="form-control required" id="email" name="email" placeholder="Jepni emailin" aria-describedby="helpBlock2">
	                      <span id="helpBlock2" class="help-block"></span>
	                  </div>

	                  <div class="form-group" id="divFjalekalimi">
	                     <label class="control-label" for="email">Fjalekalimi:</label>
	                      <input type="password" class="form-control required" id="fjalekalimi" name="fjalekalimi" placeholder="Jepni Fjalekalimin" aria-describedby="helpBlock3">
	                      <span id="helpBlock3" class="help-block"></span>
	                  </div>

	                  <div class="form-group"><label id="gabim">'.'Ky perdorues nuk ekziston'.'</label></div>

	                    <button type="submit" class="btn btn-success btn-block" name="identifikohu"><span class="glyphicon glyphicon-off"></span> Identifikohu</button>
	              </form>
	            </div>


	            <div class="modal-footer">
	              <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Anulo</button>
	            </div>
	          </div>
	          
	        </div>
	      </div> 
	    </div>';

	    echo $forma;
	  }
	else
	{	
		echo "1";
		header("Location:../../../admin/admin.php");
	}
?>
 