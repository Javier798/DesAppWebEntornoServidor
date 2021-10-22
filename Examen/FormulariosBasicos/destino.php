<?php
spl_autoload_register(function ($nombre_clase) {
    echo $nombre_clase;
    include $nombre_clase . '.php';
});
use Clases\Clase;
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST["control"])) {
        $clase = new Clase();
        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];
        $vivo = $_POST["vivo"];
        $rutaArchivo = $_FILES['archivosubido']['tmp_name'];
        $clase->setNombre($nombre);
        $clase->setEdad($edad);
        $clase->setVivo($vivo);
        $clase->rutaArchivo =$rutaArchivo;
        $nombreArchivo = "D:\\archivo.pdf";
        $tipoArchivo = $_FILES["archivosubido"]["type"];
        $tamañoArchivo = $_FILES["archivosubido"]["size"];
        $vivo = esBooleano($vivo);
        $contador = 0;
        if(empty($_POST["nombre"])){
            $contador++;
        }
        if(empty($_POST["edad"])){
            $contador++;
        }
        if(empty($_POST["vivo"])){
            $contador++;
        }
        if(empty($_FILES['archivosubido'])){
            $contador++;
        }
        $serialisasion=serialize($clase);
        file_put_contents('claseSerializada', $serialisasion);
        if ($tipoArchivo == "application/pdf" && $tamañoArchivo <= 2097152 && !file_exists($nombreArchivo)) {
            move_uploaded_file($rutaArchivo, "G:\\perico.pdf");
        } else {
            echo "<br> El archivo no se guardó";
        }
    }
    echo $contador;
    if($contador==0){
        header('Location: http://localhost/dwes/repaso/Form.php?respuesta='."Se han recibido todos los datos<br>");
    }else{
        header('Location: http://localhost/dwes/repaso/Form.php?respuesta='."No se han recibido todos los datos<br>");
    }
}
function esBooleano($booleano)
{
    if ($booleano === "on") {
        return true;
    } else {
        return false;
    }
}