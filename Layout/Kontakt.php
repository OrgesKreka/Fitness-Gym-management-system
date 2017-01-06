<?php
	
	if( empty( $_POST ) === false)
	{

		$emri = $_POST[ 'emri' ];
		$email = $_POST[ 'email' ];
		$subjekt = $_POST[ 'subjekti' ];
		$mesazhi = $_POST[ 'mesazhi' ];


		$emriGabim = "";
		$emailiGabim = "";
		$mesazhiGabim = "";

		if( empty( $emri ) == true )
		{
			$emriGabim = "Emri eshte i detyrueshem!";
		}
		else if( ctype_alpha( $emri ) === false )
		{
			$emriGabim = "Emri duhet te permbaje vetem shkronja!";
		}



		if( empty( $email ) == true )
		{
			$emailiGabim = "Emaili eshte i detyrueshem!";
		}
		else if( filter_var( $email, FILTER_VALIDATE_EMAIL ) === false )
		{
			$emailiGabim = "Adrese e pavlefshme!";
		}


		if( empty( $mesazhi) == true )
		{
			$mesazhiGabim = "Mesazhi eshte i detyrueshem!";
		}

			

			


		if( empty( $emriGabim ) === true  && empty( $emailiGabim ) === true && empty( $mesazhiGabim ) === true )
		{	
			/// dergo emailin
			
			empty( $subjekti ) ? "Forme Kontakti" : $subjekti;

			mail( 'orges.kreka@fshnstudent.info', $subjekti, $mesazhi, 'From: ' . $email );

			header('Location: Kontakt.php?sent');
			exit();
			
		}

	} ///FUND if post


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Palestra X - Kontakt</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet"> 

    <style>

    	body
    	{
    		background-color: antiquewhite;
    		width: 100%;
    		height: 100%;
    		font-family: 'Roboto Slab', serif;
    	}
   

   		#wrapper
   		{
   			width: 100%;
   			height: 100%;
   			padding-left: 20%;
   			padding-top: 5%;
   			padding-bottom: 10%;
   		}

   		#p1
   		{	
   			width: 40%;
   			height: 100%;
   			display: inline-block;
   		}


   		#p2
   		{	
   			width: 40%;
   			height: 100%;
   			display: inline-block;
   			padding-left: 3%;
   		}
		
		
		/** Formatimi i hartes */
		.google-maps 
		{
	        position: relative;
	        padding-bottom: 75%; 
	        height: 0;
	        overflow: hidden;
    	}
    	.google-maps iframe
    	 {
	        position: absolute;
	        top: 0;
	        left: 0;
	        width: 100% !important;
	        height: 100% !important;
    	}

    </style>
  </head>
  <body>

	<?php if( isset( $_GET[ 'sent' ] ) === true )
		  {
		  	echo '<div class="alert alert-success" role="alert"> <strong>Faleminderit!</strong> <br> Do ju kontaktojme sa me pare. </div>';
		  }
		  else
		  {
	 ?>
			<div id="wrapper">
					
					<h1 style="text-align:center;">Kontakt</h1>
					<hr />

					<div id="p1">
						
						<!-- HARTA -->
						<div class="google-maps">
						    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d749.0192457979527!2d19.81577175712392!3d41.328939329300056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9772a53b8cd2eafc!2sQendra+Islame+%22Udha+e+Besimtareve%22!5e0!3m2!1sen!2s!4v1480959831598" style="border:0"></iframe>
						</div>
							
						<!-- Te dhenat -->
						<div class="tedhena">
							<h1><strong>Palestra X </strong>	</h1>
							<h4>Rruga: bla bla bla </h4>
							<h4>Tel: 123456789</h4>	
							<h4>Email: palestrax@domain.com</h4>
						</div>
					</div>

					<div id="p2">
						<p style="text-align:center;"><b>Për cdo paqartësi, sugjerim, pyetje apo ankesë, ju lutemi të na kontaktoni!</b></p>
		       			 <p style="text-align:center;"><b>* do të thotë që fusha është e detyrueshme të plotësohet</b></p>


		       			 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		       			 		
		       			 		 <div class="form-group">
								  	<label for="emri">*Emri:</label>
								  	<input type="text" class="form-control" name="emri" 
									  	<?php 
									  		if( isset( $_POST[ 'emri' ]) == true ){ echo "value=". strip_tags( $_POST[ 'emri' ] );}
									  	 ?> 
								  	 >

								  	<?php if( !empty( $emriGabim ) )echo '<div class="alert alert-danger" role="alert"><strong>GABIM!</strong> '. $emriGabim .'</div>' ?>
								</div>

								<div class="form-group">
								  	<label for="email">*Email:</label>
								  	<input type="text" class="form-control" name="email"
										<?php 
									  		if( isset( $_POST[ 'email' ]) == true ){ echo "value=". strip_tags( $_POST[ 'email' ] );}
									  	 ?>
								  	>
								  	<?php if( !empty( $emailiGabim ) ) echo '<div class="alert alert-danger" role="alert"><strong>GABIM!</strong>' . $emailiGabim . '</div>' ?>
								</div>

								<div class="form-group">
								  <label for="subjekt">Subjekti:</label>
								  <input type="text" class="form-control" name="subjekti">
								</div>
								

								 <div class="form-group">
								  	<label for="comment">*Mesazhi:</label>
								  	<textarea class="form-control" rows="5" name="mesazhi">
								  	</textarea>
								  	<?php if( !empty( $mesazhiGabim ) ) echo '<div class="alert alert-danger" role="alert"><strong>GABIM!</strong>'. $mesazhiGabim .'</div>' 
								  	?>
								</div>
								 
								<button type="submit" class="btn btn-default">Dërgo</button>			
						 </form>
					</div>

			</div>
	<?php } ?>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>