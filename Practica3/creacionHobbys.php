<?php

use Clases\Libro;
use Clases\Ayuda;
spl_autoload_register(function ($nombre) {
    require($nombre . '.php');
});

echo "Ayuda:<br>";

$ayuda = new Ayuda();

echo "Titulo:" . $ayuda->generarTitulo() . ", Painas: " . $ayuda->generarPaginas() . ", Vendible: " . $ayuda->generarVendible() . ", Fecha: " . $ayuda->generarFecha() . "<br><br>";

$libro1 = new libro("El lorito pepe",23,TRUE,"78/09/2021");


$libro1->iniciar();
$libro1->detener();
$libro1->actualizar([1,2,3]);

echo "<br>";
$libro2 = new libro("El lorito juan",32,FALSE,"16/09/2021");


$libro2->iniciar();
$libro2->detener();
$libro2->actualizar([1,2,3]);

echo "<br>";
$libro3 = new libro("El lorito fernando",98,FALSE,"16/09/2067");

$libro3->iniciar();
$libro3->detener();
$libro3->actualizar([1,2,3]);

?>