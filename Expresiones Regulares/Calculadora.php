<html>

<head>
    <title>CalculadoraExpresiones regulares</title>
</head>

<body>
    <form name="form_hobby" method="POST" action="Calculadora.php">
        <label>Cadena a comprobar</label>
        <input type="text" name="Cadena">
        <br>
        <label>Patron</label>
        <input type="text" name="patron">
        
        <input type="submit" name="enviar" value="Enviar">
    </form>

</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $Cadena = $_POST['Cadena'];
    $patron = $_POST['patron'];

    if(!preg_match($patron, $Cadena) ){

        echo "No Match";

    }else{

        echo "Match";

    }
}
?>