<?php
//Incluyo los archivos necesarios
//Instancio el controlador

require("controller/controllerCompra.php");
require("controller/controllerSesion.php");
require("model/bd.php");
require("model/Conexion.php");
$controllerSession = new controllerSesion();
$controllerCompra = new controllerCompra();
//Ruta de la home

$home = "/dwes/PracticaTransversalMVC/index.php/";
//Quito la home de la ruta de la barra de direcciones

$ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);
//Creo el array de ruta (filtrando los vacios)

$array_ruta = array_filter(explode("/", $ruta));
//Decido la ruta en funcion de los elementos del array
//var_dump($array_ruta);
if (isset($array_ruta[0]) && $array_ruta[0] == "login") {
    $controllerSession->login("");
} else if (isset($array_ruta[0]) && $array_ruta[0] == "comprobarlogin") {
    if (isset($_POST["usuario"]) && isset($_POST["contraseña"])) {
        $user = $_POST["usuario"];
        $password = $_POST["contraseña"];
        $comprobar =$controllerSession->comprobarLogin($user, $password);
        
    }
} else {
    echo"no entiendo nada";
}
