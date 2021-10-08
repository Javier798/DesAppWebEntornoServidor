<?php
namespace Clases;
require("Functions.php");

use Clases\Funciones as ClasesFunciones;



class Ayuda{

    protected $f;

    function __construct() {
        $this->f = new ClasesFunciones();
    }

    
    public function generarTitulo(){
        return $this->f->esCadena();
    }
    public function generarPaginas(){
        return $this->f->esEntero();
    }
    public function generarVendible(){
        return $this->f->esBooleano();
    }
    public function generarFecha(){
        return $this->f->esFecha();
    }
}
?>