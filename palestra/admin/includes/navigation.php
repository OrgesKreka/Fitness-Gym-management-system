<?php 

    if( !isset( $_SESSION[ 'admin' ] ) )
    {
        header( 'Location: http://localhost:1234/palestra/index.php' );
        exit();
    }
 ?>

<?php require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php'; ?>

<?php 
        $id = ( int )$_SESSION[ 'admin' ];
        $id = siguro( $id );

        $sql = "SELECT * FROM perdorues WHERE perdorues_id = $id";
        $pergjigja = $db->query( $sql );

        $person = mysqli_fetch_assoc( $pergjigja );
 ?>

<nav role="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" data-target="#myNavbar" data-toggle="collapse" class="navbar-toggle">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../index.php">Palestra X</a>
    </div>
    
    <div class="collapse navbar-collapse" id="myNavbar">
           <ul class="nav navbar-nav">
                <li><a href="http://localhost:1234/palestra/admin/includes/kurset.php">Kurset</a></li>
                <li><a href="http://localhost:1234/palestra/admin/includes/anetaret.php" target="_self">Anëtarët</a></li>
                <li><a href="http://localhost:1234/palestra/admin/includes/instruktoret.php" target="_self">Instruktorët</a></li>
                <li><a href="http://localhost:1234/palestra/admin/includes/administratoret.php" target="_self">Administratorët</a></li>  
            </ul>
      </ul>
      
      <ul class="nav navbar-nav pull-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <div class="img-rounded profile-img"></div>
                        <?php echo $person[ 'emri' ].' '.$person[ 'mbiemri' ]; ?> &nbsp;
                        <img src="<?= $person[ 'foto_profili' ]; ?>" alt="" class="img-rounded profile-img"><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">Përditëso Profilin</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="http://localhost:1234/palestra/admin/includes/dil.php" name="mbyll">Dil</a>
                        </li>
                    </ul>
                </li>
            </ul>
    </div>
  </div>
</nav>