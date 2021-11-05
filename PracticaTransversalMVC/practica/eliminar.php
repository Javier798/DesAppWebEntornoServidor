<?php
include("sesiones.php");
require_once("productoCompleto.php");
$producto = new productoCompleto();
$producto->setNombre($_POST["nombre"]);
$producto->setDescripcion($_POST["descripcion"]);
$producto->setStock($_POST["stock"]);
$producto->setPeso($_POST["peso"]);
$cantidad = $_POST["cantidad"];
$producto->setId($_POST["id"]);
$array = $_SESSION["productos"];
for ($i = 0; $i < count($array); $i++) {
    $objeto = unserialize($array[$i]);
    if ($objeto->getId() == $producto->getId()) {
        if ($objeto->getCantidad() <= $cantidad) {
            unset($array[$i]);
            $array = array_values($array);
            $_SESSION["productos"] = $array;
        }else{
            $array[$i]= serialize($objeto->setCantidad($objeto->getCantidad()-$cantidad));
            $array = array_values($array);
            $_SESSION["productos"] = $array;
        }

        header('Location: http://localhost/dwes/PracticaTransversal/carrito.php');
        return;
    }
}
header('Location: http://localhost/dwes/PracticaTransversal/carrito.php');
