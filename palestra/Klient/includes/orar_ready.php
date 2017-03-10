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
   
   $dita = $_POST[ 'dita' ];
    $id = $_SESSION[ 'klient' ];

        $tabela = '';
 
        $ditet = array( 'E Hene', 'E Marte', 'E Merkure', 'E Enjte', 'E Premte', 'E Shtune', 'E Diele' );
        
        $sql0 = "SELECT * FROM ndjek_kurse WHERE antar_id = $id";
        $result0 = $db->query( $sql0 );


        ///Nese ky klient ndjek ndonje kurs
        if( mysqli_num_rows( $result0 ) > 0 )
        {
            $row0 = mysqli_fetch_assoc( $result0 );

                $k_id = $row0[ 'kurs_id' ];
                $sql = "SELECT * FROM oraret WHERE dita_id = $dita AND kurs_id = $k_id";
                $result = $db->query( $sql );
                



                ///Nese ka program
                if( mysqli_num_rows( $result ) > 0 )
                {
                    $row = mysqli_fetch_assoc( $result );
         
                    $kurs_id = $row[ 'kurs_id' ];
                    

                    $ora_aktuale = date( 'H:i:s' );
                    $ora_fillimit = $row[ 'ora_fillimit' ];


                    ///Nese profili hapet para ores se fillimit te kursit
                    if( $ora_aktuale < $ora_fillimit )
                    {
                        $sql2 = "SELECT * FROM programet WHERE kurs_id = $kurs_id";
                        $result2 = $db->query( $sql2 );
             
                   
                        $row2 = mysqli_fetch_assoc( $result2 );
             
             
                        $sql3 = "SELECT lloji_kursit FROM kurse WHERE kurs_id = $kurs_id";
                        $result3 = $db->query( $sql3 );
                        $row3 = mysqli_fetch_assoc( $result3 );
                        $emri = $row3[ 'lloji_kursit' ];
             
                        $program = $row2[ 'programi' ];
             
                        $foo =  explode( '/', $program );
             
                            $tabela .= "<table width=\"100%\" id='orar' class=\"table table-striped table-bordered\" cellspacing=\"0\">";
             
                            $tabela .= "<thead>
                                            <tr class='bg-primary'>
                                                <th class='text-center'>". $ditet[ $dita-1 ]."</th>
                                            </tr>
                                            <tr>
                                                <th class='text-center'> <strong>". $emri ."</strong> </th>
                                                <th class='text-center' data-id='".$row[ 'ora_fillimit' ]."'><strong>". $row[ 'ora_fillimit' ]. " - ". $row[ 'ora_perfundimit' ]."</strong></th>
                                            </tr>
                                        </thead>";
             
                            $tabela .= "<tbody>";
             
                            foreach ( $foo as $tmp )
                            {  
                                $tabela .= "<tr>
                                            <td class='text-center'>" .$tmp. "</td>
                                            </tr>";
                            }
             
                        $tabela .= '</tbody> </table>';
                    }///FUND if
                    else /// Nese profili hapet pas ores se fillimit te kursit
                    {
                        $tabela = "<div class='alert alert-danger text-center'>
                                         <strong>KUJDES!</strong> Kursi ka filluar tashme!.
                                    </div>";
                    }///FUND if
                }
                else
                {
                    $tabela .= "<table width=\"100%\" id='orar' class=\"table table-striped table-bordered\" cellspacing=\"0\">";
         
                        $tabela .= "<thead>
                                        <tr class='bg-primary'>
                                            <th class='text-center'>". $ditet[ $dita-1 ]."</th>
                                        </tr>
                                    </thead>";
         
                        $tabela .= "<tbody>
                                        <tr class='danger'>
                                            <td class='text-center'>Pushim</td>
                                        </tr>
                                    </tbody>
                                    </table>";
                }
                    

                

                    echo $tabela;
}

 ?>