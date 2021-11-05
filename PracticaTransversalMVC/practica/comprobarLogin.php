<?php
session_start();
spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["usuario"])||empty($_POST["contraseña"])){
        header('Location: login.php?respuesta='."Hay que enviar ambos campos<br>");
        return;
    }
    $restaurante=$_POST["usuario"];
    $contraseña =$_POST["contraseña"];
    if(!is_valid_email($restaurante)){
        header('Location: login.php?respuesta='."Email no valido<br>");
        return;
    }
    $arrayFiltros = [
        "CORREO=" => "'".$restaurante."'"
    ];
    $gestor = new bd(Conexion::getConexion("localhost","dwes_pedidos","root",""));

    $resultado = $gestor->obtenerRestaurantesFiltros($arrayFiltros);
    if($resultado->rowCount()==0){
        header('Location: login.php?respuesta='."Usuario Incorrecto<br>");
        return;
    }
    foreach ($resultado as $usuario) {
        if($usuario["Clave"]==$contraseña){
            $_SESSION["usuario"]=$usuario["Correo"];
            $_SESSION["productos"]=array();
            header('Location: categorias.php');
        }else{
            header('Location: login.php?respuesta='."Usuario o contraseña incorrectos<br>");
        return;
        }
    }
}
