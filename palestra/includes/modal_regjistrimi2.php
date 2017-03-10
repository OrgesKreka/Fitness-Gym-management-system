<!-- Forma Modale e regjistrimit
                  per Instruktorin e palestres.
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


  <div class="modal fade" id="modalRegjistrimi2" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:15px 20px;">
          <button type="button" class="close" onclick="mbylli()">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Regjistrohu</h4>
        </div>
        <div class="modal-body" style="padding:30px 40px;">

          <!--Forma e regjistrimit me te dhenat e Instruktorit-->
          <form class="form-horizontal" method="POST" action="http://localhost:1234/palestra/includes/regjistro_instruktor.php" onsubmit="return kontrolloTeDhenaInstruktori();" enctype="multipart/form-data">
            <fieldset>

            <!-- Emri-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="emri_i"> Emri:</label>  
              <div class="col-md-6">
              <input id="emri_i" name="emri_i" type="text" placeholder="Emri" class="form-control input-md" required title="Emri eshte i detyrueshem">
              <p></p>
              </div>
              <span class="help-inline gabim" id="gi1"></span>
            </div>

            <!--Mbiemri-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="mbiemri_i">Mbiemri:</label>  
              <div class="col-md-6">
              <input id="mbiemri_i" name="mbiemri_i" type="text" placeholder="Mbiemri" class="form-control input-md" required="required">
                <p></p>
              </div>
              <span class="help-inline gabim" id="gi2"></span>
            </div>

            <!-- Gjinia-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="gjinia_i">Gjinia:</label>  
              <div class="col-md-6">
                <label class="radio-inline"><input type="radio" name="gjinia_i" value="F" checked="checked">Femer</label>
                <label class="radio-inline"><input type="radio" name="gjinia_i" value="M">Mashkull</label> 
              </div>
            </div>
            
            <br>
       

            <!-- Foto-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="foto_i">Foto profili:</label>
              <div class="col-md-6"> 
                <input type="file"  name="foto_i" id="foto_i">
                <p></p>
              </div>
            </div>

            <!-- Kodi regjistrimit -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="kodi_i">Kodi regjistrimit:</label>
              <div class="col-md-6"> 
                <input type="text" id="kodi_i" name="kodi_i" required="required" title="Kodi eshte i detyrueshem" class="form-control" placeholder="Kodi i dhene nga admini">
                <p></p>
              </div>
              <span class="help-inline gabim" id="gi4"></span>
            </div>

            <!-- Email -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="email_i">Email:</label>
              <div class="col-md-6">
                <input type="email" id="email_i" name="email_i" required="required" title="Adresa email eshte e detyrueshme" class="form-control" placeholder="Email">
                <p></p>
              </div>
              <span class="help-inline gabim" id="gi5"></span>
            </div>


            <div class="form-group">
              <label class="col-md-2 control-label" for="pass_i1">Fjalekalimi:</label>
              <div class="col-md-6">
                <input type="password" id="pass_i1" name="pass_i1" required="required" title="Fjalekalimi eshte i detyrueshem" class="form-control" placeholder="Fjalekalimi">
                <p></p>
              </div>
              <span class="help-inline gabim" id="gi6"></span>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="pass_i2">Konfirmo Fjalekalimin:</label>
              <div class="col-md-6">
                <input type="password" id="pass_i2" name="pass_i2" required="required" title="Konfirmo fjalekalimin per te shmagur gabimet" class="form-control" placeholder="perserisni fjalekalimin">
                <p></p>
              </div>
              <span class="help-inline gabim" id="gi7"></span>
            </div>

            <hr>
             <!-- Button -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="submit"></label>
              <div class="col-md-2">
                <button id="submit" name="submit_i" class="btn btn-success">Regjistrohu</button>
              </div>
              <div class="col-md-2">
                <button class="btn btn-primary pull-left" type="reset">Pastro</button>
              </div>
              <div class="col-md-2">
                <a class="btn btn-danger pull-right" onclick="mbylli()">Mbyll</a>
              </div>
            </div>

            </fieldset>
      </form>

        </div>
      </div>
    </div>
  </div>

  <script>

    ///Validon te dhenat e Instruktorit!
    function kontrolloTeDhenaInstruktori()
    {
      var emri = jQuery( '#emri_i' ).val();
      var mbiemri = jQuery( '#mbiemri_i' ).val();
      var kodi = jQuery( '#kodi_i' ).val();
      var pass1 = jQuery( '#pass_i1' ).val();
      var pass2 = jQuery( '#pass_i2' ).val();
      var email = jQuery( '#email_i' ).val();

      var emriSakte = true;
      var mbiemriSakte = true;
      var kodiSakte = true;
      var emailSakte = true;
      var p1 = true;
      var p2 = true;

      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

      ///Kontrollon nese emri ka vetem germa
      if( /^[a-zA-Z]+$/.test( emri ) == false )
      {
        jQuery( '#gi1' ).text( 'Emri duhet te permbaje vetem germa!' );

        emriSakte = false;
      }
      else
      {
        jQuery( '#gi1' ).text( '' );

        emriSakte = true;
      } 


      ///Kontrollon nese mbiemri ka vetem germa
      if( /^[a-zA-Z]+$/.test( mbiemri ) == false)
      {
        jQuery( '#gi2' ).text( 'Mbiemri duhet te permbaje vetem germa!' );
        mbiemriSakte = false;
      }
      else
      {
        jQuery( '#gi2' ).text( '' );
        mbiemriSakte = true;
      }


      ///Kodi duhet te jete me 8 karaktere
      if( kodi.length != 8 )
      {
        jQuery( '#gi4' ).text( 'Kod i pavlefshem!' );
        kodiSakte = false;
      }
      else
      {

        jQuery( '#gi4' ).text( '' );
        kodiSakte = true;
      }

      ///Kontrollon nese emaili eshte i vlefshem!
      if( ! filter.test( email ) )
      {
        jQuery( '#gi5' ).text( 'Email i pavlefshem!' );
        emailSakte = false;
      }
      else
      {
        jQuery( '#gi5' ).text( '' );
        emailSakte = true;
      }

      ///Fjalekalimi duhet te jete te pakten 4- karaktere
      if( pass1.length < 4 )
      {
        jQuery( '#gi6' ).text( 'Fjalekalimi duhet te kete te pakten 4 karaktere!' );
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
        jQuery( '#gi7' ).text( 'Fjalekalimet nuk perputhen!' );
      }
      else
      {
        p2 = true;
        jQuery( '#gi7' ).text( '' );
      }

      ///Pergjigja 
      var p = emriSakte && mbiemriSakte && kodiSakte && emailSakte && p1 && p2;

      return p;
    }///FUND


    ///Funksioni qe mbyll Formen modale
    function mbylli()
    {
      jQuery( '#modalRegjistrimi2' ).modal( 'hide' );
    }
  </script>
