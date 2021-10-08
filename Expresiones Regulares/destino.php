<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $i = 0;
    //Comprobar que llegan todos los datos
    $Ejercicio1 = $_POST['Ejercicio1'];
    if (empty($Ejercicio1)) {
        $i++;
    } else {
        echo expresionesRegulares("/desarrollador/i", $Ejercicio1);
    }
    $Ejercicio1Aux = $_POST['Ejercicio1_1'];
    if (empty($Ejercicio1Aux)) {
        $i++;
    } else {
        echo expresionesRegulares("/^desarrollador\b/i", $Ejercicio1Aux);
    }
    $Ejercicio2 = $_POST['Ejercicio2'];
    if (empty($Ejercicio2)) {
        $i++;
        echo $Ejercicio2;
    } else {
        echo expresionesRegulares("/^desarrollador/i", $Ejercicio2);
    }
    $Ejercicio3 = $_POST['Ejercicio3'];
    if (empty($Ejercicio3)) {
        $i++;
    } else {
        echo expresionesRegulares("/\bdesarrollador\b/i", $Ejercicio3);
    }
    $Ejercicio4 = $_POST['Ejercicio4'];
    if (empty($Ejercicio4)) {
        $i++;
    } else {
        echo expresionesRegulares("/^[0-9]{2}\/[0-9]{2}\/[0-9]{2}\b/", $Ejercicio4);
    }
    $Ejercicio5 = $_POST['Ejercicio5'];
    if (empty($Ejercicio5)) {
        $i++;
    } else {
        echo expresionesRegulares("/^941[0-9]{6}$/", $Ejercicio5);
    }
    $Ejercicio6 = $_POST['Ejercicio6'];
    if (empty($Ejercicio6)) {
        $i++;
    } else {
        echo expresionesRegulares("/^[a-z]+\s[a-z]+\s[a-z]+$/i", $Ejercicio6);
    }
    $Ejercicio7 = $_POST['Ejercicio7'];
    if (empty($Ejercicio7)) {
        $i++;
    } else {
        echo expresionesRegulares("/^[a-z]\s{1}[a-z]\s{1}[a-z]{1}$/i", $Ejercicio7);
    }
    $Ejercicio8 = $_POST['Ejercicio8'];
    if (empty($Ejercicio8)) {
        $i++;
    } else {
        echo expresionesRegulares("/^[0-9]+\*[0-9]+$/i", $Ejercicio8);
    }
    $Ejercicio9 = $_POST['Ejercicio9'];
    if (empty($Ejercicio9)) {
        $i++;
    } else {
        echo expresionesRegulares("/^[0-9]+[+-\/\*]{1}[0-9]+$/i", $Ejercicio9);
    }
    $Ejercicio10 = $_POST['Ejercicio10'];
    if (empty($Ejercicio10)) {
        $i++;
    } else {
        $Letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
        $numeros = (int)substr($Ejercicio10, 0, 8);

        $letra = $Letras[$numeros % 23];
        echo expresionesRegulares("/^[0-9]{8}$letra$/", $Ejercicio10);
    }
    $mensaje = "";
    if ($i > 0) {
        $mensaje = "<br>no se han recibido todos los datos";
    } else {
        $mensaje = "<br>se han recibido todos los datos";
    }
    echo $mensaje;
    //header('location: index.php?m='.$mensaje);
} else {
    //header('location: index.php?m='.'La peticion fue tipo GET');
}

function expresionesRegulares($expresion, $cadena)
{

    if (!preg_match($expresion, $cadena)) {

        echo "Nombre incorrecto<br>";
    } else {

        echo "Nombre OK<br>";
    }
}
