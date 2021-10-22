<?php
namespace Clases;
interface Interfaz{
    public function insertar($array);
    public function actualizar($array);
    public function eliminar($id);
    public function obtenerHobbies();
    public function obtenerHobbiesFiltros($array);
}
?>