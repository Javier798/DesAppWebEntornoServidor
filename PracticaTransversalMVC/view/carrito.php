<?php
include("sesiones.php");
require_once("productoCompleto.php");

if($_SERVER["REQUEST_METHOD"]){
    if(!empty($_GET["respuesta"])){
        echo $_GET["respuesta"];
    }
    
}
echo "<h1>Carrito de la compra</h1>";
$array = $_SESSION["productos"];
echo "<div style=\"display:flex;\"><p style=\"padding:5px; font-size:15pt; margin-rigth:20px; margin-right: 120px;\">Nombre</p><p style=\"padding:5px; font-size:15pt;margin-right: 74px;\">Descripcion</p><p style=\"padding:5px; font-size:15pt; margin-right: 126px;\">Peso</p><p style=\"padding:5px; font-size:15pt;  margin-right: 124px;\">Stock</p><p style=\"padding:5px; font-size:15pt;\">Cantidad</p></div>";

$array=array_values($array);
for ($i=0; $i < count($array); $i++) {
    $objet = unserialize($array[$i]);

    echo "<div style=\"display:flex;\">
    <form method='POST' action='eliminar.php'>
    <input type='text' disabled value='".$objet->getNombre()."' name='nombreMostrar'/>
    <input type='text' disabled value='".$objet->getDescripcion()."' name='descripcionMostrar'/>
    <input type='number' disabled value='".$objet->getPeso()."' name='pesoMostrar'/>
    <input type='number' disabled value='".$objet->getStock()."' name='stockMostrar'/>
    <input type='number' value='".$objet->getCantidad()."' name='cantidad'/>
    <input type='hidden' name='id' value ='".$objet->getId()."'/>
    <input type='submit' value='Eliminar'/>
    </form>
    </div>";
}
echo "<a href='procesar_pedido.php'>Realizar pedido</a>";
include("cabecera.php");