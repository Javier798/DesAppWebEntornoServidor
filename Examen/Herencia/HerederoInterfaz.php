<?php
use Clases\Interfaz;

require("Clases/Interfaz.php");


class HerederoInterfaz implements Interfaz
{
	/**
	 *
	 * @param mixed $array 
	 *
	 * @return mixed
	 */
	function insertar($array) {
        echo "funciono";
	}
	
	/**
	 *
	 * @param mixed $array 
	 *
	 * @return mixed
	 */
	function actualizar($array) {
        echo "funciono";
	}
	
	/**
	 *
	 * @param mixed $id 
	 *
	 * @return mixed
	 */
	function eliminar($id) {
        echo "funciono";
	}
	
	/**
	 *
	 * @return mixed
	 */
	function obtenerHobbies() {
	}
	
	/**
	 *
	 * @param mixed $array 
	 *
	 * @return mixed
	 */
	function obtenerHobbiesFiltros($array) {
	}
	/**
	 */
	function __construct() {
	}
}