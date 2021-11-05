<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (empty($_GET["n1"]) || empty($_GET["n2"])) {
        header('Location: http://localhost/dawes/Ejercicio/cuenta.php?respuesta=' . "isnerte todos los campso<br>");
        return;
    }
    $n1 = $_GET["n1"];
    $n2 = $_GET["n2"];
    $cuenta = $_GET["selector"];
    $resultado = 0;
    switch ($cuenta) {
        case '*':
            $resultado = (int)$n1 * (int)$n2;
            break;
        case '-':
            $resultado = (int)$n1 - (int)$n2;
            break;
        case '+':
            $resultado = (int)$n1 + (int)$n2;
            break;
        case '/':
            $resultado = (int)$n1 / (int)$n2;
            break;
    }
    setcookie("resultado", $resultado, time() +3600 * 2 * 24);
    
    header('Location: http://localhost/dawes/Ejercicio/final.php');
}
