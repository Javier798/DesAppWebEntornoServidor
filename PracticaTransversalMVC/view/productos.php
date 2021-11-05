<?php
include("sesiones.php");

spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});
$nomCategoria = $_GET["nom"];
$idCat = $_GET["id"];
echo "<h1>$nomCategoria</h1>";
$gestor = new bd(Conexion::getConexion("localhost", "dwes_pedidos", "root", ""));
$arrayFiltros = [
    "sha1(CodCategoria)=" => "'" . $idCat . "'"
];
$productos = $gestor->obtenerProductosFiltros($arrayFiltros);
echo "<div style=\"display:flex;\"><p style=\"padding:5px; font-size:15pt; margin-rigth:20px; margin-right: 120px;\">Nombre</p><p style=\"padding:5px; font-size:15pt;margin-right: 74px;\">Descripcion</p><p style=\"padding:5px; font-size:15pt; margin-right: 126px;\">Peso</p><p style=\"padding:5px; font-size:15pt;  margin-right: 124px;\">Stock</p><p style=\"padding:5px; font-size:15pt;\">Cantidad</p></div>";
foreach ($productos as $producto) {
    echo "<div style=\"display:flex;\">
    <form method='POST' action='anadir.php'>
    <input type='text' disabled value='".$producto["Nombre"]."' name='nombreMostrar'/>
    <input type='text' disabled value='".$producto["Descripcion"]."' name='descripcionMostrar'/>
    <input type='number' disabled value='".$producto["Peso"]."' name='pesoMostrar'/>
    <input type='number' disabled value='".$producto["Stock"]."' name='stockMostrar'/>

    <input type='hidden' value='".$producto["Nombre"]."' name='nombre'/>
    <input type='hidden' value='".$producto["Descripcion"]."' name='descripcion'/>
    <input type='hidden' value='".$producto["Peso"]."' name='peso'/>
    <input type='hidden' value='".$producto["Stock"]."' name='stock'/>
    
    
    <input type='number' value='0' name='cantidad'/>
    <input type='hidden' name='id' value ='".sha1($producto["CodProducto"])."'/>
    <input type='submit' value='Comprar'/>
    </form>
    </div>";
}
include("cabecera.php");