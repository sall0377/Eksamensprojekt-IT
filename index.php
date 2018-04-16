<?php
session_start(); //Vi starter en session, der følger en mens browseren er åben
//Hvis vi ikke allerede har en session laver vi en tomme
if(!isset($_SESSION['ID'])){
    $ID=array();
    $_SESSION['ID']=$ID;
    $Antal=array();
    $_SESSION['Antal']=$Antal;
    $wlID=array();
    $_SESSION['wlID']=$wlID;
}
?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Eksamensprojekt</title>
    <!--<link rel="stylesheet" href="CSS/style.css" />-->
    <style type="text/css"> 
        body{
            height: 100%;
            background-color: red;

        }
        @media only screen
        and (min-width: 961px)
        and (orientation: landscape){

        #wrapper {
            margin: 0px auto;
            margin-left: auto;
            margin-right: auto;
            min-height: 98%;
            width: 99%;
            background-color: blue;
            position: absolute;
        }

        #header {
            width: 100%;
            height: 15%;
            background-color: green;
            margin-left: auto;
            margin-right: auto;
            position: absolute;
            display: block;
        }

        #logo {
            width: 25%;
            height: 100%;
            display: block;
            margin-left: auto;
            margin-left: 2.5%;
            margin-right: auto;
            float: left;
        }

        #buttons {
            float: right;
            width: 25%;
            background-color: purple;
            display: block;
            height: 80%;
            margin-top: 0.6%;
            margin-bottom: 10%;
            position: relative;
        }

        .knap {
            width: auto;
            margin-left: auto;
            margin-right: auto;
            margin-top: 6%;
            background-color: yellow;
            font-size: 1.3em;
            display: inline-block;
        }

        #menu {
            width: 90%;
            height: 5%;
            position: absolute;
            margin-left: 5%;
            margin-right: auto;
            margin-top: 7.5%;
            display: block;
            background-color: red;
        }

        #content{
            width: 90%;
            height: auto;
            position: absolute;
            margin-left: 5%;
            margin-right: auto;
            margin-top: 10%;
            display: block;
            background-color: purple;    
        }

        .vare{
            width: auto;
            display: inline-block;
        }
        fieldset{
            border: none;
        }

        #vare{
            border-style: solid;
            width: auto;
            display: inline-block;
        }

        h1{
            margin-left: 65%;
        }

        #varebillede{
            width: 100px;
            height: 100px;
            margin-left: 65%;
        }
    
}
   
        
      </style>
  </head>

    <body>
        <div id="wrapper"> 
            <div id="header">
                <img src="Billeder/x.jpg" id="logo">
            
                <?php
                include_once 'PHP/Vis_varer.php';

                //Se om der er tilføjet noget til kurven
                if(count($_SESSION['ID'])>0){
                    print '<input type="button" value="Tøm kurv" onclick=window.location.href="PHP/tom_kurv.php" class="knap">';
                }

                //Tjek om brugeren er logget ind (hvis de tilhørende knapper)
                if(isset($_SESSION['USER'])){
                    echo "&nbsp Du er logget ind som: ";
                    echo $_SESSION['USER'];
                    print '<div id="buttons">';
                    print '<input type="button" value="Log ud" onclick=window.location.href="PHP/Log_ud.php" class="knap">';
                    print '<input type="button" value="Ønskeliste" onclick=window.location.href="PHP/Wish_list.php" class="knap">';
                    print '<input type="button" value="Kurv" onclick=window.location.href="PHP/Check_out.php" class="knap">';
                    print '</div>';
                }
                else{
                    print '<div id="buttons">';
                    print '<input type="button" value="Log ind" onclick=window.location.href="PHP/Log_in.php" class="knap">';
                    print '<input type="button" value="Sign up" onclick=window.location.href="PHP/Sign_up.php" class="knap">';
                    print '<input type="button" value="Ønskeliste" onclick=window.location.href="PHP/Wish_list.php" class="knap">';
                    print '<input type="button" value="Kurv" onclick=window.location.href="PHP/Check_out.php" class="knap">';
                    print '</div>';
                }

                //Tjek om brugeren er "Admin"
                 if(isset($_SESSION['USER'])&&$_SESSION['USER']=="Admin"){
                    print '<input type="button" value="Tilføj ny vare" onclick=window.location.href="PHP/Ny_vare.php">';
                }
                ?>
            
            </div>
            <div id="menu">
            </div>
            <div id="content">
                <div id="vare">
                    <form action="PHP/Put_i_kurv.php" method="POST" class="vare">
                        <h1>Vare1</h1>
                        <img src="Billeder/x.jpg" id="varebillede">    
                        <fieldset>
                            <input type="hidden" value="1" name="ID">
                            <input type="number" name="Antal" id="Antal" min="1" max="10" value="1">
                        </fieldset>
                        <fieldset>
                            <input type="submit" value="Put i kurv">
                        </fieldset>
                    </form>
                    <form action="PHP/til_wl.php" method="POST" class="vare">
                        <input type="hidden" value="1" name="wlID">
                        <input type="submit" value="Tilføj til ønskeliste">
                    </form>
                </div>
           
                <div id="vare">
                <form action="PHP/Put_i_kurv.php" method="POST" class="vare">
                    <h1>Vare2</h1>
                    <img src="Billeder/x.jpg" id="varebillede">    
                    <fieldset>
                        <input type="hidden" value="2" name="ID">
                        <input type="number" name="Antal" id="Antal" min="1" max="10" value="1">
                    </fieldset>
                    <fieldset>
                        <input type="submit" value="Put i kurv">
                    </fieldset>
                </form>
                <form action="PHP/til_wl.php" method="POST" class="vare">
                    <input type="hidden" value="2" name="wlID">
                    <input type="submit" value="Tilføj til ønskeliste">
                </form>
              </div>
          </div>
      </div> 
  </body>
</html>