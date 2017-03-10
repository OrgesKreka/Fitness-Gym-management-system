<?php 
        session_start();

        if( !isset( $_SESSION[ 'klient' ] ) )
        {
                header( 'Location: http://localhost:1234/palestra/index.php' );
                exit();
        }
?>

<?php require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php'; ?>

<?php 
    $id = $_SESSION[ 'klient' ];

  $title = siguro( $_POST[ 'titulli' ] );
  $date  = siguro( $_POST[ 'data' ] );
  $text = siguro( $_POST[ 'shenimet' ] );
    
  $query_update = "INSERT  INTO shenimeklient(titulli, data, permbajtja, klient_id  )VALUES('$title', '$date', '$text', '$id'  )";
  $foo = $db->query( $query_update );

   
            header( "Location: http://localhost:1234/palestra/Klient/includes/shenime.php?ruaj=true" );
        
?>

