<?php
use Clases\Conexion;
use Clases\GestorBBDD;
spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});

$gestor = new GestorBBDD(Conexion::getConexion("localhost","practicasprimerexamen","root",""));