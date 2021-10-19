<?php
namespace Clases;

class Libro { 
    private $titulo;
   
    public  $numPaginas;
    private $vendible;
    private $fechaPublicacion;

    
    function __construct($titulo, $numPaginas, $vendible,$fechaPublicacion)
    {
        $this->numPaginas = $numPaginas;
        $this->titulo = $titulo;
        $this->fechaPublicacion = $fechaPublicacion;
        $this->vendible = $vendible;
    }

    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    public function getNumPaginas(){
        return $this->numPaginas;
    }
    public function setNumPaginas($numPaginas){
        $this->numPaginas = $numPaginas;
    }
    public function getVendible(){
        return $this->vendible;
    }
    public function getTienda(){
        return $this->tiendaVenta;
    }
    public function setVendible($vendible){
        $this->vendible = $vendible;
    }
    public function getFechaPublicacion(){
        return $this->fechaPublicacion;
    }
    public function setfechaPublicacion($fechaPublicacion){
        $this->fechaPublicacion = $fechaPublicacion;
    }

    public function __toString()
    {
       
        return "Titulo: " . $this->titulo . ", Numero de paginas: " . $this->numPaginas . ", Vendible: " . $this->vendible . ", Fecha publicacion: " . $this-> fechaPublicacion;
    }
}
?>