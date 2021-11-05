<?php
spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});
$contraseña = $_POST["contraseña1"];
$confirmaContraseña = $_POST["contraseña2"];
$id= $_POST["id"];
if($contraseña!= $confirmaContraseña){
    header("Location: generar_contrasena.php?msg=Las contraseñas no coinciden");
    return;
}
$gestor =new bd(Conexion::getConexion("localhost","dwes_pedidos","root",""));
$arrayFiltros = [
    "Clave="=>"'$contraseña'",
    " where sha1(CodRes)=" => "'" . $id . "'"
];

if($gestor-> updateRestaurante($arrayFiltros)){
 header("Location: login.php");
}else{
    //header("Location: generar_contrasena.php?msg=Algo salió mal");
    return;
}