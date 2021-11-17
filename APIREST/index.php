<?php
//Incluyo los archivos necesarios
//Instancio el controlador
session_start();
require("controller/controllerCompra.php");
require("controller/controllerSesion.php");
require("vendor/autoload.php");
require("repositorios/ApiController.php");
require("model/bd.php");
require("model/Conexion.php");
$controllerSession = new controllerSesion();
$controllerCompra = new controllerCompra();
$api = new ApiController();
//Ruta de la home

$home = "/dwes/APIREST/index.php/api/";
//Quito la home de la ruta de la barra de direcciones

$ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);
//Creo el array de ruta (filtrando los vacios)

$array_ruta = array_filter(explode("/", $ruta));
//Decido la ruta en funcion de los elementos del array
//var_dump($array_ruta);
if (isset($array_ruta[0]) && $array_ruta[0] == "login") {
    $api->getTokenSimple();
} else if(isset($array_ruta[0]) && $array_ruta[0] == "categoriasSimple"){
    $api->getCategoriasSimple();
}else if(isset($array_ruta[0]) && $array_ruta[0] == "categoriasProdJWT"){
    $api->getPrdoCategorias($array_ruta[1]);
}else if(isset($array_ruta[0]) && $array_ruta[0] == "categoriasJWT"){
    $api->getCategorias();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "loginJWT") {
    $api->getTokenJWT();

}else if (isset($array_ruta[0]) && $array_ruta[0] == "pedidosJWT") {
    $api->getPedidosRes($array_ruta[1]);

}