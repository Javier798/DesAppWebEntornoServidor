<?php
require("Clases/Clase.php");
use Clases\Clase;
$clase = new Clase();
$clase->setContraseña("pepe");
$clase->setUsuario("pepe");
$serialisasion=serialize($clase);
file_put_contents('claseSerializada', $serialisasion);