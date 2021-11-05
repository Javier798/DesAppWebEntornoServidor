<?php
use Clases\Conexion;
use Clases\GestorBBDD;
spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});

$array = [
    "TITULO" => "raul",
    "NUMPAGINAS" => 4,
    "VENDIBLE" => TRUE,
    "FECHAPUBLI" => "1998-02-09"
];
$arrayActualizar = [
    "CODIGO" =>"18",
    "NUMPAGINAS" => 20,
    "VENDIBLE" => TRUE,
    "FECHAPUBLI" => "1998-02-09"
];
$arrayFiltros = [
    "NUMPAGINAS" => "=6",
    "VENDIBLE" => "=true",

];
$array1 =["INSERT INTO `libros`(`CODLIBRO`, `TITULO`, `NUMPAGINAS`, `VENDIBLE`, `FECHAPUBLI`) VALUES ('2','juan','5','true','1998-03-05');","INSERT INTO `libros`(`CODLIBRO`, `TITULO`, `NUMPAGINAS`, `VENDIBLE`, `FECHAPUBLI`) VALUES ('1','pepe','5','true','1998-03-05');"];
$gestorBD = new GestorBBDD(Conexion::getConexion("localhost","hobby","root",""));
//$gestorBD->insertar($array);
//$gestorBD->eliminar(18);
//$gestorBD->actualizar($arrayActualizar);
//var_dump($gestorBD->obtenerHobbies());
//$gestorBD->obtenerHobbiesFiltros($arrayFiltros);
//$gestorBD->transaccion($array1);
?>