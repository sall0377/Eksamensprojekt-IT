<?php
    if(count($_SESSION['ID'])>0){
        echo "Du har ".array_sum($_SESSION['Antal'])." varer i din kurv";
    }
    else{
        echo "Der er ingen varer i kurven";
    }

?>