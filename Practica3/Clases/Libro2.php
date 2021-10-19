<?php


spl_autoload_register(function ($nombre) {
    require(str_replace("Clases\\","",$nombre) . '.php');
});

require("Trait.php");
use Clases\Hobby;

class Libro2 extends Hobby{

    use Clases\Tiempos;
    private static $tiempoMaximo;
    private static $tiempoMinimo;
	/**
	 *
	 * @param mixed $titulo 
	 *
	 * @return mixed
	 */
	function setTitulo($titulo) {
	}
	
	/**
	 *
	 * @return mixed
	 */
	function getTitulo() {
	}
	
	/**
	 *
	 * @return mixed
	 */
	function iniciar() {
	}
	
	/**
	 *
	 * @return mixed
	 */
	function detener() {
	}
	
	/**
	 *
	 * @param array $a 
	 *
	 * @return mixed
	 */
	function actualizar(array $a) {
	}
    function getTiempoMax(){
        echo $this->tiempoMaximo;
    }
}
