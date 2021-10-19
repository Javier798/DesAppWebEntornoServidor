<?php
namespace Clases;
require("Functions.php");

use Clases\Funciones;



 class Ayuda{

    

    /*function __construct() {
        $this->f = new ClasesFunciones();
    }*/

    
    public static function generarTitulo(){

        return Funciones::esCadena();
    }
    public static function generarPaginas(){

        return Funciones::esEntero();
    }
    public static function generarVendible(){

        return Funciones::esBooleano();
    }
    public static function generarFecha(){

        return Funciones::esFecha();
    }
}
?>