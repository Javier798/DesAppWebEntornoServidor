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
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_GET["respuesta"])){
            $respuesta =$_GET["respuesta"];
        echo $respuesta . "\n";
        }
    }
    ?>
    <form method="POST" action="comprobar.php">
        <p>Usuario</p>
        <input type="text" name="usuario" id="usuario">
        <p>Contraseña</p>
        <input type="password" name="contraseña" id="contraseña">
        <input type="submit" name="enviar" value="Enviar">
        <a href="./Registro.php">Registro</a>
        
    </form>
</body>

</html>