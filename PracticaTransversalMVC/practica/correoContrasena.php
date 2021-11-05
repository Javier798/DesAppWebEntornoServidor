<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="correoContrasena.php" method="post">
        <label for="">Introduzca el correo</label>
        <input type="text" name="correo">
    </form>
</body>

</html>
<?php

use mailer\mailer;
spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});
require 'mailer.php';
if (isset($_POST["correo"]) && !empty($_POST["correo"])) {
    $correo = $_POST["correo"];
    $gestor = new bd(Conexion::getConexion("localhost", "dwes_pedidos", "root", ""));
    $arrayFiltros = [
        "CORREO=" => "'".$correo."'"
    ];
    $resultado = $gestor->obtenerRestaurantesFiltros($arrayFiltros);
    foreach ($resultado as $usuario) {
        //var_dump($usuario);
        echo sha1($usuario["CodRes"]);
        $mailer = new mailer("practicatransversal07@gmail.com", "practicatransversal07@gmail.com", "vesper!2021", $correo, "<a href='http://localhost/dwes/PracticaTransversal/generar_contrasena.php?id=".sha1($usuario["CodRes"])."'>Cambiar contraseña</a>");
        $mailer->enviarCorreo();
    }
    
}

?>