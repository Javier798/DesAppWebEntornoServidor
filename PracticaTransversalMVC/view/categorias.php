<?php
include("sesiones.php");

spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});

echo "<h1>Lista de categorias</h1>";
$gestor = new bd(Conexion::getConexion("localhost", "dwes_pedidos", "root", ""));
$categorias = $gestor->obtenerCategorias();
echo "<ul>";
foreach ($categorias as $categoria) {
    echo '<li><a href="productos.php?id='.sha1($categoria["CodCat"]).'&nom='.$categoria["Nombre"].'">' . $categoria["Nombre"] . '</a></li>';
}
echo "</ul>";
include("cabecera.php");