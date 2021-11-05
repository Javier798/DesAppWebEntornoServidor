<?php
include("sesiones.php");
require_once("productoCompleto.php");
include("bd.php");
include("Conexion.php");
try{
$gestor = new bd(Conexion::getConexion("localhost", "dwes_pedidos", "root", ""));
$gestor->iniciarTransaccion();
$array = $_SESSION["productos"];
$arrayObjetos = array();
$array = array_values($array);
for ($i = 0; $i < count($array); $i++) {
    array_push($arrayObjetos, unserialize($array[$i]));
}

for ($i = 0; $i < count($arrayObjetos); $i++) {
    $arrayFiltros = [
        "sha1(CodProducto)=" => "'" . $arrayObjetos[$i]->getId() . "'"
    ];
    $productos = $gestor->obtenerProductosFiltros($arrayFiltros);
    foreach ($productos as $producto) {
        if ($producto["Stock"] < $arrayObjetos[$i]->getCantidad()) {
            $gestor->cancelarTransaccion();
            header('Location: carrito.php?respuesta=' . 'No se ha realizado la compra, cantidad de '.$producto["Nombre"].' insuficiente');
            return;
        }
    }
}
$arrayFiltros = [
    "CORREO=" => "'" . $_SESSION["usuario"] . "'"
];
$idRes;
$restaurantes = $gestor->obtenerRestaurantesFiltros($arrayFiltros);
foreach ($restaurantes as $restaurante) {
    $idRes = $restaurante["CodRes"];
}
$arrayRes = [
    "Enviado" => "true",
    "CodRes" => "$idRes"
];
$gestor->insertarPedido($arrayRes);

$pedidos = $gestor->obtenerUltimoPedido();
$idPedido;
foreach ($pedidos as $pedido) {
    $idPedido = $pedido["CodPedido"];
}
for ($i = 0; $i < count($arrayObjetos); $i++) {
    $array = [
        "idpedido" => "$idPedido",
        "idproducto" => $arrayObjetos[$i]->getId(),
        "cantidad" => $arrayObjetos[$i]->getCantidad()
    ];
    $gestor->insertarPedidosProductos($array);
}
$gestor->finalizarTransaccion();
}catch(Exception $e){
    $e->getMessage();
}
include("correo.php");
header('Location: carrito.php?respuesta=Pedido realizado con exito. Se enviara un correo de confirmacion a: '.$_SESSION["usuario"]);
$_SESSION["productos"]=array();