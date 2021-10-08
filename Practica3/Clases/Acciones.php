<?php
namespace Clases;
interface Acciones{
    public function iniciar();
    public function detener();
    public function actualizar(array $a);
}
?>