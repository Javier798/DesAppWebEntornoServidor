<?php
if (isset($_COOKIE["contador"])) {
    if ($_COOKIE["contador"] == 0) {
        echo "Bienvenido";
        setcookie("contador", $_COOKIE["contador"] + 1, time() + 60000);
    }elseif($_COOKIE["contador"]==10){
        echo "eliminando cookie";
        setcookie("contador", "0", time() - 60000);
    }else{
        $visita= $_COOKIE["contador"];
        echo "visita $visita";
        setcookie("contador", $_COOKIE["contador"] + 1, time() + 60000);
    }
    
} else {
    setcookie("contador", "0", time() + 60000);
}
