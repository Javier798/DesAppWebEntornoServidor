<?php
require("Clases/Clase.php");

$serializado = file_get_contents('claseSerializada');
$clase = unserialize($serializado);
echo $clase->getContraseña();
echo $clase->getUsuario();