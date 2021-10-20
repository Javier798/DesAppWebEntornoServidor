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
                    echo "Bienvendio";
                    break;
                case "en":
                    echo "Welcome";
                    break;
                case "pt":
                    echo "EUAUEU";
                    break;
            }
        } else {
            echo "Seleccione un idioma";
        }
        ?>
    </p>
    <select id="idiomas" onchange="cambioIdioma()">
    <option value="es" <?php if(isset($_GET["idioma"])&&$_GET["idioma"]=="es") echo"selected" ?>>Español</option>
        <option value="en" <?php if(isset($_GET["idioma"])&&$_GET["idioma"]=="en") echo"selected" ?>>Ingles</option>
        <option value="pt" <?php if(isset($_GET["idioma"])&&$_GET["idioma"]=="pt") echo"selected" ?>>Protugues</option>
    </select>


    <script>
        function cambioIdioma() {
            var s = document.getElementById("idiomas");
            var idioma = s.options[s.selectedIndex].value;
            location.href = "IdiomaCookies.php?idioma=" + idioma;
        }
    </script>
</body>

</html>