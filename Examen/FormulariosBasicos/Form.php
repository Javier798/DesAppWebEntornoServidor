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
    require "Clases/Clase.php";
    use Clases\Clase;
    if(isset($_GET["respuesta"])){
        echo $_GET["respuesta"];
        $serializado = file_get_contents('claseSerializada');
            $claseDesserializado = unserialize($serializado);
            echo "Nombr: ".$claseDesserializado->getNombre()."<br>";
            echo "Vivo: ".$claseDesserializado->getVivo()."<br>";
            echo "Ruta imagen: ".$claseDesserializado->rutaArchivo."<br>";
    }
    ?>
<form method="POST" action="destino.php" enctype="multipart/form-data">
    <p>Nombre</p>
    <input type="text" name="nombre">
    <input type="hidden" name="control" valor="true">
    <p>Edad</p>
    <input type="number" name="edad">
    <p>Vivo</p>
    <input type="checkbox" name="vivo">
    <p>Archivo</p>
    <input type="file" name="archivosubido">
    <p>Decimal</p>
    <input value="" name="decimal" type="number" step="any">
    <input type="submit" name="enviar" value="Enviar">
</form>
</body>
</html>