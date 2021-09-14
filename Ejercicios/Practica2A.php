<?php

function esPrimo($numero){
        for($i = 2;$i<$numero;$i++){
            if($numero%$i==0){
                return FALSE;
                
            }
        }
        return TRUE;
    
    
}
$numeros =[1,2,3,4,5,6,7,8,9,10];

//Se hacen 2 llamadas al metodo por cada numero, para saber si es primo y para saber si lo precede
for($i=0;$i<sizeof($numeros);$i++){
   //Si el numero es primo lo muestra
     if(esPrimo($numeros[$i])){
        echo "$numeros[$i] es primo";
        echo "<br>";
     }else{
        echo "$numeros[$i] no es primo";
        echo "<br>";
     }
     //Si el numero precede a un primo lo muestra
     if(esPrimo($numeros[$i]+1)){
        echo "$numeros[$i]precede a un primo";
        echo "<br>";
     }else{
        echo "$numeros[$i] no precede a un primo";
        echo "<br>";
     }
    
}
?>