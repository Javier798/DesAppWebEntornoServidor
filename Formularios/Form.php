<html>

<head>
    <title>Titulo</title>
</head>

<body>
    <?php
        if(isset($_GET["m"])){
            $mensaje = $_GET["m"];
            echo "$mensaje";
        }
    ?>
    <form name="form_hobby" method="POST" action="destino.php">
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

