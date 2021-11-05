<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="GET" action="Registro.php">
        <p>Usuario</p>
        <input type="text" name="usuario" id="">
        <p>Contraseña</p>
        <input type="password" name="contraseña" id="">
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
    use Clases\Conexion;
    use Clases\GestorBBDD;
    use Clases\Usuario;

    spl_autoload_register(function ($nombre_clase) {
        include $nombre_clase . '.php';
    });
    if(isset($_GET["usuario"])&& isset($_GET["contraseña"])){
        $gestor = new GestorBBDD(Conexion::getConexion("localhost:3307", "practicasprimerexamen", "root", ""));
        $usu = new Usuario();
        if(!preg_match("/^[a-z0-9@]{6,}$/", $_GET["contraseña"])){
            header('Location: http://localhost/dawes/FormularioSesiones/Registro.php');
        }
        $usu->setContraseña($_GET["contraseña"]);
        $usu->setUsuario($_GET["usuario"]);
        $array = [
            "USUARIO" => $usu->getUsuario(),
            "CONTRASEÑA" => $usu->getContraseña()
        ];
        $gestor->insertar($array);
        header('Location: http://localhost/dawes/FormularioSesiones/login.php');
    }else{
        echo "inserte los campos";
    }
    

    ?>
</body>

</html>