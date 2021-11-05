<?php
require("Clases/usuario.php");
session_start();
var_dump($_COOKIE["resultado"]);
var_dump($_SESSION["usuario"]);
if (isset($_COOKIE["resultado"]) && isset($_SESSION["usuario"])) {

    $serializado = file_get_contents('usuarioSerializado');
    $usuario = unserialize($serializado);   
    echo "El usuario " . $_SESSION["usuario"] . " tiene el resultado de: " . $_COOKIE["resultado"]. " y un metodo magico: ".$usuario->atributoMagico;
}
