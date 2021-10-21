<?php
use Clases\Conexion;
use Clases\GestorBBDD;
use Clases\Usuario;

spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["usuario"])||empty($_POST["contraseña"])){
        header('Location: http://localhost/dawes/FormularioSesiones/login.php?respuesta='."Hay que enviar ambos campos<br>");
        return;
    }
    

    $usu = new Usuario();
    $usu->setContraseña($_POST["contraseña"]);
    $usu->setUsuario($_POST["usuario"]);
    $usu->magicOwO= "UwU";
    $arrayFiltros = [
        "USUARIO=" => "'".$usu->getUsuario()."'"
    ];
    $gestor = new GestorBBDD(Conexion::getConexion("localhost:3307","practicasprimerexamen","root",""));

    $resultado = $gestor->obtenerHobbiesFiltros($arrayFiltros);
    if($resultado->rowCount()==0){
        header('Location: http://localhost/dawes/FormularioSesiones/login.php?respuesta='."El usuario no existe<br>");
    }
    foreach ($resultado as $usuario) {
        if($usuario["CONTRASEÑA"]==$usu->getContraseña()){
            session_start();
            $_SESSION["usuario"]=$usuario["USUARIO"];
            header('Location: http://localhost/dawes/FormularioSesiones/sesiones.php?magic='.$usu->magicOwO);
        }else{
            header('Location: http://localhost/dawes/FormularioSesiones/login.php?respuesta='."Usuario o contraseña incorrectos<br>");
        return;
        }
    }
    

}

