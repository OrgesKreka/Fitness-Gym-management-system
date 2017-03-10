<nav role="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" data-target="#myNavbar" data-toggle="collapse" class="navbar-toggle">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Palestra X</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Kryefaqja</a></li>
        <li><a href="#">Forumi</a></li>
        <li><a href="_permbajtja/hiperlink/about.html">Rreth Nesh</a></li>
        <li><a href="http://localhost:1234/palestra/includes/Kontakt.php" target="_blank">Kontakt</a></li>
      </ul>
      
      <!-- Fomra e kerkimit -->
      <form class="navbar-form navbar-left" method="POST" action="http://localhost:1234/palestra/search_includes/kerko.php">
        <div class="form-group" id="kerko">
          <input type="text" class="form-control" placeholder="Kërko diçka..." list="sugjerime" id="vlera_kerkuar" name="vlera_kerkuar" aria-describedby="nuk_gjendet" onkeyup="shfaqSugjerime()">

          <datalist id="sugjerime">
          </datalist>

        </div>
        <button type="submit" class="btn btn-default" name="submit_kerko">Vazhdo</button>
        <div class="has-error">
          <span id="nuk_gjendet" class="help-block text-center"></span>
        </div>
    </form>

    <!--Butonat e identifikimit dhe regjistrimit -->
      <ul class="nav navbar-nav navbar-right">
        <li><a  id="regjistrohu" style="cursor: pointer" onclick="modalZgjedhje()"><span class="glyphicon glyphicon-user"></span>Regjistrohu</a></li>
        <li><a id="identifikohu" onclick="hapFormenModale()" style="cursor: pointer"><span class="glyphicon glyphicon-log-in"></span>Identifikohu</a></li>
      </ul>
    </div>
  </div>
</nav>


 <!-- Modali i zgjedhjes -->
  <div class="modal fade" id="modalZgjedhje" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" onclick="mbyllZgjedhjen()">&times;</button>
          <h4 class="modal-title">LLoji Perdoruesit</h4>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Regjistrohu si: </h3>
          
          <br><br>

          <div class="col-sm-6">
            <button class="btn btn-primary" onclick="shfaqFormeRegjistrimi( 1 )">Anetar</button>
          </div>
          <div class="col-sm-6">
            <button class="btn btn-primary" onclick="shfaqFormeRegjistrimi( 2 )">Instruktor</button>
          </div>
        </div>
        <div class="modal-footer">
            <br>
            <br>
          <button type="button" class="btn btn-danger" onclick="mbyllZgjedhjen()">Mbyll</button>
        </div>
      </div>
    </div>
  </div>
</div>


<script> 
  ///Funksioni qe shfaq modalin e zgjedhjes kur klikohet mbi regjistrohu
  function modalZgjedhje()
  {
    jQuery( '#modalZgjedhje' ).modal( 'show' );
  }


  ///Funksioni qe mbyll modalin e zgjedhjes
  function mbyllZgjedhjen()
  {
    jQuery( '#modalZgjedhje' ).modal( 'hide' );
  }

</script>