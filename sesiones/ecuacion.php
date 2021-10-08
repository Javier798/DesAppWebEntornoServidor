<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="http://localhost/dwes/sesiones/login.php?cerrar=true">Cerrar sesion</a>
    <a href="http://localhost/dwes/sesiones/calculadora.php">Calculadora</a>
    <form action="ecuacion.php">
        <p>A</p>
        <input name="a" type="number">
        <p>B</p>
        <input name="b" type="number">
        <p>C</p>
        <input name="c" type="number">
        <input type="hidden" value="true" name="control">
        <input type="submit" name="enviar" value="Enviar">
        <p><?php if (isset($_GET['resx'])&&isset($_GET['resy'])) echo "resultado1:". $_GET['resx']."<br>"."resultado2:".$_GET['resy']  ?></p>
    </form>

    <?php
    if (isset($_GET['control'])) {
        $contador = 0;
        if (empty($_GET['a'])) {
            $contador++;
        }
        if (empty($_GET['b'])) {
            $contador++;
        }
        if (empty($_GET['c'])) {
            $contador++;
        }
        if ($contador > 0) {
            echo "Faltan datos";
            return;
        } else {
            $a = $_GET['a'];
            $b = $_GET['b'];
            $c = $_GET['c'];
            echo $a;
            echo $b;
            echo $c;
            $x= ((-$b -sqrt((pow($b,2) - (4 * $a * $c)))) / (2 * $a));
            $y= ((-$b +sqrt((pow($b,2) - (4 * $a * $c)))) / (2 * $a));
            header('Location: http://localhost/dwes/sesiones/ecuacion.php?resx=' . $x."&resy=".$y);
        }
    }
    ?>
</body>

</html>

