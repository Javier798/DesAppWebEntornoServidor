<?php

//Defino as 5 entidades que voy a utilizar al principio
$libro1 = array("titulo" => "libro1", "numero paginas"=> 50,"vendible"=>TRUE,"fecha_publicacion"=>"09/09/2021");
$libro2 = array("titulo" => "libro2", "numero paginas"=> 60,"vendible"=>FALSE,"fecha_publicacion"=>"09/09/2021");
$libro3 = array("titulo" => "libro3", "numero paginas"=> 70,"vendible"=>TRUE,"fecha_publicacion"=>"09/09/2021");
$libro4 = array("titulo" => "libro4", "numero paginas"=> 80,"vendible"=>FALSE,"fecha_publicacion"=>"09/09/2021");
$libro5 = array("titulo" => "libro5", "numero paginas"=> 90,"vendible"=>TRUE,"fecha_publicacion"=>"09/09/2021");

//Creo un catalogo con las entidades anteriormente creadas
$catalogo = array(1 => $libro1,2=> $libro2,3=>$libro3,4=>$libro4,5=>$libro5);

//Obtengo las claves, los valores y los muestro
$claves = array_keys($catalogo);
$valores = array_values($catalogo);

print_r($claves);

echo "<br>";
echo "<br>";

print_r($valores);


//Modifico dos entidades distintas y muestro cada una de ellas
$catalogo[1]["titulo"] = "titulo modificado";
$catalogo[2]["numero paginas"] = 200;
echo "<br>";
echo "<br>";

print_r($catalogo[1]);

echo "<br>";

print_r($catalogo[2]);


//Creo dos entidades nuevas
$libro6 = array("titulo" => "libro6", "numero paginas"=> 100,"vendible"=>FALSE,"fecha_publicacion"=>"09/09/2021");
$libro7 = array("titulo" => "libro7", "numero paginas"=> 110,"vendible"=>TRUE,"fecha_publicacion"=>"09/09/2021");

//Creo un nuevo catalogo y lo muestro
$catalogo2 = array(6 => $libro6,7=> $libro7);
echo "<br>";
echo "<br>";

print_r($catalogo2);

echo "<br>";
echo "<br>";

//Fusiono los catalogos y los muestro
$fusion = array_merge($catalogo,$catalogo2);
echo '<pre>';
print_r($fusion);
echo '</pre>';
?>