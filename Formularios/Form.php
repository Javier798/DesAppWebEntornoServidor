<html>

<head>
    <title>Titulo</title>
</head>

<body>
    <?php
    spl_autoload_register(function ($nombre_clase) {
        include $nombre_clase . '.php';
    });
    use Clases\Libro;
        if(isset($_GET["m"])){
            $mensaje = $_GET["m"];
            echo "$mensaje";
            $serializado = file_get_contents('libroSerializado');
            $libroDesserializado = unserialize($serializado);
            echo "Fecha publicacion: ".$libroDesserializado->getFechaPublicacion()."<br>";
            echo "Numero de paginas: ".$libroDesserializado->getNumPaginas()."<br>";
            echo "Titulo: ".$libroDesserializado->getTitulo()."<br>";
            echo "Vendible: ".$libroDesserializado->getVendible()."<br>";
            echo "Ruta imagen: ".$libroDesserializado->rutaImagen."<br>";

        }
    ?>
    <form name="form_hobby" method="POST" action="destino1.php"  enctype="multipart/form-data">
        <label>Titulo</label>
        <input type="text" name="titulo">
        <br>
        <input type="hidden" name="control" valor="true">
        <label>Paginas</label>
        <input type="number" name="numeroPaginas">
        <br>
        <label>Archivo</label>
        <input type="file" name="archivosubido">
        <br>
        <label>Vendible</label>
        <input type="text" name="vendible">
        <br>
        <label>Fecha de publicacion</label>
        <input type="date" name="fechaPubli">
        <br>
        <input type="submit" name="enviar" value="Enviar">
    </form>

</body>

</html>

