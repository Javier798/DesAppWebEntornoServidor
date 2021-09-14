<?php
//Funcion que genera una fecha aleatoria
function esFecha(){
    $dias=['01','02','03','04','05','06','07','08','09','10'];
    $mes=['01','02','03','04','05','06','07','08','09','10'];
    $fecha='';
    $fecha = $dias[rand(0,9)];
    $fecha = $fecha . "\\" . $mes[rand(0,9)];
    $fecha = $fecha . "\\" . "2021";
    return $fecha;
 }
 
 //Funcion que genera un booleano aleatorio
 function esBooleano(){
    $condicion = rand(0,1);
    if($condicion){
       return TRUE;
    }else{
       return 0;
    }
 }
 
//Funcion que genera una cadena aleatoria
function esCadena(){
    $abecedario=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u','v','w','x','y','z'];
    $cadena="";
    $vueltas=rand(1,10);
    //generamos una cadean formada por letras aleatorias
    for($i=0;$i<$vueltas;$i++){
       $cadena = $cadena . $abecedario[rand(0,26)];
    };
    return $cadena;
    }
    
    
    //Funcion que genera un entero aleatorio
    function esEntero(){
       $numeros=[0,1,2,3,4,5,6,7,8,9];
       $numero='';
       $vueltas=rand(3,8);
       //generamos un numero de numeros aleatorios
       for($i=0;$i<$vueltas;$i++){
          $numero = $numero . $numeros[rand(0,9)];
       };
       return $numero;
    }
    
    function esDecimal(){
       $numeros=[0,1,2,3,4,5,6,7,8,9];
       $entero='';
       $vueltas=rand(1,3);
       //generamos un numero de numeros aleatorios
       for($i=0;$i<$vueltas;$i++){
          $entero = $entero . $numeros[rand(0,9)];
       };
       $vueltas=rand(1,5);
       //generamos un numero de numeros aleatorios
       $entero= $entero . ".";
       for($i=0;$i<$vueltas;$i++){
          $entero = $entero . $numeros[rand(0,9)];
       };
    return $entero;
    }
    
    
?>