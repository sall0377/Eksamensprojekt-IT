<?php
    if(count($_SESSION['wlID'])>0){
        echo "Du har varer på din ønskeliste";
    }
    else{
        echo "Der er ingen varer i kurven";
    }

?>