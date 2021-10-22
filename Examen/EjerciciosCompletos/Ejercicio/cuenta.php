<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="GET"  action="calculadora.php">
    <p>Numero 1</p>
    <input type="number" name="n1">
    <p>simbolo</p>
    <select name="selector" id="">
        <option value="+">+</option>
        <option value="-">+</option>
        <option value="*">+</option>
        <option value="/">+</option>
    </select>
    <p>Numero 2</p>
    <input type="number" name="n2">
    <input type="submit" name="enviar" value="Enviar">
</form>
</body>
</html>