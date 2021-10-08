<?php
if($_SERVER["REQUEST_METHOD"]=='GET'){
    $numero1=$_GET["numero1"];
    $numero2=$_GET["numero2"];
    $signo=$_GET["signo"];

    $resultado= calculaResultado($numero1,$numero2,$signo);

    header('Location: http://localhost/dwes/sesiones/calculadora.php?res='.$resultado);
}
function calculaResultado($numero1,$numero2,$signo){

    switch($signo){
        case "sumar":
            return ($numero1+$numero2);
        case "restar":
            return $numero1-$numero2;
        case "multiplicar":
            return $numero1*$numero2;
        case "dividir":
            return ($numero1/$numero2);
    }
}
?>