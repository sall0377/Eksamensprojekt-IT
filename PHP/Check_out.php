<?php
session_start();
if(!isset($_SESSION['ID'])){
    $ID=array();
    $_SESSION['ID']=$ID;
    $Antal=array();
    $_SESSION['Antal']=$Antal;
}
?>

<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Kurv</title>
    <link rel="stylesheet" href="/css/main.css">
  </head>

  <body>

    <?php
			if (count($_SESSION['ID'])>0){
				$Antal = array ();
				for($i = 0; $i < count ( $_SESSION ['ID'] ); ++ $i) {
					array_push ( $Antal, $_SESSION ['Antal'] [$i] );
            }				
            $ialt = 0;
            $i = 0;
            include_once 'Connect.php';
            $query = "SELECT * FROM products WHERE ID IN(".implode(',', $_SESSION['ID']) . ")";
            $results = $mysqli->query ( $query );
            print '<table class="oversigt">';
            print '<td>Vare</td>';
            print '<td>Pris</td>';
            print '<td>Antal</td>';
            while ( $row = $results->fetch_array () ) {
                print '<form action="Put_i_kurv.php" method="post"><tr>';
                print '<input type="hidden" name="ID" value="' . $row ["ID"] . '">';
                print '<td><input style="width:90%;" type="text" name="Name" 
                value="' . utf8_encode ( $row ["Name"] ) . '" disabled class="breddeoversigt"></td>';
                print '<td><input style="width:90%;" type="text" name="Price" 
                value="' . $row ["Price"] . ' kr." disabled class="breddeoversigt"></td>';
                print '<td><input style="width:90%;" type="text" name="Antal" id="Antal" 
                value="' . $Antal [$i] . '" disabled class="breddeoversigt"></td>';
                $ialt = $ialt + str_replace ( "'", '', $row ['Price'] ) * $Antal [$i];
                $i ++;
                print '</form></tr>';
            }
            print '<td></td>';
            print '<td>Ialt:</td>';
            print '<td><input type="hidden" name="beloeb" id="beloeb" value="' . $ialt . '">' . $ialt . ' kr.</td>';
            print '</table>';
            $results->free ();
            $mysqli->close ();
            } 
            else {
            echo "Der er ingen vare i indøbskurven endnu";
            }
    ?>
  </body>
</html>