<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="GET" action="registrarse.php">
        <p>Correo</p>
        <input type="text" name="usuario" id="">
        <p>Direccion</p>
        <input type="text" name="direccion" id="">
        <p>Codigo Postal</p>
        <input type="text" name="CodPostal" id="">
        <p>Pais</p>
        <input type="text" name="pais"  maxlength="2" id="">
        <p>Contraseña</p>
        <input type="password" name="contraseña" id="">
        
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
    session_start();
    spl_autoload_register(function ($nombre_clase) {
        include $nombre_clase . '.php';
    });
    if(isset($_GET["usuario"])&& isset($_GET["contraseña"])){
        
        $gestor = new bd(Conexion::getConexion("localhost", "dwes_pedidos", "root", ""));

        $password=$_GET["contraseña"];
        $user=$_GET["usuario"];
        $direccion =$_GET["direccion"];
        $CodPostal = $_GET["CodPostal"];
        $pais =$_GET["pais"];
        $array = [
            "Correo" => $user,
            "Clave" => $password,
            "Direccion"=>$direccion,
            "CodPostal"=>$CodPostal,
            "Pais"=>$pais
        ];
        
        if($gestor->insertarRestaurante($array)){
            $_SESSION["usuario"]=$user;
            echo "hola";
            header('Location: categorias.php');
        }
    }else{
        echo "inserte los campos";
    }
    ?>
</body>
</html>