<?php
//Incluimos el archivo de funciones.
include 'Functions.php';

define('N', rand(1, 5));

//Ejemplo de entidad a usar
$libro1 = array("titulo" => "libro1", "numero paginas"=> 50,"vendible"=>TRUE,"fecha_publicacion"=>"09/09/2021");


//Generamos el array aleatrio
$catalogo[N]='';

for($i=0;$i<N;$i++){
   $catalogo[$i] = [esCadena(),esEntero(),esBooleano(),esFecha(),esDecimal()];
}

//Mostramos de forma bonita el resultado
echo '<pre>';
print_r($catalogo);
echo '</pre>';
?>