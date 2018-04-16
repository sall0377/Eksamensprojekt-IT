<?php
session_start();
if(!isset($_SESSION['wlID'])){
    $wlID=array();
    $_SESSION['wlID']=$wlID;
}
?>

<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Untitled Document</title>
    <link rel="stylesheet" href="/css/main.css">
  </head>

  <body>

    <?php
			if (count($_SESSION['wlID'])>0){
				include_once 'Connect.php';
				$query = "SELECT * FROM products WHERE ID IN(".implode(',', $_SESSION['wlID']) . ")";
				$results = $mysqli->query ( $query );
				print '<table class="oversigt">';
				print '<td>Vare</td>';
				print '<td>Pris</td>';
				while ( $row = $results->fetch_array () ) {
					print '<form action="til_wl.php" method="post"><tr>';
					print '<input type="hidden" name="wlID" value="' . $row ["ID"] . '">';
					print '<td><input style="width:90%;" type="text" name="Name" 
                    value="' . utf8_encode ( $row ["Name"] ) . '" disabled class="breddeoversigt"></td>';
					print '<td><input style="width:90%;" type="text" name="Price" 
                    value="' . $row ["Price"] . ' kr." disabled class="breddeoversigt"></td>';
					print '</form></tr>';
				}
				print '<td></td>';
				print '</table>';
				$results->free ();
				$mysqli->close ();
			} 
            else {
				echo "Der er ingen vare på ønskelisten endnu";
			}
            
            if(count($_SESSION['wlID'])>0){
                print '<input type="button" value="Ryd ønskeliste" onclick=window.location.href="tom_wl.php" class="knap">';
            }
    ?>
  </body>
</html>