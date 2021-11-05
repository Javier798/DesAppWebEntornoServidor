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
    if(isset($_GET["msg"])&&!empty($_GET["msg"])){
        echo $_GET["msg"];
    }
    ?>
    <form action="cambiar_contrasena.php" method="post">
        <label for="">Introduzca su contraseña</label>
        <input type="password" name="contraseña1">
        <input type="hidden" name="id" <?php if(isset($_GET["id"])&&!empty($_GET["id"])) echo "value='".$_GET["id"]."'";?>>
        <label for="">Introduzca de nuevo su contraseña</label>
        <input type="password" name="contraseña2">
        <input type="submit" value="Cambiar">
    </form>
</body>
</html>