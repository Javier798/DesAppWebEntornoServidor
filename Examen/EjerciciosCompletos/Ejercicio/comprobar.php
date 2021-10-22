<?php
use BBDD\Conexion;
use BBDD\GestorBBDD;
use Clases\Usuario;

spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["usuario"])||empty($_POST["contraseña"])){
        header('Location: http://localhost/dawes/Ejercicio/login.php?respuesta='."Hay que enviar ambos campos<br>");
        return;
    }
    if(!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $_POST["contraseña"])){
        header('Location: http://localhost/dawes/Ejercicio/login.php?respuesta='."Contraseña no valida<br>");
        return;
    }
    
    $usu = new Usuario();
    $usu->setContraseña($_POST["contraseña"]);
    $usu->setUsuario($_POST["usuario"]);
    $usu->atributoMagico= "UwU";
    $arrayFiltros = [
        "USUARIO=" => "'".$usu->getUsuario()."'"
    ];
    $gestor = new GestorBBDD(Conexion::getConexion("localhost:3307","repasomaximo","root",""));

    $serialisasion=serialize($usu);
    file_put_contents('usuarioSerializado', $serialisasion);
    $resultado = $gestor->obtenerHobbiesFiltros($arrayFiltros);
    if($resultado->rowCount()==0){
        header('Location: http://localhost/dawes/Ejercicio/login.php?respuesta='."Usuario Incorrecto<br>");
        return;
    }
    foreach ($resultado as $usuario) {
        if($usuario["CONTRASEÑA"]==$usu->getContraseña()){
            session_start();
            $_SESSION["usuario"]=$usuario["USUARIO"];
            header('Location: http://localhost/dawes/Ejercicio/cuenta.php');
        }else{
            header('Location: http://localhost/dawes/Ejercicio/login.php?respuesta='."Usuario o contraseña incorrectos<br>");
        return;
        }
    }
    

}

