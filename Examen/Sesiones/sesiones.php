<?php
session_start();
if(isset($_GET["magic"])){
    echo $_GET["magic"];
}
if (isset($_SESSION["visitas"])) {
    $_SESSION["visitas"] += 1;
    
    echo "visitas: " . $_SESSION["visitas"];
    echo $_SESSION["usuario"];
    if ($_SESSION["visitas"] == 50) {
        unset($_SESSION['visitas']);//Restablecer session
        //destruir sesion session_destroy();
        echo "sesion destruida";
    }
} else {
    $_SESSION["visitas"] = 0;
}
