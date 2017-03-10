<?php 
        session_start();

        if( !isset( $_SESSION[ 'instruktor' ] ) )
        {
                header( 'Location: http://localhost:1234/palestra/index.php' );
                exit();
        }
?>

<?php require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php'; ?>

<?php 
    

  $singer = siguro( $_POST[ 'autori' ] );
  $title  = siguro( $_POST[ 'title' ] );
  $url = siguro( $_POST[ 'url' ] );

    
  $query_update = "INSERT  INTO kenge(autori, titulli, link  )VALUES('$singer', '$title', '$url'  )";
  $foo = $db->query( $query_update );

   
            header( "Location: http://localhost:1234/palestra/Instruktor/includes/music.php?regjistro=true" );
        
?>