<?php

$mysqli = new mysqli('localhost','root','','eksamensprojekt');
if ($mysqli->connect_error){
    die('error: '. $mysqli->connect_errorno. ' '. $mysqli->connect_error);
} 

?>