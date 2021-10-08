<?php
namespace Clases;
require("Acciones.php");
abstract class Hobby implements Acciones{
    public abstract function setTitulo($titulo);
    public abstract function getTitulo();
}
?>