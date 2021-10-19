<?php

use Clases\Conexion;

spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});

$db = Conexion::getConexion("localhost", "hobby", "root", "");
//creacion de la tabla
$sql = "SELECT * FROM libros ";
$libros=$db->query($sql);
echo "<table>";
echo "<tr><th>Titulo</th>";
echo "<th>Paginas</th>";
echo "<th>Vendible</th>";
echo "<th>Fecha publicacion</th></tr>";
foreach ($libros as $libro) {
    echo"<tr>";
    echo "<td>".$libro["TITULO"]."</td>";
    echo "<td>".$libro["NUMPAGINAS"]."</td>";
    echo "<td>".$libro["VENDIBLE"]."</td>";
    echo "<td>".$libro["FECHAPUBLI"]."</td>";
    echo"</tr>";
}
echo "</table>";
