<?php
include("sesiones.php");
require_once("productoCompleto.php");
$producto = new productoCompleto();
$producto->setNombre($_POST["nombre"]);
$producto->setDescripcion($_POST["descripcion"]);
$producto->setStock($_POST["stock"]);
$producto->setPeso($_POST["peso"]);
$producto->setCantidad($_POST["cantidad"]);
$producto->setId($_POST["id"]);
$array =$_SESSION["productos"];
for ($i=0; $i < count($array); $i++) { 
    $objeto =unserialize($array[$i]);
    if($objeto->getId()==$producto->getId()){
        $objeto->setCantidad($producto->getCantidad());
        $array[$i]= serialize($objeto);
        $_SESSION["productos"]=$array;
        header('Location: carrito.php');
        return;
    }   
}
array_push($_SESSION["productos"],serialize($producto));
header('Location: carrito.php');