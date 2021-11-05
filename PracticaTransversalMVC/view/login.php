<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--base href="<?php //echo "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; 
                    ?>"-->

</head>

<body>
    <?php
    if (!empty($respuesta)) {
        echo $respuesta . "\n";
    }
    ?>
    <form method="POST" action="<?php echo $accion; ?>">
        <p>Usuario</p>
        <input type="text" name="usuario" id="usuario">
        <p>Contraseña</p>
        <input type="password" name="contraseña" id="contraseña"><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <a href="registrarse.php">Registrate</a>
    <a href="correoContrasena.php">Cambiar contraseña</a>
</body>

</html>