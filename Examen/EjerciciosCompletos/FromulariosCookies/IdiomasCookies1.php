<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>
    <?php
    if (isset($_GET["idioma"])) {
        switch ($_GET["idioma"]) {
            case 'es':
                echo "Hola";
                break;
            case 'en':
                echo "Hellow";
                break;
            case 'jp':
                echo "Konichigua";
                break;
        }
    } else {
        echo "seleccione un idioma";
    }
    ?>
    </p>
    
    <select id="idiomas" onchange="cambiarIdioma()">
        <option value="es" <?php if(isset($_GET["idioma"])&& $_GET["idioma"]=="es") echo "selected" ?>>Español</option>
        <option value="en" <?php if(isset($_GET["idioma"])&& $_GET["idioma"]=="en") echo "selected" ?>>Ingles</option>
        <option value="jp" <?php if(isset($_GET["idioma"])&& $_GET["idioma"]=="jp") echo "selected" ?>>Japones</option>
    </select>
    <script>
        function cambiarIdioma() {
            let select = document.getElementById("idiomas");
            let idioma = select[select.selectedIndex].value;
            location.href = "IdiomasCookies1.php?idioma=" + idioma;
        }
    </script>
</body>

</html>