           
              <!-- Forma Modale e regjistrimit
                  per anetarin e palestres.
                  Kjo forme do te kete kushtet specifike per tu ruajtur ne tabelen perdorues
                  si anetar i thjeshte..
              -->
<style>
    .form-group
    {
      margin-bottom:5px !important; 
    } 

    .gabim
    {
      color: red;
      font-size: 16px;
    } 
</style>


  <div class="modal fade" id="modalRegjistrimi1" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:15px 20px;">
          <button type="button" class="close" onclick="mbyll()">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Regjistrohu</h4>
        </div>
        <div class="modal-body" style="padding:30px 40px;">

          <!--Forma e regjistrimit me te dhenat e antarit-->
          <form class="form-horizontal" method="POST" action="http://localhost:1234/palestra/includes/regjistro_anetar.php" onsubmit="return kontrolloTeDhenat();" enctype="multipart/form-data">
            <fieldset>

            <!-- Emri-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="emri_a"> Emri:</label>  
              <div class="col-md-6">
              <input id="emri_a" name="emri_a" type="text" placeholder="Emri" class="form-control input-md" required title="Emri eshte i detyrueshem">
              <p></p>
              </div>
              <span class="help-inline gabim" id="g1"></span>
            </div>

            <!--Mbiemri-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="mbiemri_a">Mbiemri:</label>  
              <div class="col-md-6">
              <input id="mbiemri_a" name="mbiemri_a" type="text" placeholder="Mbiemri" class="form-control input-md" required="required">
                <p></p>
              </div>
              <span class="help-inline gabim" id="g2"></span>
            </div>

            <!-- Gjinia-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="gjinia_a">Gjinia:</label>  
              <div class="col-md-6">
                <label class="radio-inline"><input type="radio" name="gjinia_a" value="F" checked="checked">Femer</label>
                <label class="radio-inline"><input type="radio" name="gjinia_a" value="M">Mashkull</label> 
              </div>
            </div>
            <br>
            <!--Konstrukti trupit-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="ndertimi">Ndertimi Trupit:</label>  
              
              <div class="col-md-6">
                  <select name="ndertimi" id="ndertimi" class="form-control input-md">
                    <option value="1">Endomorf</option>
                    <option value="2">Mezomorf</option>
                    <option value="3">Ektomorf</option>
                  </select>  
              </div>
            </div>
            <br>
            <!--Gjatesia-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="gjatesia">Gjatesia ne cm:</label>  
              <div class="col-md-6">
              <input id="gjatesia" name="gjatesia" type="number" min="50" max="250" placeholder="Gjatesia" class="form-control input-md" required="required" title="Gjatesia eshte e detyrueshme">
              <p></p>
              </div>
            </div>
            <!--Pesha-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="pesha">Pesha ne kg:</label>  
              <div class="col-md-6">
              <input id="pesha" name="pesha" type="text" placeholder="Pesha" required="required" class="form-control input-md">
                <p></p>
              </div>
              <span class="help-inline gabim" id="g3"></span>
            </div>



            <!-- Foto-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="foto_a">Foto profili:</label>
              <div class="col-md-6"> 
                <input type="file"  name="foto_a" id="foto_a">
                <p></p>
              </div>
            </div>

            <!-- Kodi regjistrimit -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="kodi_a">Kodi regjistrimit:</label>
              <div class="col-md-6"> 
                <input type="text" id="kodi_a" name="kodi_a" required="required" title="Kodi eshte i detyrueshem" class="form-control" placeholder="Kodi i dhene nga admini">
                <p></p>
              </div>
              <span class="help-inline gabim" id="g4"></span>
            </div>

            <!-- Email -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="email_a">Email:</label>
              <div class="col-md-6">
                <input type="email" id="email_a" name="email_a" required="required" title="Adresa email eshte e detyrueshme" class="form-control" placeholder="Email">
                <p></p>
              </div>
              <span class="help-inline gabim" id="g5"></span>
            </div>


            <div class="form-group">
              <label class="col-md-2 control-label" for="pass_a1">Fjalekalimi:</label>
              <div class="col-md-6">
                <input type="password" id="pass_a1" name="pass_a1" required="required" title="Fjalekalimi eshte i detyrueshem" class="form-control" placeholder="Fjalekalimi">
                <p></p>
              </div>
              <span class="help-inline gabim" id="g6"></span>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="pass_a2">Konfirmo Fjalekalimin:</label>
              <div class="col-md-6">
                <input type="password" id="pass_a2" name="pass_a2" required="required" title="Konfirmo fjalekalimin per te shmagur gabimet" class="form-control" placeholder="perserisni fjalekalimin">
                <p></p>
              </div>
              <span class="help-inline gabim" id="g7"></span>
            </div>

            <hr>
            <!-- Button -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="submit"></label>
              <div class="col-md-2">
                <button id="submit" name="submit_a" class="btn btn-success">Regjistrohu</button>
              </div>
              <div class="col-md-2">
                <button class="btn btn-primary pull-left" type="reset">Pastro</button>
              </div>
              <div class="col-md-2">
                <a class="btn btn-danger pull-right" onclick="mbyll()">Mbyll</a>
              </div>
            </div>

            </fieldset>
      </form>

        </div>
      </div>
    </div>
  </div>

  <script>

    ///Valdion te dhenat e anetarit!
    function kontrolloTeDhenat()
    {
      var emri = jQuery( '#emri_a' ).val();
      var mbiemri = jQuery( '#mbiemri_a' ).val();
      var pesha = jQuery( '#pesha' ).val();
      var kodi = jQuery( '#kodi_a' ).val();
      var pass1 = jQuery( '#pass_a1' ).val();
      var pass2 = jQuery( '#pass_a2' ).val();
      var email = jQuery( '#email_a' ).val();

      var emriSakte = true;
      var mbiemriSakte = true;
      var peshaSakte = true;
      var kodiSakte = true;
      var emailSakte = true;
      var p1 = true;
      var p2 = true;

      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

      ///Kontrollon nese emri ka vetem germa
      if( /^[a-zA-Z]+$/.test( emri ) == false )
      {
        jQuery( '#g1' ).text( 'Emri duhet te permbaje vetem germa!' );

        emriSakte = false;
      }
      else
      {
        jQuery( '#g1' ).text( '' );

        emriSakte = true;
      } 


      ///Kontrollon nese mbiemri ka vetem germa
      if( /^[a-zA-Z]+$/.test( mbiemri ) == false)
      {
        jQuery( '#g2' ).text( 'Mbiemri duhet te permbaje vetem germa!' );
        mbiemriSakte = false;
      }
      else
      {
        jQuery( '#g2' ).text( '' );
        mbiemriSakte = true;
      }

      ///Kontrollon nese pesha eshte numer
      if( /^\d+$/.test( pesha ) == false)
      {
        jQuery( '#g3' ).text( 'Pesha duhet te jete numer!' );
        peshaSakte = false;
      }
      else
      {
        jQuery( '#g3' ).text( '' );
        peshaSakte = true;
      }

      ///Kodi duhet te jete me 8 karaktere
      if( kodi.length != 8 )
      {
        jQuery( '#g4' ).text( 'Kod i pavlefshem!' );
        kodiSakte = false;
      }
      else
      {

        jQuery( '#g4' ).text( '' );
        kodiSakte = true;
      }

      ///Kontrollon nese emaili eshte i vlefshem!
      if( ! filter.test( email ) )
      {
        jQuery( '#g5' ).text( 'Email i pavlefshem!' );
        emailSakte = false;
      }
      else
      {
        jQuery( '#g5' ).text( '' );
        emailSakte = true;
      }

      ///Fjalekalimi duhet te jete te pakten 4- karaktere
      if( pass1.length < 4 )
      {
        jQuery( '#g6' ).text( 'Fjalekalimi duhet te kete te pakten 4 karaktere!' );
        p1 = false;
      }
      else
      {
        jQuery( '#g6' ).text( '' );
        p1 = true;
      }


      ///Kontrollon nese fjalekalimi i konfirmuar ka gjatesi te pakten 4 dhe eshte i njejte me te parin
      if( pass2.length < 4 || pass2 !== pass1 )
      {
        p2 = false;
        jQuery( '#g7' ).text( 'Fjalekalimet nuk perputhen!' );
      }
      else
      {
        p2 = true;
        jQuery( '#g7' ).text( '' );
      }

      ///Pergjigja 
      var p = emriSakte && mbiemriSakte && peshaSakte && kodiSakte && emailSakte && p1 && p2;

      return p;
    }


    ////Funksioni qe mbyll formen modale
    function mbyll()
    {
      jQuery( '#modalRegjistrimi1' ).modal( 'hide' );
    }
  </script>
