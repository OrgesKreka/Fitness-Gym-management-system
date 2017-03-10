<?php 

    if( !isset( $_SESSION[ 'klient' ] ) )
    {
        header( 'Location: http://localhost:1234/palestra/index.php' );
        exit();
    }
?>
     

     <!--Paneli anesor-->
      <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="http://localhost:1234/palestra/Klient/klient.php" class="text-center"><i class="glyphicon glyphicon-home"></i> <span>Paneli i Anëtarit</span> <span class="sr-only">(current)</span></a></li>
            <li><a href="#"><i class="glyphicon glyphicon-envelope"></i><span>&nbsp; Inbox( 0 )</span></a></li>
            </ul>

        

          <ul class="nav nav-sidebar">
            
            <li><a href="http://localhost:1234/palestra/Instruktor/includes/instruktoret.php"><i class="glyphicon glyphicon-user"></i><span>&nbsp; Instruktorët</span></a></li>
            <li><a href="http://localhost:1234/palestra/_permbajtja/hiperlink/Keshilla.html"><i class="glyphicon glyphicon-thumbs-up"></i><span>&nbsp; Këshilla</span></a></li>
            <li><a href="http://localhost:1234/palestra/_permbajtja/hiperlink/dieta.html"><i class="glyphicon glyphicon-cutlery"></i><span>&nbsp; Dieta</span></a></li>
            <li><a href="http://localhost:1234/palestra/_permbajtja/hiperlink/Pajisjet.html"><i class="glyphicon glyphicon-scale"></i><span>&nbsp; Pajisjet</span></a></li>
            <li><a href="http://localhost:1234/palestra/_permbajtja/hiperlink/cmimet.html"><i class="glyphicon glyphicon-eur"></i><span>&nbsp; Çmimet</span></a></li>
            <li><a href="http://localhost:1234/palestra/Instruktor/includes/kalendar.php"><i class="glyphicon glyphicon-calendar"></i><span>&nbsp; Kalendari Sot</span></a></li>
            
          </ul>
		  </div>
		  
		  <!-- Permbajtja Dashboard -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="font-family:Impact;margin-left:250px;">
          <h1 class="page-header text-center" style="font-family:Arial Black;">Faqja Kryesore</h1>
        

<!-- Split button -->
<div class="btn-group"  style="margin-left:220px;">
    <button type="button" class="btn btn-primary btn-lg">Programi</button>
    <button type="button" class="btn btn-primary btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="caret"></span>
      <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" id="orari">
      <li id="1"><a>E hënë</a></li>
      <li role="separator" class="divider"></li>
      <li id="2"><a>E martë</a></li>
      <li role="separator" class="divider"></li>
      <li id="3"><a>E mërkurë</a></li>
      <li role="separator" class="divider"></li>
      <li id="4"><a>E enjte</a></li>
      <li role="separator" class="divider"></li>
      <li id="5"><a>E premte</a></li>
      <li role="separator" class="divider"></li>
      <li id="6"><a>E shtunë</a></li>
    </ul>
  
</div>
			
			
  <div class="btn-group">
  <button type="button" class="btn btn-success btn-lg">Shënime</button>
  <button type="button" class="btn btn-success btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="http://localhost:1234/palestra/Klient/includes/shenime.php">Shkruaj shënim</a></li>
    </ul></div>
	
	 <div class="btn-group">
  <button type="button" class="btn btn-warning btn-lg">Aktiviteti</button>
  <button type="button" class="btn btn-warning btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a>Kurset</a></li>
    <li role="separator" class="divider"></li>
	  <li><a>Programet</a></li>
	  <li role="separator" class="divider"></li>
	  <li><a href="http://localhost:1234/palestra/Klient/includes/oraret.php">Oraret</a></li>
	  
    </ul></div>
	
		 <div class="btn-group">
  <button type="button" class="btn btn-info btn-lg">Gallery</button>
  <button type="button" class="btn btn-info btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="#">Foto</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="http://localhost:1234/palestra/_permbajtja/hiperlink/video.html">Video</a></li>
    </ul></div>
	
	<div class="btn-group">
  <button type="button" class="btn btn-danger btn-lg">Palestra X</button>
  <button type="button" class="btn btn-danger btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="#">Facebook</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Instagram</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Twitter</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">YouTube</a></li>
  </ul>
</div>

<hr>
  
  <!-- Ketu do te shfaqet permbajtja e orareve / programeve-->
  <div id="permbajtja" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  </div>

</div>

</div>
</div>

<script>
  
  ///Per cdo klikim te listes ruan id dhe ben therritjen me ajax 
  ///per te marre orarin e dites perkatese
  jQuery( '#orari li' ).click( function()
    {
      var data = { "dita" : this.id };

      jQuery.ajax(
      {
        method: "POST",
        url: "http://localhost:1234/palestra/Klient/includes/orar_li.php",
        data: data,
        error: function( pergjigja )
        {
          alert( 'G A B I M ' );
        },
        success: function( pergjigja )
        {
          jQuery( '#permbajtja' ).html( pergjigja );

        }
      });
    });


  ///mesazhi sapo hapet profili
  jQuery( document ).ready( function()
  {
      var d = new Date();
      var dita = d.getDay();

      var data = { "dita": dita };

      jQuery.ajax(
      {
        method: "POST",
        url: "http://localhost:1234/palestra/Klient/includes/orar_ready.php",
        data: data,
        success: function( pergjigja )
        {
          jQuery( '#permbajtja' ).html( pergjigja );
        },
        error: function( pergjigja )
        {
          alert( 'G A B I M' );
        }
      });
    });
</script>


       