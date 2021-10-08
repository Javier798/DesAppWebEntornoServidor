<?php

if($_SERVER["REQUEST_METHOD"]=='GET'){
    $usuario=$_GET["usuario"];
    $contraseña=$_GET["contraseña"];
    $contador=0;
    if(empty($usuario)){
        $contador++;
    }
    if(empty($contraseña)){
        $contador++;
    }
    echo $usuario;
    echo $contraseña;
    echo $contador;
    if((int)$contador>0){
        header('Location: http://localhost/dwes/sesiones/login.php?m='."Faltan datos.<br>");
        return;
    }

    if($usuario=="pepe" && $contraseña==1234){
        header('Location: http://localhost/dwes/sesiones/calculadora.php?usu='.$usuario);
    }else{
        header('Location: http://localhost/dwes/sesiones/error.php');
    }
}


?>