
     <?php 

    if( !isset( $_SESSION[ 'instruktor' ] ) )
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
            <li class="active"><a href="http://localhost:1234/palestra/Instruktor/instruktor.php" class="text-center"><i class="glyphicon glyphicon-home"></i> <span>Paneli i Instruktorit</span> <span class="sr-only">(current)</span></a></li>
            <li><a href="#"><i class="glyphicon glyphicon-envelope"></i><span>&nbsp; Inbox( 0 )</span></a></li>
            </ul>

        

          <ul class="nav nav-sidebar">
            
            <li><a href="http://localhost:1234/palestra/Instruktor/includes/instruktoret.php"><i class="glyphicon glyphicon-user"></i><span>&nbsp; Instruktoret</span></a></li>
            <li><a href="http://localhost:1234/palestra/Instruktor/includes/music.php"><i class="glyphicon glyphicon-headphones"></i><span>&nbsp; Playlist</span></a></li>
            <li><a href="http://localhost:1234/palestra/_permbajtja/hiperlink/Pajisjet.html"><i class="glyphicon glyphicon-scale"></i><span>&nbsp; Pajisjet</span></a></li>
            <li><a href="http://localhost:1234/palestra/Instruktor/includes/kalendar.php"><i class="glyphicon glyphicon-calendar"></i><span>&nbsp; Kalendari Sot</span></a></li>
            
          </ul>
		  </div>


    <!-- Permbajtja Dashboard -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="font-family:Impact;margin-left:250px;">
          <h1 class="page-header text-center">Faqja Kryesore</h1>
        </div>
         
           
            <div class="table-for-structure">
            
             
             <a href="http://localhost:1234/palestra/Instruktor/includes/oraret.php"><img src="http://localhost:1234/palestra/_permbajtja/social/oraret.png" style="width:15%;height:15%;margin-left:300px;margin-top:60px;"></a>
            <a href="http://localhost:1234/palestra/Instruktor/includes/dieta.html"><img src="http://localhost:1234/palestra/_permbajtja/social/dieta.png" style="width:15%;height:15%;margin-left:70px;margin-top:60px;"></a>
             <a href="http://localhost:1234/palestra/Instruktor/includes/shenime.php"><img src="http://localhost:1234/palestra/_permbajtja/social/note3.png" style="width:15%;height:15%;margin-left:70px;margin-top:60px;"></a> 
              <a href="http://localhost:1234/palestra/Instruktor/includes/music.php"><img src="http://localhost:1234/palestra/_permbajtja/social/music.png" style="width:15%;height:15%;margin-left:70px;margin-top:60px;"></a> 
            
            </div>
            <div class="table-test">
                <table border="0" style="margin-left:180px;text-align:center;border-collapse:separate;
            border-spacing: 190px 0px;">
                    <tr><td><h2 style="font-family:Impact;font-size:30px;">ORARET</h2></td><td><h2 style="font-family:Impact;font-size:30px;">DIETA</h2></td><td><h2 style="font-family:Impact;font-size:30px;">SHËNIME</h2></td><td><h2 style="font-family:Impact;font-size:30px;">MUSIC</h2></td></tr>
                </table>
            </div>
                

       