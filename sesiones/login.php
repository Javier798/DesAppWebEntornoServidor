<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    if(isset($_GET["cerrar"])){
        if($_GET["cerrar"]=="true"){
            unset($_SESSION);
            session_destroy();
            echo "sesion destruida";
        }
    }
     if(isset($_GET["m"])){
        $mensaje = $_GET["m"];
        echo "$mensaje";
    }
    ?>
    <form name="login" method="GET" action="check.php">
    <p>Usuario</p>
    <input name="usuario" type="text">
    <p>Contraseña</p>
    <input name="contraseña" type="password">
    <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>