<?php
namespace Clases;
class Libro{
    private $numPaginas;
    private $titulo;
    private $vendible;
    private $fechaPublicacion;
    private $data = array();

    function __construct()
    {
        $this->numPaginas=0;
        $this->titulo="";
        $this->vendible=false;
        $this->fechaPublicacion="";

        
    }

        
    public function __set($name, $value)
    {
        
        $this->data[$name] = $value;
    }
    public function __get($name)
    {

        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Propiedad indefinida mediante __get(): ' . $name .
            ' en ' . $trace[0]['file'] .
            ' en la línea ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }
    /**
     * Get the value of numPaginas
     */ 
    public function getNumPaginas()
    {
        return $this->numPaginas;
    }

    /**
     * Set the value of numPaginas
     *
     * @return  self
     */ 
    public function setNumPaginas($numPaginas)
    {
        $this->numPaginas = $numPaginas;

        return $this;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of vendible
     */ 
    public function getVendible()
    {
        return $this->vendible;
    }

    /**
     * Set the value of vendible
     *
     * @return  self
     */ 
    public function setVendible($vendible)
    {
        $this->vendible = $vendible;

        return $this;
    }

    /**
     * Get the value of fechaPublicacion
     */ 
    public function getFechaPublicacion()
    {
        return $this->fechaPublicacion;
    }

    /**
     * Set the value of fechaPublicacion
     *
     * @return  self
     */ 
    public function setFechaPublicacion($fechaPublicacion)
    {
        $this->fechaPublicacion = $fechaPublicacion;

        return $this;
    }
}
?>