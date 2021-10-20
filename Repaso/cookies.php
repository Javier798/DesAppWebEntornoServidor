<?php
if (isset($_COOKIE["llamada_visita_app"])) {
    if ($_COOKIE["llamada_visita_app"] == 0) {
        echo "Bienvenido";

        setcookie("llamada_visita_app", $_COOKIE["llamada_visita_app"] + 1, time() + (2 * 3600 * 24));
    } else {
        $visita = $_COOKIE["llamada_visita_app"];
        echo "Visita $visita";
        setcookie("llamada_visita_app", $_COOKIE["llamada_visita_app"] + 1, time() + (2 * 3600 * 24));
    }
    if ($_COOKIE["llamada_visita_app"] == 10) {
        setcookie("llamada_visita_app", 0, time() + (2 * 3600 * 24));
    }
} else {
    setcookie("llamada_visita_app", "0", time() - 100);
}



?>
<!DOCTYPE html>
<html lang="en">
</html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1> <?php
if(isset($_GET["idioma"])){
    $idioma = $_GET["idioma"];
    switch($idioma){
        case "ingles":
            echo "Select a language";
            break;
        case "español":
            echo "Selecione un idioma";
            break;
        case "ruso":
            echo "Выберите язык";
            break;
        default:
            echo "Selecione un idioma";
            break;

    }
}else{
    echo "Selecione un idioma";
}
?></h1>
    <select onchange="cambioSelect()" id="idiomas">
        <option value="español" <?php if(isset($_GET["idioma"])&& $_GET["idioma"]=="español")echo "selected" ?>>español</option>
        <option value="ingles"<?php if(isset($_GET["idioma"])&& $_GET["idioma"]=="ingles")echo "selected" ?>>ingles</option>
        <option value="ruso" <?php if(isset($_GET["idioma"])&& $_GET["idioma"]=="ruso")echo "selected" ?>>ruso</option>
    </select>
    <script>
        function cambioSelect() {
            var s = document.getElementById("idiomas");
            var idioma = s.options[s.selectedIndex].value;
            location.href = "cookies.php?idioma="+idioma;
        }
    </script>
</body>

</html>