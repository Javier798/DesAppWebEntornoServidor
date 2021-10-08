<?php
session_start();
if(isset($_GET['usu'])){
    $_SESSION['usuario']=$_GET['usu'];
}

if(isset($_GET["res"])){
    echo $_GET["res"];
    if((int)$_GET["res"]<1000){
        if(!isset($_SESSION['resmenormil'])){
            $_SESSION['resmenormil']=0;
            echo "creo campo";
        }else{
            echo "menor a 1000";
            $_SESSION['resmenormil']=$_SESSION['resmenormil']+1;
        }
    }
    if((int)$_SESSION['resmenormil']==5){
        echo "sesion destruida";
        header('Location: http://localhost/dwes/sesiones/ecuacion.php');
        unset($_SESSION['resmenormil']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form name="calculos" method="GET" action="resolucion.php">
        <p>Primer numero</p>
        <input name="numero1" type="text">
        <p>Operacion</p>
        <select name="signo" id="">
            <option value="sumar">+</option>
            <option value="restar">-</option>
            <option value="multiplicar">*</option>
            <option value="dividir">/</option>
        </select>
        <p>Segundo numero</p>
        <input name="numero2" type="text">
        <input type="submit" name="enviar" value="Enviar">
    </form> 
</body>
</html>
