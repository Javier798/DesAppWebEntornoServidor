<?php
namespace Clases;
class Clase{
    private $nombre;
    private $edad;
    private $vivo;
    private $data = array();

    public function __set($name, $value)
    {
        echo "Estableciendo '$name' a '$value'\n";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        echo "Consultando '$name'\n";
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
	 * 
	 * @return mixed
	 */
	function getVivo() {
		return $this->vivo;
	}
	
	/**
	 * 
	 * @param mixed $vivo 
	 * @return Clase
	 */
	function setVivo($vivo): self {
		$this->vivo = $vivo;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getEdad() {
		return $this->edad;
	}
	
	/**
	 * 
	 * @param mixed $edad 
	 * @return Clase
	 */
	function setEdad($edad): self {
		$this->edad = $edad;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getNombre() {
		return $this->nombre;
	}
	
	/**
	 * 
	 * @param mixed $nombre 
	 * @return Clase
	 */
	function setNombre($nombre): self {
		$this->nombre = $nombre;
		return $this;
	}
}
?>